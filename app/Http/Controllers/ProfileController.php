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
use App\Helpers\FileUploadHelper;

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

        // Image upload
        $coach = FileUploadHelper::handleFileUpload($request, 'profile_image', 'uploads/users_image/', $coach);
        Session::put('profileImage', $coach->profile_image);

        // Video upload
        $coach = FileUploadHelper::handleFileUpload($request, 'short_video', 'uploads/users_video/', $coach);

        // Update user data
        $coach->fill($request->only(['first_name', 'last_name', 'about_me', 'website']));
        $coach->save();

        if ($request->has('password') && !empty($request->input('password'))) {
            $user->password = bcrypt($request->input('password'));
            $user->save();
        }

        return back()->with('success', 'Profile updated.');
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
