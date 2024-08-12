<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoChallenge extends Model
{
    use HasFactory;

    protected $table = 'video_challenge';

    protected $fillable = [
        'video_id',
        'challenge_id'
    ];
}

