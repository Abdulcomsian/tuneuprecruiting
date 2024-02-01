<?php

namespace App\Helpers;

use App\Models\Notification;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CommonHelper
{
    public static function getUserData($id, $model) {
        $data = $model::find($id);
        $user = User::find($data->user_id);
        return $user;
    }

    public static function updateNotificationStatus($notificationId) {
        if ($notificationId) {
            $notification = Notification::find($notificationId);
            $notification->status = 'read';
            $notification->save();
        }
    }

    public static function getStudentDetails() {
        $user = Auth::user();
        $student = Student::where(['user_id' => $user->id])->first();
        $student->email = $user->email;

        return $student;
    }
}
