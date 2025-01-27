<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'description',
        'director',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
