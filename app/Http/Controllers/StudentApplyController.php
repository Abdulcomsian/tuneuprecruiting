<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentApplyController extends Controller
{
    public function programs() {
        $data['programs'] = Program::with('coach')->paginate(10);
//        $programs = Program::with('coach')->paginate(10);
//        dd($programs);
        return view('student_backend/programs/programs', $data);
    }

    public function viewProgram($programId) {
        $program = Program::find($programId); // Assuming you have a Program with ID 1
        $coach = $program->coach;

//        return view('student_backend/programs/');
    }
}
