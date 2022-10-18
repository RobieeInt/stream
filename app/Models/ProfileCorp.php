<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfileCorp extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'profile_corp';

    protected $fillable = [
        'hero_title',
        'hero_image',
        'hero_description',
        'hero_video',
        'hero_video_poster',
        'hero_video_description',
        'hero_video_link',
        'hero_video_link_text',
        'address',
        'phone',
        'email',
        'footer_description',

    ];
}
