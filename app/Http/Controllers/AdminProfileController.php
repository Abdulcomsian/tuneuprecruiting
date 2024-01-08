<?php

namespace App\Http\Controllers;

use App\Helpers\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Coach;
use App\Models\ProgramType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminProfileController extends Controller
{
    public function profile() {
        $data['user'] = Auth::user();

        $data['email'] = $data['user']->email;

        $data['programTypes'] = ProgramType::all();

        return view('admin/profile/profile', $data);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $user->name = $request->name;
        Session::put('firstName', $request->name);

        if ($request->has('password') && !empty($request->input('password'))) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return back()->with('success', 'Profile updated.');
    }
}
