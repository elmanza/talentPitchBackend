<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAchievement extends Model
{
    use HasFactory;

    protected $table = 'user_achievement';

    protected $fillable = [
        'user_id',
        'achievement_id'
    ];
}

