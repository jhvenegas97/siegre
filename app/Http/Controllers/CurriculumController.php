<?php

namespace App\Http\Controllers;

use App\Models\Academic;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $where = array('id' => $request->id);
        $user  = User::where($where)->first();
        $userCurriculum = array();
        array_push($userCurriculum,$user);
        array_push($userCurriculum,Academic::join('academic_levels','academic_levels.id','=','academics.academic_level_id')->where('user_id',$user->id)->get());
        array_push($userCurriculum,Work::join('work_types','work_types.id','=','works.work_type_id')->where('user_id',$user->id)->get());
        return view('client.curriculum')->with(array('userCurriculum'=>$userCurriculum));
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
