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
        return collect(DB::select('select users.id,identification_id,users.name,email,last_sign_in_at,phone,direction from users order by users.id'));
    }

    public function headings(): array
    {
        return [
            'id',
            'identification_id',
            'name',
            'email',
            'last_sign_in_at',
            'phone',
            'direction'
        ];
    }
}
