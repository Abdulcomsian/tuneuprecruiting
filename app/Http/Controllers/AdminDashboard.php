<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    public function dashboard() {
        $data['users'] = User::select('users.*', 'coaches.first_name', 'coaches.last_name', 'coaches.website', 'coaches.about_me')
            ->join('coaches', 'coaches.user_id', '=', 'users.id')
            ->where(['users.role' => 'coach'])
            ->get();

        return view('admin/dashboard/dashboard', $data);
    }
}
