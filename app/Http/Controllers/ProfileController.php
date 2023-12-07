<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Coach;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
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
        $user = Auth::user();
        $data['user'] = Coach::where(['user_id' => $user->id])->first();
        $data['email'] = $user->email;

        return view('backend/profile/profile', $data);
    }

    public function updateProfile(Request $request) {
        $user = Auth::user();
        $coach = Coach::where('user_id', $user->id)->firstOrFail();

        // Define validation rules
        $rules = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'about_me' => 'nullable|string',
            'bio' => 'nullable|string',
            'website' => 'nullable|url',
        ];

        // Add password rule if provided
        if (!empty($request->input('password'))) {
            $rules['password'] = 'required|min:8|confirmed';
        }

        // Validate request data
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update user data
        $coach->fill($request->only(['first_name', 'last_name', 'about_me', 'website']));
        $coach->save();

        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
            $user->save();
        }

        return back()->with('success', 'Profile updated.');
    }

    public function updateProfileImage(Request $request) {
        $user = Auth::user();

        $imagePath = 'uploads/users_image/';
        $videoPath = 'uploads/users_video/';

        $data = ($user->role === 'student')
            ? Student::where(['user_id' => $user->id])->first()
            : Coach::where(['user_id' => $user->id])->first();

        if (!$data) {
            dd("Error: invalid user role");
        }

        // validate image upload
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|file|mimes:jpg,png,jpeg', // Specify allowed file formats
            ]);

            $oldImagePath = $imagePath . $data->profile_image;
            $this->deleteFileIfExists($oldImagePath);

            $filename = $this->uploadFile($request->file('image'), $imagePath);
            $data->profile_image = $filename;

            Session::put('profileImage', $filename);
        } else if ($request->hasFile('video')) {
            $request->validate([
                'video' => 'required|file|mimes:mp4', // Specify allowed file formats
            ]);

            $oldVideoLink = $videoPath . $data->short_video;
            $this->deleteFileIfExists($oldVideoLink);

            $filename = $this->uploadFile($request->file('video'), $videoPath);
            $data->short_video = $filename;
        } else {
            return redirect()->back()->with('danger', 'Image or video not uploaded.');
        }

        $data->save();

        return redirect()->back()->with('success', 'Video or image uploaded...');
    }

    private function uploadFile($file, $path): string
    {
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path($path), $filename);

        return $filename;
    }

    private function deleteFileIfExists($path): void
    {
        if (file_exists($path) && is_file($path)) {
            unlink($path);
        }
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
