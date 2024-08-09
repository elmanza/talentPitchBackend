<?php

namespace App\Services;

use App\Models\Role;

class RoleServices extends BaseServices
{

    public function model()
    {
        return Role::class;
    }
}
