<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GenderEmployabilityUserExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(DB::select('select G.name as gender, count(W.id) as number_jobs from genders as G inner join users as U on U.gender_id = G.id inner join works as W on U.id = W.user_id order by G.name'));
    }

    public function headings(): array
    {
        return [
            'gender',
            'number_jobs',
        ];
    }
}
