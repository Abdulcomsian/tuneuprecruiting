<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getNotifications() {
        $user = Auth::user();

        $data['notifications'] = Notification::where(['user_id' => $user->id, 'status' => 'unread'])->get();

        return response($data);
    }
}
