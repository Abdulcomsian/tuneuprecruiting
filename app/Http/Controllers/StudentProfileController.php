<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    public function profile() {
        $user = Auth::user();
        $data['user'] = Student::where(['user_id' => $user->id])->first();
        $data['email'] = $user->email;

        return view('student_backend/profile/profile', $data);
    }

    public function updateProfile(Request $request) {
        $user = Auth::user();
        $student = Student::where(['user_id' => $user->id])->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Define the validation rules array
        $rules = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'graduation_year' => 'required|string',
            'home_town' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
        ];

        // Add the password rule conditionally
        if (!empty($request->input('password'))) {
            $rules['password'] = 'min:8|confirmed';
        }

        // Validate the request data
        $request->validate($rules);

        // If the validation fails, the code below won't execute.

        // Update the user's data
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->graduation_year = $request->input('graduation_year');
        $student->home_town = $request->input('home_town');
        $student->state = $request->input('state');
        $student->country = $request->input('country');
        $student->save();

        if ($request->has('password') && !empty($request->input('password'))) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->is_profile_completed = 'completed';
        $user->save();

        return redirect()->back()->with('success', 'Profile updated.');
    }
}
