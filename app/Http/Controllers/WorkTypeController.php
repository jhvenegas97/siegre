<?php

namespace App\Http\Controllers;

use App\Models\WorkType;
use Exception;
use Illuminate\Http\Request;

class WorkTypeController extends Controller
{
    public function index(){
        /*$data['programs'] = Program::orderBy('id','desc')->paginate(5);
        return view('admin.adminPrograms',$data);*/
        if(request()->ajax()) {
            return datatables()->of(WorkType::select('*'))
                ->addColumn('action', 'admin.workTypeAction')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.adminWorkTypes');
    }

    public function store(Request $request){
        $request->validate([
            'name_work_type' => 'required',
        ]);

        try
        {
            $workTypeId = $request->id;
            $workType   =   WorkType::updateOrCreate(
                [
                    'id' => $workTypeId
                ],
                [
                    'name_work_type' => $request->name_work_type
                ]);
            return Response()->json($workType);
        }
        catch (Exception $e)
        {
            return Response()->json($e,500);
        }
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $workType  = WorkType::where($where)->first();

        return response()->json($workType);
    }

    public function destroy(Request $request)
    {
        $workType = WorkType::where('id',$request->id)->delete();

        return Response()->json($workType);
    }
}
