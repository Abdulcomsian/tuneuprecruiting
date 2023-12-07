<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Program;
use App\Models\ProgramQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $coachId = Session::get('coachId');
        $data['programs'] = Program::where(['coach_id' => $coachId])->get();
        return view('backend/program/programs', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend/program/add_new_program');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Define validation rules
        $rules = [
            'program_name' => 'required|string',
            'number_of_students' => 'required|integer', // Changed type to integer
            'session' => 'required|string',
        ];

        // Add coach ID
        $request->merge(['coach_id' => Session::get('coachId')]);

        // Validate request data
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle video upload
        if ($request->hasFile('video_file')) {
            $videoFile = $request->file('video_file');
            $allowedFormats = ['mp4', 'mov', 'jpeg'];

            $validator = Validator::make(['video_file' => $videoFile], [
                'video_file' => 'required|file|mimes:' . implode(',', $allowedFormats),
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $videoName = date('YmdHi') . $videoFile->getClientOriginalName();
            $videoFile->move(public_path('uploads/program_videos/'), $videoName);

            $request->merge(['video' => $videoName]);
        }

        // Create program
        Program::create($request->all());

        return redirect()->back()->with('success', 'Program created.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $program = Program::find($id);

        $this->authorize('edit', $program);

        $data['program'] = $program;

        $data['applies'] = Apply::join('students', 'students.id', '=', 'applies.student_id')
            ->where(['program_id' => $id, 'applies.trash' => 'active'])
            ->get();

        $data['questions'] = json_decode($program->custom_fields);

        return view('backend/program/program_applies', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $program = Program::find($id);

        $this->authorize('edit', $program);

        if($program->status == 'public') {
            return redirect()->back()->with('danger', 'You are unable to modify the program public status.');
        }

        $data['program'] = $program;
        return view('backend/program/edit_program', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $program = Program::find($id);
        $this->authorize('edit', $program);

        if (!$program) {
            return redirect()->back()->with('danger', 'Program not exist.');
        } elseif($program->status == 'public') {
            return redirect()->back()->with('danger', 'You are unable to modify the program public status.');
        }

        // Validate the request data
        $validatedData = $request->validate([
            'program_name' => 'required|string',
            'number_of_students' => 'required|string',
            'session' => 'required|string',
            'details' => 'string',
            'custom_fields' => 'string',
            'status' => 'string',
        ]);

        // Update the post with the validated data
        $program->update($validatedData);

        return redirect()->route('program.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $program = Program::find($id);
        $this->authorize('edit', $program);
        Program::destroy($id);
        return redirect()->back()->with('success', 'Program deleted.');
    }
}
