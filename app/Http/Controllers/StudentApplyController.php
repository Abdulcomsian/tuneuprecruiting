<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Coach;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentApplyController extends Controller
{
    public function programs() {
        $data['programs'] = Program::with('coach')->paginate(10);
//        $programs = Program::with('coach')->paginate(10);
//        dd($programs);
        return view('student_backend/programs/programs', $data);
    }

    public function applies() {
        $studentId = Session::get('studentId');
        $data['applies'] = Apply::join('coaches', 'coaches.id', '=', 'applies.user_id')->where(['applies.student_id' => $studentId])->paginate(10);

        return view('student_backend/applies/applies', $data);
    }

    public function viewProgram($programId) {
        $program = Program::find($programId); // Assuming you have a Program with ID 1
        $coach = $program->coach;

//        return view('student_backend/programs/');
    }
}
