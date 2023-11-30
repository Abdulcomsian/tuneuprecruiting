<?php

namespace App\Policies;

use App\Models\Program;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class EditProgramPolicy
{
    /**
     * Create a new policy instance.
     */
    public function edit(User $user, Program $program) {
        $coachId = Session::get('coachId');
        return $coachId === $program->coach_id;
    }
}
