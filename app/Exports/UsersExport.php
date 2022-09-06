<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'identification_id',
            'program_id',
            'name',
            'description',
            'email',
            'phone',
            'direction',
            'fileName',
            'path',
            'email_verified_at',
            'state',
            'showCurriculum',
            'avatar',
            'external_id',
            'created_at',
            'updated_at',
        ];
    }
}
