<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkController extends Controller
{
    public function index(Request $request)
    {
        /*$data['programs'] = Program::orderBy('id','desc')->paginate(5);
        return view('admin.adminPrograms',$data);*/
        if (request()->ajax()) {
            return datatables()->of(DB::select("select w.id,name_work_type,title_work,init_date_work,end_date_work,fileName_work from works w inner join work_types wt on wt.id = w.work_type_id where user_id=".$request->id))
                ->addColumn('action', 'admin.workAction')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        //return view('admin.UsersEdit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'work_type_id' => 'required',
            'user_id' => 'required',
            'title_work' => 'required|max:255',
            'init_date_work' => 'required',
            'file_work' => 'required_without:id|max:2048|mimes:pdf',
        ]);

        try {
            $workId = $request->id;
            if ($request->has('file_work')) {
                $pdfPath = $request->file('file_work');
                $pdfName = $pdfPath->getClientOriginalName();
                $name = time().'.'.request()->file_work->getClientOriginalExtension();
                $path = $request->file_work->move(public_path('uploads\works'), $pdfName);
                
                $work   =   Work::updateOrCreate(
                    [
                        'id' => $workId
                    ],
                    [
                        'work_type_id' => $request->work_type_id,
                        'user_id' => $request->user_id,
                        'title_work' => $request->title_work,
                        'init_date_work' => $request->init_date_work,
                        'end_date_work' => $request->end_date_work,
                        'fileName_work'=> $pdfName,
                        'path_work'=>$path,
                    ]
                );
                return Response()->json($work);
            }
            else{
                $work   =   Work::updateOrCreate(
                    [
                        'id' => $workId
                    ],
                    [
                        'work_type_id' => $request->work_type_id,
                        'user_id' => $request->user_id,
                        'title_work' => $request->title_work,
                        'init_date_work' => $request->init_date_work,
                        'end_date_work' => $request->end_date_work,
                    ]
                );
            }
            return Response()->json($work);
        } catch (Exception $e) {
            return Response()->json($e, 500);
        }
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $work  = Work::where($where)->first();

        return response()->json($work);
    }

    public function destroy(Request $request)
    {
        $work = Work::where('id', $request->id)->delete();

        return Response()->json($work);
    }
}
