<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruiterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $userToDelete->delete();

        Coach::where(['user_id' => $userId])->delete();

        return redirect()->back()->with('success', 'Recruiter deleted.');
    }
}
