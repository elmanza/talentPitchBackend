<?php

namespace App\Services;

use App\Models\UserAudience;
use App\Services\BaseServices;

class UserAudienceServices extends BaseServices
{

    public function model()
    {
        return UserAudience::class;
    }
}
