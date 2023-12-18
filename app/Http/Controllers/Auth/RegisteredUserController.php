<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use App\Models\Student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Split the string into parts based on the first space
        $nameAndRest = explode(' ', $request->name, 2);

        // The first part is the name
        $firstName = $nameAndRest[0];

        // The second part is the rest of the string
        $lastName = isset($nameAndRest[1]) ? $nameAndRest[1] : '';

        $user = User::create([
            'name' => $firstName,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        if ($request->role == 'student') {
            $student = Student::create(['user_id' => $user->id, 'first_name' => $firstName, 'last_name' => $lastName]);
            Session::put('studentId', $student->id);
            Session::put('profileImage', $student->profile_image);
        } else if ($request->role == 'coach') {
            $coach = Coach::create(['user_id' => $user->id, 'first_name' => $firstName, 'last_name' => $lastName]);
            Session::put('coachId', $coach->id);
            Session::put('profileImage', $coach->profile_image);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
