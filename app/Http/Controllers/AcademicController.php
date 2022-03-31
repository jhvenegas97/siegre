<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcademicController extends Controller
{
    public function index(Request $request)
    {
        /*$data['programs'] = Program::orderBy('id','desc')->paginate(5);
        return view('admin.adminPrograms',$data);*/
        if (request()->ajax()) {
            return datatables()->of(DB::select("select a.id,name_academic_level,title_academic,init_date_academic,end_date_academic,fileName_academic from academics a inner join academic_levels ac on ac.id = a.academic_level_id where user_id=".$request->id))
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
            'academic_level_id' => 'required',
            'user_id' => 'required',
            'title_academic' => 'required|max:255',
            'init_date_academic' => 'required',
            'file_academic' => 'required_without:id|max:2048|mimes:pdf',
        ]);

        try {
            $academicId = $request->id;
            if ($request->has('file_academic')) {
                $pdfPath = $request->file('file_academic');
                $pdfName = $pdfPath->getClientOriginalName();
                $name = time().'.'.request()->file_academic->getClientOriginalExtension();
                $path = $request->file_academic->move(public_path('uploads\academics'), $pdfName);
                
                $academic   =   Academic::updateOrCreate(
                    [
                        'id' => $academicId
                    ],
                    [
                        'academic_level_id' => $request->academic_level_id,
                        'user_id' => $request->user_id,
                        'title_academic' => $request->title_academic,
                        'init_date_academic' => $request->init_date_academic,
                        'end_date_academic' => $request->end_date_academic,
                        'fileName_academic'=> $pdfName,
                        'path_academic'=>$path,
                    ]
                );
                return Response()->json($academic);
            }
            else{
                $academic   =   Academic::updateOrCreate(
                    [
                        'id' => $academicId
                    ],
                    [
                        'academic_level_id' => $request->academic_level_id,
                        'user_id' => $request->user_id,
                        'title_academic' => $request->title_academic,
                        'init_date_academic' => $request->init_date_academic,
                        'end_date_academic' => $request->end_date_academic,
                    ]
                );
            }
            return Response()->json($academic);
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
}
