<?php

namespace App\Policies;

use App\Models\Coach;
use App\Models\User;

class RecruiterPolicy
{
    /**
     * Create a new policy instance.
     */
    public function delete(User $user, $id) {
        return $user->role === 'admin';
    }
}
