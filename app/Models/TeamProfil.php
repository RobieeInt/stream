<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamProfil extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'profil_team';

    protected $fillable = [
        'name',
        'slug_name',
        'job',
        'image',
        'description',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
    ];
}
