<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function show($id) {
        $user = Auth::user();
        $data['userId'] = 11;
        $student = Student::find($id);

        $data['messages'] = $user->chats()->paginate(10);
//        echo "<pre>";
//        print_r($data['messages']);die;

        return view('common/chat/chat', $data);
    }
}
