<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index(){
        $programs = Program::all();
        return view('admin.adminPrograms')->with(array('programs'=>$programs));
    }

    public function store(Request $request){
        $request->validate([
            'name_program' => 'required',
            'faculty' => 'required',
        ]);

        Program::create($request->all());

        return redirect()->route('programIndex')
            ->with('success', 'Product created successfully.');
    }

    public function update(Request $request, Program $program){
        $request->validate([
            'name_program' => 'required',
            'faculty' => 'required',
        ]);

        $program->update($request->all());

        return redirect()->route('programIndex')
            ->with('success', 'Product created successfully.');
    }
}
