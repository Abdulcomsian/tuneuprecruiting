<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentDashboard extends Controller
{
    public function dashboard() {
        return view('student_backend/dashboard/dashboard');
    }
}
