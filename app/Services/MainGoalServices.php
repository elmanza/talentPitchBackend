<?php

namespace App\Services;

use App\Models\MainGoal;

class MainGoalServices extends BaseServices
{

    public function model()
    {
        return MainGoal::class;
    }
}
