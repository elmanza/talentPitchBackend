<?php

namespace App\Services;

use App\Models\UserAchievement;
use App\Services\BaseServices;

class UserAchievementServices extends BaseServices
{

    public function model()
    {
        return UserAchievement::class;
    }
}
