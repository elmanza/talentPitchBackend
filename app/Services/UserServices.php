<?php

namespace App\Services;

use App\Models\User;
use App\Services\BaseServices;

class UserServices extends BaseServices
{

    public function model()
    {
        return User::class;
    }
}
