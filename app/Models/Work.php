<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_type_id',
        'user_id',
        'title_work',
        'init_date_work',
        'end_date_work',
        'fileName_work',
        'path_work',
    ];
}
