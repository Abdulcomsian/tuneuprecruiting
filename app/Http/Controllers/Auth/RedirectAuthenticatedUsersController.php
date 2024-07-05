<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        $userId = auth()->user()->id;
        $user = User::with('payments', 'subscriptions')->findOrFail($userId);
        if ($user->role == 'coach') {
            if ($user->is_profile_completed == 'not-completed') {
                return redirect('/profile');
            } else {
                return redirect('/dashboard');
            }
        } elseif ($user->role == 'student') {
            // dd($user->subscriptions->first());
            $endsAt = optional($user->subscriptions->first() ? $user->subscriptions->first()->ends_at : null);
            $oneTimePayEndsAt = optional($user->payments->first())->ends_at;
            if (
                (!$user->subscriptions()->exists() || ($endsAt && $endsAt->format('Y-m-d H:i:s') <= now())) &&
                (!$user->payments()->exists() || ($oneTimePayEndsAt && $oneTimePayEndsAt <= now()))
            ) {
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
