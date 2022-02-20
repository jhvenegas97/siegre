<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index(){
        /*$data['programs'] = Program::orderBy('id','desc')->paginate(5);
        return view('admin.adminPrograms',$data);*/
        if(request()->ajax()) {
            return datatables()->of(Faculty::select('*'))
                ->addColumn('action', 'admin.facultyAction')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.adminFaculties');
    }

    public function store(Request $request){
        $request->validate([
            'name_faculty' => 'required',
        ]);

        try
        {
            $facultyId = $request->id;
            $faculty   =   Faculty::updateOrCreate(
                [
                    'id' => $facultyId
                ],
                [
                    'name_faculty' => $request->name_faculty
                ]);
            return Response()->json($faculty);
        }
        catch (Exception $e)
        {
            return Response()->json($e,500);
        }
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $faculty  = Faculty::where($where)->first();

        return response()->json($faculty);
    }

    public function destroy(Request $request)
    {
        $faculty = Faculty::where('id',$request->id)->delete();

        return Response()->json($faculty);
    }
}
