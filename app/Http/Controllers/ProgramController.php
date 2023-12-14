<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Program;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ProgramRequest;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function store(ProgramRequest $request) {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Handle video upload
        if ($request->hasFile('video_file')) {
            $videoFile = $request->file('video_file');

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

        $data['applies'] = Apply::select('applies.*', 'applies.id as apply_id', 'students.*')
            ->join('students', 'students.id', '=', 'applies.student_id')
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
    public function update(ProgramRequest $request, string $id)
    {
        $program = Program::find($id);
        $this->authorize('edit', $program);

        if (!$program) {
            return redirect()->back()->with('danger', 'Program not exist.');
        } elseif($program->status == 'public') {
            return redirect()->back()->with('danger', 'You are unable to modify the program public status.');
        }

        // Update the post with the validated data
        $program->update($request->all());

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
