<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\ApplyDetail;
use App\Models\Coach;
use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\User;
use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Mail;
use App\Mail\CreateRecruiterAccountMail;

class RecruiterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['recruiters'] = Coach::all();
        return view('admin/recruiter/recruiter_list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/recruiter/add_new_recruiter');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $password = 'password' . rand(9999, 99999);
        $user = User::create([
            'name' => $request->first_name,
            'email' => $request->email,
            'role' => 'coach',
            'password' => Hash::make($password),
        ]);

        $coach = Coach::create([
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'college_or_university' => $request->college_or_university,
            'gender' => $request->gender,
            'program_type' => $request->program_type
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        dd($status);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coach $coach)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coach $coach)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coach $coach)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($userId)
    {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            return response()->view('common.error', ['errorMessage' => 'UnAuthorize']);
        }
        $userToDelete = User::findOrFail($userId);
        $userToDelete->trash = 'trashed';
        $userToDelete->save();

        $coach = Coach::where(['user_id' => $userId])->first();
        $coach->trash = 'trashed';
        $coach->save();

        $programs = Program::where(['coach_id' => $coach->id])->get();
        Program::where(['coach_id' => $coach->id])->update(['trash' => 'trashed']);

        if ($programs) {
            foreach ($programs as $program) {
                $applies = Apply::where(['program_id' => $program->id])->get();
                Apply::where(['program_id' => $program->id])->update(['trash' => 'trashed']);
                foreach ($applies as $apply) {
                    ApplyDetail::where(['apply_id' => $apply->id])->update(['trash' => 'trashed']);
                }
            }
        }

        return redirect()->back()->with('success', 'Recruiter deleted.');
    }
}
