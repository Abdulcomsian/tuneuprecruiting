<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Chat;
use App\Models\Coach;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    public function getMessagesOfAUser($where)
    {
        return Chat::select('chats.*', 'students.profile_image as student_image', 'coaches.profile_image as coach_image')
            ->join('students', 'students.id', '=', 'chats.student_id')
            ->join('coaches', 'coaches.id', '=', 'chats.coach_id')
            ->where($where)->get();
    }

    public function show(Request $request)
    {
        $user = Auth::user();

        $type = ($user->role === 'coach') ? 'Coach' : 'Student';
        $id = $request->id;

        switch ($type) {
            case 'Coach':
                $coachId = Session::get('coachId');
                $coach = Coach::find($coachId);
                $users = Student::join('chats', 'chats.student_id', '=', 'students.id')
                    ->where('chats.coach_id', $coachId)
                    ->select('students.*')
                    ->distinct()
                    ->get();
                break;
            case 'Student':
                $studentId = Session::get('studentId');
                $student = Student::find($studentId);
                $users = Coach::join('chats', 'chats.coach_id', '=', 'coaches.id')
                    ->where('chats.student_id', $studentId)
                    ->select('coaches.*')
                    ->distinct()
                    ->get();
                break;
        }

        if (!$users->isEmpty() && $id === null) {
            $id = $users[0]->id;
        }

        $receiver = ($type === 'Coach') ? Student::find($id) : Coach::find($id);
        $sender = ($type === 'Coach') ? $coach : $student;

        $data = [
            'type' => $type,
            'users' => $users,
            'receiver' => $receiver,
            'sender' => $sender,
            'studentId' => $id,
            'userId' => $user->id,
        ];

        if ($receiver && $data['users']->isNotEmpty()) {
            $data['messages'] = $this->getMessagesOfAUser([
                ($type === 'Coach') ? 'chats.student_id' : 'chats.coach_id' => $receiver->id
            ]);

            if ($data['messages']) {
                $where = ($type === 'Coach')
                    ? ['coach_id' => $sender->id, 'student_id' => $receiver->id, 'sender' => 'Student']
                    : ['student_id' => $sender->id, 'coach_id' => $receiver->id, 'sender' => 'Coach'];

                Chat::where($where)->update(['status' => 'read']);
            }
        } else {
            $data['messages'] = [];
        }

        return view('common/chat/chat', $data);
    }

    public function getNewMessages($id)
    {
        $user = Auth::user();
        $role = $user->role;

        $userId = Session::get(strtolower($role) . 'Id');

        if ($role === 'coach') {
            $where = ['student_id' => $id, 'status' => 'unread', 'chats.sender' => 'Student', 'chats.coach_id' => $userId];
            $profileFields = ['students.profile_image', 'students.first_name'];
        } else {
            $where = ['coach_id' => $id, 'status' => 'unread', 'chats.sender' => 'Coach', 'chats.student_id' => $userId];
            $profileFields = ['coaches.profile_image', 'coaches.first_name'];
        }

        $newMessages = Chat::select('chats.*', ...$profileFields)
            ->join($role === 'coach' ? 'students' : 'coaches', "{$role}s.id", '=', "chats.{$role}_id")
            ->where($where)
            ->get();

        if ($newMessages->isNotEmpty()) {
            $chat = Chat::where($where);
            $chat->update(['status' => 'read']);
        }

        return response($newMessages);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $tableData = [
            'message' => $request->message,
        ];

        if ($user->role == 'coach') {
            $tableData['sender'] = 'Coach';
            $tableData['coach_id'] = Session::get('coachId');
            $tableData['student_id'] = $request->receiverId;

            $apply = Apply::where(['student_id' => $request->receiverId]);
            $apply->update(['talking' => 'talking']);
        } else {
            $tableData['sender'] = 'Student';
            $tableData['student_id'] = Session::get('studentId');
            $tableData['coach_id'] = $request->receiverId;
        }

        Chat::create($tableData);
        return response(['status' => 'success']);
    }

    public function notificationMessages()
    {
        $user = auth()->user();
        $role = ucfirst($user->role);
        $userId = Session::get(strtolower($user->role) . 'Id');

        $tableName = ($role === 'Student') ? 'students' : 'coaches';

        $newMessages = Chat::select('chats.*', "{$tableName}.profile_image", "{$tableName}.first_name")
            ->join($tableName, "{$tableName}.id", '=', "chats.{$role}_id")
            ->whereIn('chats.id', function ($query) use ($userId, $role) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('chats')
                    ->where("{$role}_id", $userId)
                    ->where('status', 'unread')
                    ->where('sender', ($role === 'Student') ? 'Coach' : 'Student')
                    ->groupBy("{$role}_id");
            })
            ->get();

        $newMessages->each(function ($message) use ($role) {
            $message->coach_id = encrypt($message->coach_id);
            $message->student_id = encrypt($message->student_id);
            $message->role = $role;
        });

        return response($newMessages);

    }
}
