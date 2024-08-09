<?php

namespace App\Services;

use App\Models\Achievement;
use App\Services\BaseServices;

class AchievementServices extends BaseServices
{

    public function model()
    {
        return Achievement::class;
    }
}
