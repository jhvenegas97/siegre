<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListCurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::join('academics', 'users.id', '=', 'academics.user_id')->
        join('works', 'users.id', '=', 'works.user_id')->where('users.showCurriculum','=','1')->groupBy('users.id')->paginate(2);;
        if($request->has('name') || $request->has('academic_level_id')){
            if($request->filled('academic_level_id')){
                $users = User::join('academics', 'users.id', '=', 'academics.user_id')->
                join('works', 'users.id', '=', 'works.user_id')->where('users.showCurriculum','=','1')
                ->where('users.name','like',"%".$request->get("name")."%")->where('academics.academic_level_id','=',$request->get('academic_level_id'))->groupBy('users.id')->paginate(2);
            }
            else{
                $users = User::join('academics', 'users.id', '=', 'academics.user_id')->
                join('works', 'users.id', '=', 'works.user_id')->where('users.showCurriculum','=','1')
                ->where('users.name','like',"%".$request->get("name")."%")->groupBy('users.id')->paginate(2);
            }
        }
        
        if($request->ajax()){
            return view('client.listCurriculumPagination',['usersCurriculum'=>$users,'academicLevels'=>DB::select('select * from academic_levels')]); 
        }
        return view('client.listCurriculum',['usersCurriculum'=>$users,'academicLevels'=>DB::select('select * from academic_levels')]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
