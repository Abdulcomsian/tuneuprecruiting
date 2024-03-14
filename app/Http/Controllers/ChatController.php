<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Chat;
use App\Models\Coach;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\isEmpty;

class ChatController extends Controller
{
    public function getMessagesOfAUser($sender, $receiver) {
        return Chat::where(function ($query) use ($sender, $receiver) {
            $query->where(function ($query) use ($sender, $receiver) {
                $query->where('sender_id', $sender->id)
                    ->where('receiver_id', $receiver->id);
            })->orWhere(function ($query) use ($sender, $receiver) {
                $query->where('sender_id', $receiver->id)
                    ->where('receiver_id', $sender->id);
            });
        })->get();
    }

    public function getUserList($user) {
        $users = User::select('users.*')
            ->join('chats', function ($join) use ($user) {
                $join->on('chats.receiver_id', '=', 'users.id')
                    ->orOn('chats.sender_id', '=', 'users.id');
            })
            ->where(function ($query) use ($user) {
                $query->where('chats.sender_id', '=', $user->id)
                    ->orWhere('chats.receiver_id', '=', $user->id);
            })
            ->where('users.id', '<>', $user->id) // Exclude the current user
            ->distinct()
            ->get();
        if ($user->role === 'coach' && $users->isEmpty()) {
            $users->push(User::whereRole('admin')->first());
        }

        return $users;
    }

    public function setProfileImage(&$user, $roleModel) {
        $user->profile_image = $roleModel::find($user->id)->profile_image ?? 'default.jpg';
    }

    public function show(Request $request) {
        $id = $request->id;
        $sender = Auth::user();

        $users = $this->getUserList($sender);

        if (!$users->isEmpty() && $id === null) {
            $id = $users[0]->id;
        }
        $receiver = User::find($id);

        $this->setProfileImage($sender, $sender->role === 'coach' ? Coach::class : Student::class);

        if (!isEmpty($receiver))
            $this->setProfileImage($receiver, $receiver->role === 'coach' ? Coach::class : Student::class);

        $data = [
            'type' => $sender->role,
            'users' => $users,
            'receiver' => !isEmpty($receiver) ? [] : $receiver,
            'sender' => $sender,
        ];

        if ($receiver && $data['users']->isNotEmpty()) {
            $data['messages'] = $this->getMessagesOfAUser($sender, $receiver);

            if ($data['messages']) {
                Chat::where(['sender_id' => $receiver->id, 'receiver_id' => $sender->id])->update(['status' => 'read']);
            }
        } else {
            $data['messages'] = [];
        }

        return view('common/chat/chat', $data);
    }

    public function getNewMessages(Request $request)
    {
        $id = $request->id;

        $user = Auth::user();
        $role = $user->role;

        if ($role === 'coach') {
            $where = ['chats.sender_id' => $id, 'status' => 'unread', 'chats.sender_type' => 'student', 'chats.receiver_id' => $user->id];
            $profileFields = ['students.profile_image', 'students.first_name'];
        } else {
            $where = ['chats.sender_id' => $id, 'status' => 'unread', 'chats.sender_type' => 'coach', 'chats.receiver_id' => $user->id];
            $profileFields = ['coaches.profile_image', 'coaches.first_name'];
        }

        $newMessages = Chat::select('chats.*', ...$profileFields)
            ->join($role === 'coach' ? 'students' : 'coaches', $role === 'coach' ? 'students.user_id' : 'coaches.user_id', '=', "chats.sender_id")
            ->where($where)
            ->get();

        if ($newMessages->isNotEmpty()) {
            $chat = Chat::where($where);
            $chat->update(['status' => 'read']);
        }

        return response($newMessages);
    }

    public function store(Request $request)
    {
        $request->receiverId = decrypt($request->receiverId);

        $user = Auth::user();

        $tableData = [
            'message' => $request->message,
            'sender_id' => $user->id,
            'receiver_id' => $request->receiverId,
            'sender_type' => $user->role
        ];

        // Update apply status if student is involved
        if ($user->role == 'student') {
            $student = Student::where(['user_id' => $user->id])->first();
            Apply::where('student_id', $student->id)->update(['talking' => 'talking']);
        }

        Chat::create($tableData);
        return response(['status' => 'success']);
    }

    public function notificationMessages() {
        $sender = auth()->user();
        $role = $sender->role;

        $newMessages = Chat::select('chats.*', 'users.name as receiver_name')
            ->join('users', 'users.id', '=', 'chats.sender_id')
            ->where('receiver_id', $sender->id)
            ->where('chats.status', 'unread')
            ->groupBy('chats.sender_id')
            ->latest('chats.created_at')
            ->get();

        $groupedMessages = $newMessages->groupBy('sender_id');

        // If you want to get the last message for each sender
        $latestMessages = $groupedMessages->map(function ($messages) {
            return $messages->first();
        });

        $latestMessages->map(function ($message) use ($role) {
            $message->profile_image = $this->getProfileImage($message->sender_type, $message->sender_id) ?? 'default.jpg';
            $message->sender_id = encrypt($message->sender_id);
            $message->receiver_id = encrypt($message->receiver_id);
            $message->role = $role;
        });

        return response($newMessages);

    }

    public function delete($userId) {
        $userId = decrypt($userId);
        $receiver = User::find($userId);

        $user = Auth::user();

        $messages = $this->getMessagesOfAUser($receiver, $user);
        foreach ($messages as $message) {
            Chat::find($message->id)->delete();
        }

        return redirect()->back();
    }

    public function getProfileImage($senderType, $senderId) {
        return $senderType === 'coach'
            ? Coach::find($senderId, ['profile_image'])
            : Student::find($senderId, ['profile_image']);
    }
}
