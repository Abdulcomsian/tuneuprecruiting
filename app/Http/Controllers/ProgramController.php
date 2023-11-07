<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $data['programs'] = Program::where(['user_id' =>$user->id])->paginate(10);
        return view('backend/program/programs', $data);
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
        $user = Auth::user();
        $request->request->add(['user_id' => $user->id]);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $rules = [
            'program_name' => 'required|string',
            'number_of_students' => 'required|string',
            'session' => 'required|string',
        ];

        // Validate the request data
        $request->validate($rules);

        Program::create($request->all());

        return redirect()->back()->with('success', 'Program created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $program = Program::find($id);
        return response()->json($program);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $program = Program::find($id);

        if (!$program) {
            return redirect()->back()->with('danger', 'Program not exist.');
        }

        // Validate the request data
        $validatedData = $request->validate([
            'program_name' => 'required|string',
            'number_of_students' => 'required|string',
            'session' => 'required|string',
        ]);

        // Update the post with the validated data
        $program->update($validatedData);

        return redirect()->back()->with('success', 'Program updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Program::destroy($id);
        return redirect()->back()->with('success', 'Program deleted.');
    }
}
