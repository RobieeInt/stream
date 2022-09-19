<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPremium extends Model
{
    use HasFactory;

    protected $table = 'user_premiums'; // optional definisiin nama table

    protected $fillable = [
        'user_id',
        'package_id',
        'end_of_subscription',

    ];
}
