<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Center;

class CenterPolicy
{
    public function view(User $user, Center $center) {
        if($user->id == 1) return true;
        return $user->center_id == $center->id;
    }
}
