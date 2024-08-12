<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoLikes extends Model
{
    use HasFactory;

    protected $table = 'video_likes';

    protected $fillable = [
        'user_id',
        'video_id'
    ];
}

