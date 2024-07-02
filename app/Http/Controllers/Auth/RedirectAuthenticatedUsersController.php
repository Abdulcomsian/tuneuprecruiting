<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        $userId = auth()->user()->id;
        $user = User::findOrFail($userId);
        if ($user->role == 'coach') {
            if ($user->is_profile_completed == 'not-completed') {
                return redirect('/profile');
            } else {
                return redirect('/dashboard');
            }
        } elseif ($user->role == 'student') {
            if (!$user->subscriptions()->exists()) {
                auth()->logout();
                return redirect()->route('plans.index');
            }
            if ($user->is_profile_completed == 'not-completed') {
                return redirect('/profile/student');
            } else {
                return redirect('/student/dashboard');
            }
        } elseif ($user->role == 'admin') {
            return redirect('/admin/dashboard');
        } else {
            auth()->logout();
            return redirect()->back();
        }
    }
}
