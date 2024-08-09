<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'video';

    protected $fillable = [
        'title',
        'description',
        'url',
        'is_pitch',
        'likes',
        'user_id'
    ];

    protected function cast(): array{
        return [
            'is_pitch' => 'boolean'
        ];
    }
}

