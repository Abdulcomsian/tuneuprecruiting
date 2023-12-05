<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    public function notificationMessages() {
        $user = auth()->user();
        if ($user->role == 'student') {
            $studentId = Session::get('studentId');
//            $newMessages = Chat::select('chats.*', 'coaches.profile_image', 'coaches.first_name')
//                ->join('coaches', 'coaches.id', '=', 'chats.coach_id')
//                ->where(['chats.student_id' => $studentId, 'status' => 'unread', 'chats.sender' => 'Coach'])
//                ->get();
            $newMessages = Chat::select('chats.*', 'coaches.profile_image', 'coaches.first_name')
                ->join('coaches', 'coaches.id', '=', 'chats.coach_id')
                ->whereIn('chats.id', function ($query) use ($studentId) {
                    $query->select(DB::raw('MAX(id)'))
                        ->from('chats')
                        ->where('student_id', $studentId)
                        ->where('status', 'unread')
                        ->where('sender', 'Coach')
                        ->groupBy('coach_id');
                })
                ->get();
        } else {
            $coachId = Session::get('coachId');
//            $newMessages = Chat::select('chats.*', 'students.profile_image', 'students.first_name')
//                ->join('students', 'students.id', '=', 'chats.student_id')
//                ->where(['chats.coach_id' => $coachId, 'status' => 'unread', 'chats.sender' => 'Student'])
//                ->get();
            $newMessages = Chat::select('chats.*', 'students.profile_image', 'students.first_name')
                ->join('students', 'students.id', '=', 'chats.student_id')
                ->whereIn('chats.id', function ($query) use ($coachId) {
                    $query->select(DB::raw('MAX(id)'))
                        ->from('chats')
                        ->where('coach_id', $coachId)
                        ->where('status', 'unread')
                        ->where('sender', 'Student')
                        ->groupBy('student_id');
                })
                ->get();
        }

        foreach ($newMessages as $message) {
            $message->coach_id = encrypt($message->coach_id);
            $message->student_id = encrypt($message->student_id);
            $message->role = ucfirst($user->role);
        }

        return response($newMessages);
    }
}
