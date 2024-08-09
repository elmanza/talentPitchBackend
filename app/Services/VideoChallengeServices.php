<?php

namespace App\Services;

use App\Models\VideoChallenge;

class VideoChallengeServices extends BaseServices
{

    public function model()
    {
        return VideoChallenge::class;
    }
}
