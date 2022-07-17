<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserUdenar extends Model
{
    use HasFactory;

    protected $fillable = [
        'surname',
        'name',
        'identification',
        'email',
        'date_finish',
        'student_code',
    ];

}
