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

    public function viewNotification($notificationId) {
        $notification = Notification::findOrFail($notificationId);

        $this->authorize('view', $notification);

        $notification->status = 'read';
        $notification->save();

        return redirect($notification->route);
    }
}
