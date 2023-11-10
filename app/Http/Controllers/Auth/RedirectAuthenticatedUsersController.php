<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        if (auth()->user()->role == 'coach') {
            return redirect('/dashboard');
        }
        elseif(auth()->user()->role == 'student') {
            if (auth()->user()->is_profile_completed == 'not-completed') {
                return redirect('/profile/student');
            } else {
                return redirect('/student/dashboard');
            }
        }
        elseif(auth()->user()->role == 'guest') {
            return redirect('/guestDashboard');
        }
        else {
            return auth()->logout();
        }
    }
}
