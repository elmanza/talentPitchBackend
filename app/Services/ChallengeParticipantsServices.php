<?php

namespace App\Services;

use App\Models\ChallengeParticipants;
use App\Services\BaseServices;

class ChallengeParticipantsServices extends BaseServices
{

    public function model()
    {
        return ChallengeParticipants::class;
    }
}
