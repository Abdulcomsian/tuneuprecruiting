<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function show(Request $request, $id, $userType, $messageId = null) {
        $userId = Auth::user()->id;

        $data['student'] = Student::find($id);
        $data['messages'] = Chat::where(['coach_id' => $userId, 'student_id' => $id])->with(['student'])->get();

        $data['type'] = $userType;
        $data['studentId'] = $id;
        $data['userId'] = $userId;

        if ($messageId != null) {
            $chat = Chat::find($messageId);
            $chat->status = 'read';
            $chat->save();
        }

        return view('common/chat/chat', $data);
    }

    public function store(Request $request) {
        $tableData = [
            'user_id' => $request->userId,
            'student_id' => $request->studentId,
            'message' => $request->message,
            'sender' => $request->userType
        ];

        Chat::create($tableData);
        return response(['status' => 'success']);
    }
}
