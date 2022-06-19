<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicationController extends Controller
{
    public function index(Request $request)
    {
        if ($request()->ajax()) {
            return datatables()->of(DB::select("select * from publications"))
                ->addColumn('action', 'admin.academicAction')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        //return view('admin.UsersEdit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_publication' => 'required',
            'text_publication' => 'required',
            'user_id' => 'required',
            'category_publication_id' => 'required',
            'init_date_publication' => 'required',
            'end_date_publication' => 'required',
            //'file_publication' => 'required_without:id|max:10240|mimes:jpg,jpeg,png,gif',
        ]);

        try {
            $publicationId = $request->id;
            if ($request->has('file_publication')) {
                $imagePath = $request->file('file_publication');
                $imageName = $imagePath->getClientOriginalName();
                $name = time().'.'.request()->file_publication->getClientOriginalExtension();
                $path = $request->file_publication->move(public_path('uploads/publications'), $imageName);
                
                $publication   =   Publication::updateOrCreate(
                    [
                        'id' => $publicationId
                    ],
                    [
                        'title_publication' => $request->title_publication,
                        'text_publication' => $request->text_publication,
                        'user_id' => $request->user_id,
                        'category_publication_id' => $request->category_publication_id,
                        'init_date_publication' => $request->init_date_publication,
                        'end_date_publication' => $request->end_date_publication,
                        'fileName_publication'=> $imageName,
                        'path_publication'=>$path,
                    ]
                );
                return Response()->json($publication);
            }
            else{
                $publication   =   Publication::updateOrCreate(
                    [
                        'id' => $publicationId
                    ],
                    [
                        'title_publication' => $request->title_publication,
                        'text_publication' => $request->text_publication,
                        'user_id' => $request->user_id,
                        'category_publication_id' => $request->category_publication_id,
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
        $academic  = Academic::where($where)->first();

        return response()->json($academic);
    }

    public function destroy(Request $request)
    {
        $academic = Academic::where('id', $request->id)->delete();

        return Response()->json($academic);
    }

    public function getListaPublicaciones(){
        $publicaciones = Publication::all();
        return view('client.feed')->with(array('publicaciones'=>$publicaciones));
    }
    
}
