<?php

namespace App\Services;

use App\Models\Challenge;
use App\Services\BaseServices;

class ChallengeServices extends BaseServices
{

    public function model()
    {
        return Challenge::class;
    }
}
