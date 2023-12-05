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
        $request->request->add(['coach_id' => Session::get('coachId')]);

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

        if ($request->hasFile('video_file')) {
            $request->validate([
                'video_file' => 'file|mimes:mp4,mov,jpeg', // Specify allowed file formats
            ]);

            $file= $request->file('video_file');
            $videoName = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('uploads/program_videos/'), $videoName);

            $request->request->add(['video' => $videoName]);
        }

        $program = Program::create($request->all());

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
