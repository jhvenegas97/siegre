<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LastLoginUserExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(DB::select('select FROM_UNIXTIME(s.last_activity) as last_activity, U.identification_id, U.name from sessions as S inner join users as U on U.id = S.user_id group by U.id having max(s.last_activity)'));
    }

    public function headings(): array
    {
        return [
            'last_activity',
            'identification_id',
            'name',
        ];
    }
}
