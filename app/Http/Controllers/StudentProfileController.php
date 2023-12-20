<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Helpers\FileUploadHelper;
use App\Http\Requests\StudentProfileRequest;

class StudentProfileController extends Controller
{
    public function profile() {
        $user = Auth::user();
        $data['user'] = Student::where(['user_id' => $user->id])->first();
        $data['email'] = $user->email;

        $data['countries'] = Country::all();

        return view('student_backend/profile/profile', $data);
    }

    public function updateProfile(StudentProfileRequest $request) {
        $user = Auth::user();
        $student = Student::where(['user_id' => $user->id])->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Image upload
        $student = FileUploadHelper::handleFileUpload($request, 'profile_image', 'uploads/users_image/', $student);
        Session::put('profileImage', $student->profile_image);

        // Video upload
        $student = FileUploadHelper::handleFileUpload($request, 'short_video', 'uploads/students_videos/', $student);

        // CV upload
        $student = FileUploadHelper::handleFileUpload($request, 'cv', 'uploads/student_cv/', $student);

        // Update student data
        $student->fill($request->all());

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
