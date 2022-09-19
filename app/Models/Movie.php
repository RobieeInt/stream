<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'movies'; // optional definisiin nama table

    protected $fillable = [
        'title',
        'trailer',
        'movie',
        'slug',
        'casts',
        'categories',
        'small_thumbnail',
        'large_thumbnail',
        'release_date',
        'description',
        'long_description',
        'duration',
        'is_featured',
        'rating',
        'is_active',
    ];
}
