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
    public function show(Request $request, $id = null) {
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            return view('common/error')->with('errorMessage', 'Invalid or tampered ID');
        }

        $user = Auth::user();

        if ($user->role == 'coach') {
            $coachId = Session::get('coachId');
            $coach = Coach::find($coachId);

            $users = Program::select('students.*')
                ->join('applies', 'applies.program_id', '=', 'programs.id')
                ->join('students', 'students.id', '=', 'applies.student_id')
                ->where(['coach_id' => $coachId])
                ->get();
            $data['users'] = $users;

            $id = ($id == null) ? $users[0]->id : $id;

            $student = Student::find($id);

            $data['receiver'] = $student;
            $data['sender'] = $coach;

            $data['messages'] = Chat::select('chats.*', 'students.profile_image as student_image', 'coaches.profile_image as coach_image')
                ->join('students', 'students.id', '=', 'chats.student_id')
                ->join('coaches', 'coaches.id', '=', 'chats.coach_id')
                ->where(['chats.student_id' => $student->id])->get();
            $data['type'] = 'Coach';

            if ($data['messages']) {
                $chat = Chat::where(['student_id' => $id, 'coach_id' => $coach->id]);
                $chat->update(['status' => 'read']);
            }
        } else {
            $studentId = Session::get('studentId');
            $student = Student::find($studentId);

            $users = Program::select('students.*')
                ->join('applies', 'applies.program_id', '=', 'programs.id')
                ->join('students', 'students.id', '=', 'applies.student_id')
                ->where(['student_id' => $studentId])
                ->get();
            $data['users'] = $users;

            $id = ($id == null) ? $users[0]->id : $id;

            $coach = Coach::find($id);

            $data['receiver'] = $coach;
            $data['sender'] = $student;

            $data['messages'] = Chat::select('chats.*', 'students.profile_image as student_image', 'coaches.profile_image as coach_image')
                ->join('students', 'students.id', '=', 'chats.student_id')
                ->join('coaches', 'coaches.id', '=', 'chats.coach_id')
                ->where(['chats.student_id' => $student->id])->get();
            $data['type'] = 'Student';

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
            $newMessages = Chat::select('chats.*', 'students.profile_image', 'students.first_name')
                ->join('students', 'students.id', '=', 'chats.student_id')
                ->where(['student_id' => $id, 'status' => 'unread', 'chats.sender' => 'Coach', 'chats.coach_id' => $coachId])
                ->get();
        } else {
            $studentId = Session::get('studentId');
            $newMessages = Chat::select('chats.*', 'coaches.profile_image', 'coaches.first_name')
                ->join('coaches', 'coaches.id', '=', 'chats.coach_id')
                ->where(['coach_id' => $id, 'status' => 'unread', 'chats.sender' => 'Coach', 'chats.student_id' => $studentId])
                ->get();
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
