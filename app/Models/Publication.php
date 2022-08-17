<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Publication extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'title_publication',
        'text_publication',
        'user_id',
        'category_publication_id',
        'init_date_publication',
        'end_date_publication',
        'fileName_publication',
        'path_publication',
        'hidden',
    ];

    public function user()
    {
        return $this->belongsTo("App\Models\User", "user_id");
    }

    public function category()
    {
        return $this->belongsTo("App\Models\CategoryPublication", "category_publication_id");
    }
}
