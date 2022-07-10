<?php

namespace App\Http\Controllers;

use App\Events\PublicationEvent;
use App\Models\Publication;
use App\Models\User;
use App\Notifications\RepliedToThread;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class PublicationFeedController extends Controller
{
    public function index(Request $request)
    {
        $publications = Publication::all();
        if ($request->has('title_publication') || $request->has('category_publication_id')) {
            if ($request->filled('category_publication_id')) {
                $publications = Publication::join('category_publications', 'category_publications.id', '=', 'publications.category_publication_id')->where('publications.title_publication', 'like', "%" . $request->get("title_publication") . "%")->where('publications.category_publication_id', '=', $request->get('category_publication_id'))->groupBy('publications.id');
            } else {
                $publications = Publication::join('category_publications', 'category_publications.id', '=', 'publications.category_publication_id')->where('publications.title_publication', 'like', "%" . $request->get("title_publication") . "%")->groupBy('publications.id');
            }
        }

        if ($request->ajax()) {
            return view('client.feedPagination', ['publications' => $publications, 'categoryPublications' => DB::select('select * from category_publications')]);
        }
        return view('client.feed', ['publications' => $publications, 'categoryPublications' => DB::select('select * from category_publications')]);
    }

    public function indexAdmin(Request $request)
    {
        if (request()->ajax()) {
            return datatables()->of(DB::select("select p.id,u.name,cp.name_category_publication, p.title_publication, p.text_publication, p.init_date_publication, p.end_date_publication, p.fileName_publication
            from publications p inner join users u on p.user_id = u.id inner join category_publications cp on p.category_publication_id = cp.id"))
                ->addColumn('action', 'admin.publicationAction')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.adminPublications')->with('categoryPublications', DB::select('select * from category_publications'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'category_publication_id' => 'required',
            'title_publication' => 'required',
            'text_publication' => 'required|max:255',
            'init_date_publication' => 'required',
            'end_date_publication' => 'required',
            'file_publication' => 'required_without:id|max:10240|mimes:jpg,jpeg,png,gif',
        ]);

        try {
            $publicationId = $request->id;
            if ($request->has('file_publication')) {
                if (Publication::where('id', $request->id)->first() != null) {
                    unlink(Publication::where('id', $request->id)->first()->path_publication);
                }

                $pdfPath = $request->file('file_publication');
                $pdfName = $pdfPath->getClientOriginalName();
                $name = time() . '.' . request()->file_publication->getClientOriginalExtension();
                $path = $request->file_publication->move(public_path('uploads\publications'), $pdfName);

                $publication   =   Publication::updateOrCreate(
                    [
                        'id' => $publicationId
                    ],
                    [
                        'user_id' => $request->user_id,
                        'category_publication_id' => $request->category_publication_id,
                        'title_publication' => $request->title_publication,
                        'text_publication' => $request->text_publication,
                        'init_date_publication' => $request->init_date_publication,
                        'end_date_publication' => $request->end_date_publication,
                        'fileName_publication' => $pdfName,
                        'path_publication' => $path,
                    ]
                );
                event(new \App\Events\PublicationEvent($publication,User::where("id",$request->user_id)->first()));
                return Response()->json($publication);
            } else {
                $publication   =   Publication::updateOrCreate(
                    [
                        'id' => $publicationId
                    ],
                    [
                        'user_id' => $request->user_id,
                        'category_publication_id' => $request->category_publication_id,
                        'title_publication' => $request->title_publication,
                        'text_publication' => $request->text_publication,
                        'init_date_publication' => $request->init_date_publication,
                        'end_date_publication' => $request->end_date_publication,
                    ]
                );
            }
            return Response()->json($publication);
        } catch (Exception $e) {
            return Response()->json($e, 500);
        }
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $publication  = Publication::where($where)->first();

        return response()->json($publication);
    }

    public function destroy(Request $request)
    {
        unlink(Publication::where('id', $request->id)->first()->path_publication);
        $publication = Publication::where('id', $request->id)->delete();

        return Response()->json($publication);
    }
}
