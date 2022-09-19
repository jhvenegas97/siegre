<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JobsUserExport;
use App\Exports\LastJobUserExport;
use App\Exports\LastLoginUserExport;
use App\Exports\WorkingUserExport;
use App\Exports\CollegeDegreeUserExport;
use App\Exports\GenderEmployabilityUserExport;
use App\Exports\ActiveUsersExport;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.reports');
    }

    public function jobsUser(){

        if(request()->ajax()) {
            return datatables()->of(DB::select('select U.identification_id, U.name, W.title_work, WT.name_work_type, W.init_date_work, W.end_date_work from users as U 
            inner join works as W on U.id = W.user_id inner join work_types as WT 
            on W.work_type_id = WT.id'))
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.adminReportsJobsUser');
    }

    public function exportJobsUserExcel()
    {
    	return Excel::download(new JobsUserExport, 'jobs-user-list.xlsx');
    }

    public function lastJobUser(){

        if(request()->ajax()) {
            return datatables()->of(DB::select('select U.identification_id, U.name, W.title_work, WT.name_work_type, W.init_date_work, W.end_date_work from users as U inner join works as W on U.id = W.user_id inner join work_types as WT on W.work_type_id = WT.id group by U.id having max(W.end_date_work)'))
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.adminReportsLastJobUser');
    }

    public function exportLastJobUserExcel()
    {
    	return Excel::download(new LastJobUserExport, 'last-job-user-list.xlsx');
    }

    public function activeUsers(){

        if(request()->ajax()) {
            return datatables()->of(DB::select('select U.identification_id, U.name,U.email,U.phone,U.direction, FROM_UNIXTIME(last_activity) as last_activity from sessions as S inner join users as U on U.id = S.user_id group by U.id having max(last_activity)'))
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.adminReportsActiveUsers');
    }

    public function lastLoginUser(){

        if(request()->ajax()) {
            return datatables()->of(DB::select('select users.id,identification_id,users.name,email,last_sign_in_at,phone,direction from users inner join genders on users.gender_id = genders.id order by users.id'))
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.adminReportsLastLoginUser');
    }

    public function exportLastLoginUserExcel()
    {
    	return Excel::download(new LastLoginUserExport, 'last-login-user-list.xlsx');
    }

    public function exportActiveUsersExcel()
    {
    	return Excel::download(new ActiveUsersExport, 'active-users-list.xlsx');
    }

    public function workingUser(){

        if(request()->ajax()) {
            return datatables()->of(DB::select('select U.identification_id, U.name, U.email, U.phone from users as U inner join works as W on U.id = W.user_id where W.end_date_work is null'))
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.adminReportsWorkingUser');
    }

    public function exportWorkingUserExcel()
    {
    	return Excel::download(new WorkingUserExport, 'working-user-list.xlsx');
    }

    public function collegeDegreeUser(){

        if(request()->ajax()) {
            return datatables()->of(DB::select('select U.identification_id, U.name, U.email, A.title_academic, AL.name_academic_level from users as U inner join academics as A on U.id = A.user_id inner join academic_levels as AL on A.academic_level_id = AL.id'))
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.adminReportsCollegeDegreeUser');
    }

    public function collegeDegreeUserExcel()
    {
    	return Excel::download(new CollegeDegreeUserExport, 'college-degree-user-list.xlsx');
    }

    public function genderEmployabilityUser(){

        if(request()->ajax()) {
            return datatables()->of(DB::select('select G.name as gender, count(W.id) as number_jobs from genders as G inner join users as U on U.gender_id = G.id inner join works as W on U.id = W.user_id order by G.name'))
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.adminReportsGenderEmployabilityUser');
    }

    public function genderEmployabilityUserExcel()
    {
    	return Excel::download(new GenderEmployabilityUserExport, 'college-degree-user-list.xlsx');
    }
}
