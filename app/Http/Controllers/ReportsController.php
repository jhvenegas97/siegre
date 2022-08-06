<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JobsUserExport;
use App\Exports\LastJobUserExport;

class ReportsController extends Controller
{
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
}
