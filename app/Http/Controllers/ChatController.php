<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function show($id) {
        $data['messages'] = Chat::where(['user_id' => Auth::user()->id, 'student_id' => $id])->with(['student'])->get();
        return view('common/chat/chat', $data);
    }
}
