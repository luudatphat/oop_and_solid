<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'cover_image',
        'total_views',
        'is_popular',
    ];

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
