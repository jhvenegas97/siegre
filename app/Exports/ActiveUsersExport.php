<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ActiveUsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(DB::select('select U.identification_id, U.name,U.email,U.phone,U.direction, FROM_UNIXTIME(last_activity) as last_activity from sessions as S inner join users as U on U.id = S.user_id group by U.id having max(last_activity)'));

    }

    public function headings(): array
    {
        return [
            'identification_id',
            'name',
            'email',
            'phone',
            'direction',
            'last_activity',
        ];
    }
}
