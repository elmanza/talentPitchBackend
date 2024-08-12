<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeJudge extends Model
{
    use HasFactory;

    protected $table = 'challenge_judge';

    protected $fillable = [
        'user_id',
        'challenge_id'
    ];
}

