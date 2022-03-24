<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcademicController extends Controller
{
    public function index(){
        /*$data['programs'] = Program::orderBy('id','desc')->paginate(5);
        return view('admin.adminPrograms',$data);*/
        if(request()->ajax()) {
            return datatables()->of(DB::select('select a.id,name_academic_level,title,init_date,end_date from academics a inner join academic_levels ac on ac.id = a.academic_level_id'))
                ->addColumn('action', 'admin.academicAction')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        //return view('admin.UsersEdit');
    }

    public function store(Request $request){
        $request->validate([
            'name_academic_level' => 'required',
        ]);

        try
        {
            $academicLevelId = $request->id;
            $academicLevel   =   AcademicLevel::updateOrCreate(
                [
                    'id' => $academicLevelId
                ],
                [
                    'name_academic_level' => $request->name_academic_level
                ]);
            return Response()->json($academicLevel);
        }
        catch (Exception $e)
        {
            return Response()->json($e,500);
        }
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $academicLevel  = AcademicLevel::where($where)->first();

        return response()->json($academicLevel);
    }

    public function destroy(Request $request)
    {
        $academicLevel = AcademicLevel::where('id',$request->id)->delete();

        return Response()->json($academicLevel);
    }
}
