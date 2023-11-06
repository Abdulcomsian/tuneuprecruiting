<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Coach;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function profile() {
        $data['user'] = Auth::user();
        return view('backend/profile/profile', $data);
    }

    public function updateProfile(Request $request) {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Define the validation rules array
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'about_me' => 'nullable|string',
            'bio' => 'nullable|string',
            'website' => 'nullable|url',
        ];

        // Add the password rule conditionally
        if (!empty($request->input('password'))) {
            $rules['password'] = 'min:8|confirmed';
        }

        // Validate the request data
        $request->validate($rules);

        // If the validation fails, the code below won't execute.

        // Update the user's data
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->about_me = $request->input('about_me');
        $user->bio = $request->input('bio');
        $user->website = $request->input('website');

        if ($request->has('password') && !empty($request->input('password'))) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated.');
    }

    public function updateProfileImage(Request $request) {
        $user = Auth::user();

        if ($user->role == 'student') {
            $data = Student::where(['user_id' => $user->id])->first();
            $imagePath = 'uploads/students_image/';
            $videoPath = 'uploads/students_videos/';
        } else if ($user->role == 'coach') {
            $data = Coach::where(['user_id' => $user->id])->first();
            $imagePath = 'uploads/users_image/';
            $videoPath = 'uploads/users_video/';
        } else {
            dd("Error: invalid user role");
        }
        // uploading profile image
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'file|mimes:jpg,png,jpeg', // Specify allowed file formats
            ]);

            if ($user->profile_image) {
                $oldImagePath = $imagePath . $user->profile_image;
                unlink($oldImagePath);
            }

            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path($imagePath), $filename);

            $data->profile_image = $filename;
        } else if($request->hasFile('video')) {
            $request->validate([
                'video' => 'file|mimes:mp4', // Specify allowed file formats
            ]);

            if ($user->short_video) {
                $oldVideoLink = $videoPath . $user->short_video;
                unlink($oldVideoLink);
            }

            $file= $request->file('video');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path($videoPath), $filename);

            $data->short_video = $filename;
        }
        else {
            return redirect()->back()->with('danger', 'Image or video not uploaded.');
        }

        $data->save();

        return redirect()->back()->with('success', 'Video or image uploaded...');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
