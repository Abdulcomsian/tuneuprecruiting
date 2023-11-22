<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\ApplyDetail;
use App\Models\Coach;
use App\Models\Program;
use App\Models\ProgramQuestion;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentApplyController extends Controller
{
    public function programs() {
        $data['programs'] = Program::with('coach')->get();
//        $programs = Program::with('coach')->paginate(10);
//        dd($programs);
        return view('student_backend/programs/programs', $data);
    }

    public function studentApply($programId) {
        $data['program'] = Program::find($programId);
        $data['customFields'] = json_decode($data['program']->custom_fields);

        //dd($data['customFields']);
        //$data['questions'] = ProgramQuestion::where(['program_id' => $programId])->get();

        $user = auth()->user();
        $data['user'] = Student::where(['user_id' => $user->id])->first();

        return view('student_backend/applies/apply', $data);
    }

    public function apply(Request $request, $programId) {
        $user = auth()->user();

        $label = $request->label;
        $type = $request->type;
        $answer = $request->answer;

        $programData = [
            'student_id' => $user->id,
            'program_id' => $programId,
            'status' => 'UNREAD'
        ];

        $apply = Apply::create($programData);

        if($request->has('files')) {
            $file_label = $request->file_label;
            $file_type = $request->file_type;

            $request->validate([
                'files.*' => 'file|mimes:jpg,png,jpeg,mp4', // Specify allowed file formats
            ]);

            foreach ($request->file('files') as $key => $file) {

                $file->store('uploads/apply_data/'); // 'uploads' is the storage folder; adjust as needed asset('storage/' . $file->file_path)

                $tableData = [
                    'apply_id' => $apply->id,
                    'label' => $file_label[$key],
                    'type' => $file_type[$key],
                    'answer' => $file->getClientOriginalName()
                ];

                ApplyDetail::create($tableData);
            }
        }

        for ($i = 0; $i < count($label); $i++) {
            $tableData = [
                'apply_id' => $apply->id,
                'label' => $label[$i],
                'type' => $type[$i],
                'answer' => $answer[$i]
            ];

            ApplyDetail::create($tableData);
        }

        return redirect()->back()->with('success', 'Apply Stored Successfully....');
    }

    public function applies() {
        $studentId = Session::get('studentId');
        $data['applies'] = Apply::join('programs', 'programs.id', '=', 'applies.program_id')
            ->join('coaches', 'coaches.id', '=', 'programs.coach_id')
            ->where(['applies.student_id' => $studentId])->get();

        return view('student_backend/applies/applies', $data);
    }

    public function viewProgram($programId) {
        $program = Program::find($programId); // Assuming you have a Program with ID 1
        $coach = $program->coach;

//        return view('student_backend/programs/');
    }
}
