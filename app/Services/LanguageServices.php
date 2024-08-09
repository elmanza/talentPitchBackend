<?php

namespace App\Services;

use App\Models\Language;

class LanguageServices extends BaseServices
{

    public function model()
    {
        return Language::class;
    }
}
