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

            $id = ($id == null) ? $users[0]->student_id : $id;
            dd($id);
            $student = Student::find($id);

            $data['receiver'] = $student;
            $data['sender'] = $coach;

            $data['messages'] = Chat::select('chats.*', 'students.profile_image as student_image', 'coaches.profile_image as coach_image')
                ->join('students', 'students.id', '=', 'chats.student_id')
                ->join('coaches', 'coaches.id', '=', 'chats.coach_id')
                ->where(['chats.student_id' => $student->id])->get();
            $data['type'] = 'Coach';
        } else {

        }
        // $data['student'] = Student::find($id);
        // $data['messages'] = Chat::where(['coach_id' => $user->id, 'student_id' => $id])->with(['student'])->get();

//        $data['type'] = $userType;
        $data['studentId'] = $id;
        $data['userId'] = $user->id;

        if (false) {
            $chat = Chat::find($messageId);
            $chat->status = 'read';
            $chat->save();
        }

        return view('common/chat/chat', $data);
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
