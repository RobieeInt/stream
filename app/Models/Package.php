<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages'; // optional definisiin nama table

    protected $fillable = [
        'name',
        'price',
        'max_days',
        'max_users',
        'is_downloaded',
        'is_active',
        'is_4k',
    ];
}
