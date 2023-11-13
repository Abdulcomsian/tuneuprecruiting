<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function notificationMessages() {
        $user = auth()->user();
        if ($user->role == 'student') {
            $newMessages = Chat::select('chats.*', 'students.profile_image', 'students.first_name')->join('students', 'students.id', '=', 'chats.student_id')->where(['student_id' => $user->id, 'status' => 'unread'])->get();
        } else {
            $newMessages = Chat::select('chats.*', 'coaches.profile_image', 'coaches.first_name')->join('coaches', 'coaches.id', '=', 'chats.coach_id')->where(['coach_id' => $user->id, 'status' => 'unread'])->get();
        }

        return response($newMessages);
    }
}
