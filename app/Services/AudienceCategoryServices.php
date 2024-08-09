<?php

namespace App\Services;

use App\Models\AudienceCategory;
use App\Services\BaseServices;

class AudienceCategoryServices extends BaseServices
{

    public function model()
    {
        return AudienceCategory::class;
    }
}
