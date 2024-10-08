<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $table = 'challenge';

    protected $fillable = [
        'title',
        'description',
        'difficulty',
        'start_date',
        'end_date',
        'user_id'
    ];
}

