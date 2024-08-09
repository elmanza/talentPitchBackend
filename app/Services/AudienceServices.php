<?php

namespace App\Services;

use App\Models\Audience;
use App\Services\BaseServices;

class AudienceServices extends BaseServices
{

    public function model()
    {
        return Audience::class;
    }
}
