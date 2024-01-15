<?php

namespace App\Policies;

use App\Models\EmailTemplate;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class EditEmailTemplatePolicy
{
    /**
     * Create a new policy instance.
     */
    public function edit(User $user, EmailTemplate $emailTemplate) {
        $coachId = Session::get('coachId');

        return $coachId == $emailTemplate->coach_id;
    }
}
