<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Chat;
use App\Models\Coach;
use App\Models\Program;
use App\Models\Student;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    public function getMessagesOfAUser($where) {
        return Chat::select('chats.*', 'students.profile_image as student_image', 'coaches.profile_image as coach_image')
            ->join('students', 'students.id', '=', 'chats.student_id')
            ->join('coaches', 'coaches.id', '=', 'chats.coach_id')
            ->where($where)->get();
    }
    public function show($id = null) {
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            return view('common/error')->with('errorMessage', 'Invalid or tampered ID');
        }

        $user = Auth::user();

        if ($user->role == 'coach') {
            $data['type'] = 'Coach';
            $coachId = Session::get('coachId');
            $coach = Coach::find($coachId);

//            $users = Program::select('students.*')
//                ->join('applies', 'applies.program_id', '=', 'programs.id')
//                ->join('students', 'students.id', '=', 'applies.student_id')
//                ->where(['coach_id' => $coachId])
//                ->get();
//            $data['users'] = $users;

            $users = Student::join('chats', 'chats.student_id', '=', 'students.id')
                ->where(['chats.coach_id' => $coachId])
                ->select('students.*') // Select the columns you need from the coaches table
                ->distinct()
                ->get();
            $data['users'] = $users;

            if (!$users->isEmpty() && $id == null) {
                $id = $users[0]->id;
            }

            $student = Student::find($id);

            $data['receiver'] = $student;
            $data['sender'] = $coach;

            if ($student) {
                $data['messages'] = $this->getMessagesOfAUser(['chats.student_id' => $student->id]);
            } else {
                $data['messages'] = [];
            }

            if ($data['messages']) {
                $chat = Chat::where(['student_id' => $id, 'coach_id' => $coach->id]);
                $chat->update(['status' => 'read']);
            }
        } else {
            $data['type'] = 'Student';
            $studentId = Session::get('studentId');
            $student = Student::find($studentId);

//            $users = Program::select('coaches.*')
//                ->join('coaches', 'coaches.id', '=', 'programs.coach_id')
//                ->join('applies', 'applies.program_id', '=', 'programs.id')
//                ->where(['student_id' => $studentId])
//                ->get();
//            $data['users'] = $users;

            $users = Coach::join('chats', 'chats.coach_id', '=', 'coaches.id')
                ->where(['chats.student_id' => $studentId])
                ->select('coaches.*') // Select the columns you need from the coaches table
                ->distinct()
                ->get();
            $data['users'] = $users;

            if (!$users->isEmpty() && $id == null) {
                $id = $users[0]->id;
            }

            $coach = Coach::find($id);

            $data['receiver'] = $coach;
            $data['sender'] = $student;

            $data['messages'] = $this->getMessagesOfAUser(['chats.coach_id' => $id, 'chats.student_id' => $student->id]);

            if ($data['messages']) {
                $chat = Chat::where(['student_id' => $student->id, 'coach_id' => $id]);
                $chat->update(['status' => 'read']);
            }
        }

        $data['studentId'] = $id;
        $data['userId'] = $user->id;

        return view('common/chat/chat', $data);
    }

    public function getNewMessages($id) {
        $user = Auth::user();

        if ($user->role == 'coach') {
            $coachId = Session::get('coachId');
            $where = ['student_id' => $id, 'status' => 'unread', 'chats.sender' => 'Student', 'chats.coach_id' => $coachId];
            $newMessages = Chat::select('chats.*', 'students.profile_image', 'students.first_name')
                ->join('students', 'students.id', '=', 'chats.student_id')
                ->where($where)
                ->get();
        } else {
            $studentId = Session::get('studentId');
            $where = ['coach_id' => $id, 'status' => 'unread', 'chats.sender' => 'Coach', 'chats.student_id' => $studentId];
            $newMessages = Chat::select('chats.*', 'coaches.profile_image', 'coaches.first_name')
                ->join('coaches', 'coaches.id', '=', 'chats.coach_id')
                ->where($where)
                ->get();
        }

        if ($newMessages) {
            $chat = Chat::where($where);
            $chat->update(['status' => 'read']);
        }

        return response($newMessages);
    }

    public function store(Request $request) {
        $user = Auth::user();

        $tableData = [
            'message' => $request->message,
        ];

        if ($user->role == 'coach') {
            $tableData['sender'] = 'Coach';
            $tableData['coach_id'] = Session::get('coachId');
            $tableData['student_id'] = $request->receiverId;
        } else {
            $tableData['sender'] = 'Student';
            $tableData['student_id'] = Session::get('studentId');
            $tableData['coach_id'] = $request->receiverId;
        }

        Chat::create($tableData);
        return response(['status' => 'success']);
    }
}
