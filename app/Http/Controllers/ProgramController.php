<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Exception;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    public function index(){
        /*$data['programs'] = Program::orderBy('id','desc')->paginate(5);
        return view('admin.adminPrograms',$data);*/
        if(request()->ajax()) {
            return datatables()->of(DB::select('select p.id,name_program,name_faculty from faculties f inner join programs p on f.id = p.faculty_id'))
                ->addColumn('action', 'admin.programAction')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.adminPrograms')->with('faculties',DB::select('select * from faculties'));
    }

    public function store(Request $request){
        $request->validate([
            'name_program' => 'required',
            'faculty_id' => 'required',
        ]);

        try
        {
            $programId = $request->id;
            $program   =   Program::updateOrCreate(
                [
                    'id' => $programId
                ],
                [
                    'name_program' => $request->name_program,
                    'faculty_id' => $request->faculty_id
                ]);
            return Response()->json($program);
        }
        catch (Exception $e)
        {
            return Response()->json($e,500);
        }
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

        return Response()->json($program);
    }
}
