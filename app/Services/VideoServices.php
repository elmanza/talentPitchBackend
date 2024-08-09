<?php

namespace App\Services;

use App\Models\Video;

class VideoServices extends BaseServices
{

    public function model()
    {
        return Video::class;
    }
}
