<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Exception;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function index(){
        if(request()->ajax()) {
            return datatables()->of(Gender::select('*'))
                ->addColumn('action', 'admin.genderAction')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.adminGenders');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        try
        {
            $genderId = $request->id;
            $gender   =   Gender::updateOrCreate(
                [
                    'id' => $genderId
                ],
                [
                    'name' => $request->name
                ]);
            return Response()->json($gender);
        }
        catch (Exception $e)
        {
            return Response()->json($e,500);
        }
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $gender  = Gender::where($where)->first();

        return response()->json($gender);
    }

    public function destroy(Request $request)
    {
        $gender = Gender::where('id',$request->id)->delete();

        return Response()->json($gender);
    }
}
