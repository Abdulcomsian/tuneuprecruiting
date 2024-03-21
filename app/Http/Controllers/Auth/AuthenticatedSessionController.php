<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Coach;
use App\Models\Student;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $data['userType'] = $_GET['user'] ?? 'admin';

        return view('auth.login', $data);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = auth()->user();

        if ($user->role == 'student' || $user->role == 'coach') {
            $model = ($user->role == 'student') ? Student::class : Coach::class;
            $profile = $model::where('user_id', $user->id)->first();

            Session::put("{$user->role}Id", $profile->id);
            Session::put('firstName', $profile->first_name);
            Session::put('lastName', $profile->last_name);
            Session::put('profileImage', $profile->profile_image);
            Session::put('gender', $profile->gender);
            Session::put('programType', $profile->program_type);
        } elseif ($user->role == 'admin') {
            Session::put('adminId', $user->id);
            Session::put('firstName', $user->first_name);
            Session::put('profileImage', 'default.jpg');
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
