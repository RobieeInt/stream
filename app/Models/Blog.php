<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'blog';

    protected $fillable = [
        'title',
        'content',
        'author',
        'slug',
        'image',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
