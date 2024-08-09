<?php

namespace App\Services;

use App\Models\ChallengeJudge;
use App\Services\BaseServices;

class ChallengeJudgeServices extends BaseServices
{

    public function model()
    {
        return ChallengeJudge::class;
    }
}
