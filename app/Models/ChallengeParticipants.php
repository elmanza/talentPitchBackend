<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeParticipants extends Model
{
    use HasFactory;

    protected $table = 'challenge_participants';

    protected $fillable = [
        'user_id',
        'challenge_id'
    ];
}

