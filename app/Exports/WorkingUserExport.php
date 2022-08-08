<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WorkingUserExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(DB::select('select U.identification_id, U.name, U.email, U.phone from users as U inner join works as W on U.id = W.user_id where W.end_date_work is null'));
    }

    public function headings(): array
    {
        return [
            'identification_id',
            'name',
            'email',
            'phone',
        ];
    }
}
