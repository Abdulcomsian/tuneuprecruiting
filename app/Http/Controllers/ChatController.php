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

class ChatController extends Controller
{
//    public function getMessagesOfAUser($where, $type)
//    {
//        return Chat::select('chats.*', 'students.profile_image as student_image', 'coaches.profile_image as coach_image')
//            ->join('students', 'students.id', '=', 'chats.student_id')
//            ->join('coaches', 'coaches.id', '=', 'chats.coach_id')
//            ->where($where)->get();
//    }

    public function getMessagesOfAUser($where, $type)
    {
        $baseColumns = ['chats.*', 'coaches.profile_image as coach_image'];
        $additionalColumns = $type === 'Admin' ? [] : ['students.profile_image as student_image'];

        return Chat::select(array_merge($baseColumns, $additionalColumns))
            ->join('coaches', 'coaches.id', '=', 'chats.coach_id')
            ->when($type === 'Admin', function ($query) {
                $query->join('users', 'users.id', '=', 'chats.admin_id');
            })
            ->when($type !== 'Admin', function ($query) {
                $query->join('students', 'students.id', '=', 'chats.student_id');
            })
            ->where($where)->get();
    }

    public function show(Request $request)
    {
        $user = Auth::user();
        $type = ucfirst($user->role);
        $id = $request->id;

        switch ($type) {
            case 'Admin':
                $adminId = Session::get('adminId');
                $users = Coach::join('chats', 'chats.coach_id', '=', 'coaches.id')
                    ->where('chats.admin_id', $adminId)
                    ->select('coaches.*')
                    ->distinct()
                    ->get();
                break;
            case 'Coach':
                $coachId = Session::get('coachId');
                $coach = Coach::find($coachId);
                $users = Student::join('chats', 'chats.student_id', '=', 'students.id')
                    ->where('chats.coach_id', $coachId)
                    ->select('students.*')
                    ->distinct()
                    ->get();
                $admin = User::where(['role' => 'admin'])->first();
                $users = $users->merge([$admin]);
                break;
            case 'Student':
                $studentId = Session::get('studentId');
                $student = Student::find($studentId);
                $users = Coach::join('chats', 'chats.coach_id', '=', 'coaches.id')
                    ->where('chats.student_id', $studentId)
                    ->select('coaches.*')
                    ->distinct()
                    ->get();
                break;
        }

        if (!$users->isEmpty() && $id === null) {
            $id = $users[0]->id;
        }

        $receiver = $this->findReceiver($request->type, $id);
        $sender = $this->findSender($request->type, $id);

        $data = [
            'type' => $type,
            'users' => $users,
            'receiver' => $receiver,
            'sender' => $sender,
            'studentId' => $id,
            'userId' => $user->id,
        ];

        if ($receiver && $data['users']->isNotEmpty()) {
            $fieldMap = [
                'Coach' => 'student_id',
                'Student' => 'coach_id',
                'Admin' => 'admin_id',
            ];

            $field = $fieldMap[$request->type] ?? $fieldMap['Coach']; // Default to 'Coach' if $type is unexpected

            $data['messages'] = $this->getMessagesOfAUser([
                "chats.{$field}" => $receiver->id
            ], $request->type);

            if ($data['messages']) {
                $where = match ($type) {
                    'Coach' => ['coach_id' => $sender->id, 'student_id' => $receiver->id, 'sender' => 'Student'],
                    'Admin' => ['coach_id' => $sender->id, 'admin_id' => $receiver->id, 'sender' => 'Coach'],
                    default => ['student_id' => $sender->id, 'coach_id' => $receiver->id, 'sender' => 'Coach'], // Default to 'Student' case for other types
                };

                Chat::where($where)->update(['status' => 'read']);
            }
        } else {
            $data['messages'] = [];
        }

        return view('common/chat/chat', $data);
    }

    public function findSender($type, $id)
    {
        $model = match ($type) {
            'Coach' => Coach::class,
            'Student' => Student::class,
            default => User::class,
        };

        return $model::find($id);
    }
    public function findReceiver($type, $id)
    {
        $model = match ($type) {
            'Coach' => Student::class,
            'Student' => Coach::class,
            'Admin' => Coach::class,
            default => User::class,
        };

        return $model::find($id);
    }

    public function getNewMessages(Request $request)
    {
        $id = $request->id;

        $user = Auth::user();
        $role = $user->role;

        $userId = Session::get(strtolower($role) . 'Id');

        if ($role === 'coach') {
            $where = ['student_id' => $id, 'status' => 'unread', 'chats.sender' => 'Student', 'chats.coach_id' => $userId];
            $profileFields = ['students.profile_image', 'students.first_name'];
        } else {
            $where = ['coach_id' => $id, 'status' => 'unread', 'chats.sender' => 'Coach', 'chats.student_id' => $userId];
            $profileFields = ['coaches.profile_image', 'coaches.first_name'];
        }

        $receiver = $role == 'coach' ? 'student' : 'coach';
        $newMessages = Chat::select('chats.*', ...$profileFields)
            ->join($role === 'coach' ? 'students' : 'coaches', $role === 'coach' ? 'students.id' : 'coaches.id', '=', "chats.{$receiver}_id")
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
        ];

        // Determine participants based on user roles
        // $participant1Id = $user->role === 'coach' ? Session::get('coachId') : Session::get('studentId');
        $participant1Id = match ($user->role) {
            'coach' => Session::get('coachId'),
            'student' => Session::get('studentId'),
            'admin' => Session::get('adminId'),
        };
        $participant2Id = $request->userType === 'Admin' ? $request->receiverId : $request->receiverId;  // Same value in both cases, but kept for clarity
        $tableData['sender'] = ucfirst($user->role);

        // Set common fields
        $tableData['coach_id'] = $participant1Id === Session::get('coachId') ? $participant1Id : $participant2Id;
        $tableData[strtolower($request->userType).'_id'] = $participant1Id === Session::get(strtolower($request->userType).'Id') ? $participant1Id : $participant2Id;

        // Handle admin-specific field
        if ($request->userType === 'Admin') {
            $tableData['admin_id'] = $participant2Id;
        }

        // Update apply status if student is involved
        if ($participant2Id === Session::get('studentId')) {
            Apply::where('student_id', $participant2Id)->update(['talking' => 'talking']);
        }

        Chat::create($tableData);
        return response(['status' => 'success']);
    }

    public function notificationMessages()
    {
        $user = auth()->user();
        $role = $user->role;
        $userId = Session::get(strtolower($user->role) . 'Id');

        // $tableName = ($role === 'Student') ? 'students' : 'coaches';
        $tableName = match ($role) {
            'student' => 'students',
            'admin' => 'users',
            'coach' => 'coaches',
        };

        $baseColumns = ['chats.*'];
        $additionalColumns = $user->role === 'admin' ? ['users.name as first_name'] : ["{$tableName}.profile_image", "{$tableName}.first_name"];

        $newMessages = Chat::select(array_merge($baseColumns, $additionalColumns))
            ->join($tableName, "{$tableName}.id", '=', "chats.{$role}_id")
            ->whereIn('chats.id', function ($query) use ($userId, $role) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('chats')
                    ->where("{$role}_id", $userId)
                    ->where('status', 'unread')
                    ->where(function ($query) use ($role) {
                        $query->when($role === 'student', function ($query) {
                            $query->where('sender', 'Coach');
                        })
                            ->when($role === 'admin', function ($query) {
                                $query->where('sender', 'Coach');
                            })
                            ->when($role == 'coach', function ($query) {
                                $query->whereIn('sender', ['Student', 'Admin']);
                            });
                    })
                    ->groupBy("{$role}_id");
            })
            ->get();

        $newMessages->each(function ($message) use ($role) {
            $message->coach_id = encrypt($message->coach_id);
            if ($message->student_id)
                $message->student_id = encrypt($message->student_id);
            else
                $message->admin_id = encrypt($message->admin_id);
            $message->role = $role;
        });

        return response($newMessages);

    }
}
