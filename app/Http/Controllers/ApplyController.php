<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{
    public function applies() {
        $user = User::with(['student.applies'])->findOrFail(Auth::user()->id);

        $data['applies'] = $user->applies()->with('student')->get();

        return view('backend/applies/applies', $data);
    }
}
