<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        $user = auth()->user();

        if ($user->role == 'coach') {
            if ($user->is_profile_completed == 'not-completed') {
                return redirect('/profile');
            } else {
                return redirect('/dashboard');
            }
        }
        elseif($user->role == 'student') {
            if ($user->is_profile_completed == 'not-completed') {
                return redirect('/profile/student');
            } else {
                return redirect('/student/dashboard');
            }
        }
        elseif($user->role == 'admin') {
            return redirect('/admin/dashboard');
        }
        else {
            auth()->logout();
            return redirect()->back();
        }
    }
}
