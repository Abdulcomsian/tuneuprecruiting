<?php

namespace App\Helpers;

use App\Models\Student;
use App\Models\User;

class CommonHelper
{
    public static function getUserData($id, $model) {
        $data = $model::find($id);
        $user = User::find($data->user_id);
        return $user;
    }
}
