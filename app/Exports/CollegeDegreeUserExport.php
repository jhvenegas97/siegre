<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CollegeDegreeUserExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(DB::select('select U.identification_id, U.name, U.email, A.title_academic, AL.name_academic_level from users as U inner join academics as A on U.identification_id = A.id inner join academic_levels as AL on A.academic_level_id = AL.id'));
    }

    public function headings(): array
    {
        return [
            'identification_id',
            'name',
            'email',
            'title_academic',
            'name_academic_level',
        ];
    }
}
