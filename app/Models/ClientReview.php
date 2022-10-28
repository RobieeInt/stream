<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientReview extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'job',
        'slug',
        'email',
        'phone',
        'review',
        'image',
        'is_active',
    ];
}
