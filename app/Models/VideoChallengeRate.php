<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoChallengeRate extends Model
{
    use HasFactory;

    protected $table = 'video_challenge_rate';

    protected $fillable = [
        'challenge_judge_id',
        'video_challenge_id',
        'rate'
    ];
}

