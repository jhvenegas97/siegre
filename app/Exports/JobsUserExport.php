<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JobsUserExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(DB::select('select U.identification_id, U.name, W.title_work, WT.name_work_type, W.init_date_work, W.end_date_work from users as U 
        inner join works as W on U.id = W.user_id inner join work_types as WT 
        on W.work_type_id = WT.id'));
    }

    public function headings(): array
    {
        return [
            'identification_id',
            'name',
            'title_work',
            'name_work_type',
            'init_date_work',
            'end_date_work',
        ];
    }
}
