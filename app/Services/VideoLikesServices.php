<?php

namespace App\Services;

use App\Models\VideoLikes;

class VideoLikesServices extends BaseServices
{

    public function model()
    {
        return VideoLikes::class;
    }
}
