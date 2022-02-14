<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Datatables;

class ProgramController extends Controller
{
    public function index(){
        /*$data['programs'] = Program::orderBy('id','desc')->paginate(5);
        return view('admin.adminPrograms',$data);*/
        if(request()->ajax()) {
            return datatables()->of(Program::select('*'))
                ->addColumn('action', 'admin.program-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.adminPrograms');
    }

    public function store(Request $request){
        $request->validate([
            'name_program' => 'required',
            'faculty' => 'required',
        ]);

//        $program = Program::updateOrCreate($request->all());

        $programId = $request->id;
        $program   =   Program::updateOrCreate(
            [
                'id' => $programId
            ],
            [
                'name_program' => $request->name_program,
                'faculty' => $request->faculty
            ]);
        return Response()->json($program);

        /*return response()->json(['success' => true]);*/
//        return Response()->json($program);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $program  = Program::where($where)->first();

        return response()->json($program);
    }

    public function destroy(Request $request)
    {
        $program = Program::where('id',$request->id)->delete();

        /*return response()->json(['success' => true]);*/
        return Response()->json($program);
    }
}
