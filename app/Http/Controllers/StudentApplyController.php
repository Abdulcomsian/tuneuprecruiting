<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\ApplyDetail;
use App\Models\Coach;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ApplyRequest;


class StudentApplyController extends Controller
{
    public function programs() {
        $gender = Session::get('gender');
        $programType = Session::get('programType');

        $data['programs'] = Program::select('programs.*', 'coaches.first_name', 'coaches.last_name', 'coaches.college_or_university')
            ->join('coaches', 'coaches.id', '=', 'programs.coach_id')
            ->where(['programs.status' => 'public', 'programs.program_for' => $gender, 'programs.program_type' => $programType])
            ->get();

        return view('student_backend/programs/programs', $data);
    }

    public function requirementForm($id) {
        dd($id);
    }

    public function studentApply(Request $request) {
        $programId = $request->id;
        $data['program'] = Program::select('programs.*', 'coaches.first_name', 'coaches.last_name')
            ->join('coaches', 'coaches.id', '=', 'programs.coach_id')
            ->where(['programs.id' => $programId])
            ->first();

        $data['customFields'] = json_decode($data['program']->custom_fields);

        $user = auth()->user();
        $data['user'] = Student::where(['user_id' => $user->id])->first();

        return view('student_backend/applies/apply', $data);
    }

    public function apply(ApplyRequest $request) {
        $studentId = Session::get('studentId');

        // Check when already applied
        if (Apply::where(['student_id' => $studentId, 'program_id' => $request->id])->count()) {
            return redirect()->back()->with('success', 'You have previously submitted an application for this program.');
        }

        // update student
        $student = Student::find($studentId);
        $student->fill($request->all());
        $student->save();

        $label = $request->label;
        $type = $request->type;
        $answer = $request->answer;

        $programData = [
            'student_id' => $studentId,
            'program_id' => $request->id,
            'status' => 'UNREAD'
        ];

        $apply = Apply::create($programData);

        // radio buttons
        if ($request->has('radio_counter')) {
            $radioCounter = $request->radio_counter;
            $radioLabel = $request->radio_label;

            for ($i = 0; $i <= $radioCounter; $i++) {
                $variableName = 'radio_'.$i;

                $tableData = [
                    'apply_id' => $apply->id,
                    'label' => $radioLabel[$i],
                    'type' => "radio-group",
                    'answer' => $request->$variableName
                ];

                ApplyDetail::create($tableData);
            }
        }

        if ($request->has('checkbox_labels')) {
            $checkboxLabels = $request->checkbox_labels;
            $checkboxTypes = $request->checkbox_types;

            for ($i = 0; $i < count($checkboxLabels); $i++) {
                $variableName = 'checkbox_'.$i;
                $tableData = [
                    'apply_id' => $apply->id,
                    'label' => $checkboxLabels[$i],
                    'type' => $checkboxTypes[$i],
                    'answer' => json_encode($request->$variableName)
                ];

                ApplyDetail::create($tableData);
            }
        }

        if($request->has('files')) {
            $file_label = $request->file_label;
            $file_type = $request->file_type;

            $request->validate([
                'files.*' => 'file|mimes:jpg,png,jpeg,mp4', // Specify allowed file formats
            ]);

            foreach ($request->file('files') as $key => $file) {
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('uploads/apply_data'), $filename);

                $tableData = [
                    'apply_id' => $apply->id,
                    'label' => $file_label[$key],
                    'type' => $file_type[$key],
                    'answer' => $filename
                ];

                ApplyDetail::create($tableData);
            }
        }

        if ($request->has('label')) {
            if ($label || empty($label)) {
                for ($i = 0; $i < count($label); $i++) {
                    $tableData = [
                        'apply_id' => $apply->id,
                        'label' => $label[$i],
                        'type' => $type[$i],
                        'answer' => $answer[$i]
                    ];

                    ApplyDetail::create($tableData);
                }
            }
        }

        return redirect()->route('program.apply.view', encrypt($apply->id));
    }

    public function applies() {
        $studentId = Session::get('studentId');
        $data['applies'] = Apply::select('applies.*', 'applies.id as apply_id', 'programs.*', 'coaches.*')
            ->join('programs', 'programs.id', '=', 'applies.program_id')
            ->join('coaches', 'coaches.id', '=', 'programs.coach_id')
            ->where(['applies.student_id' => $studentId])->get();

        return view('student_backend/applies/applies', $data);
    }

    public function viewProgram(Request $request) {
        $programId = $request->id;
        $program = Program::find($programId);
        $data['program'] = $program;
        $data['coach'] = Coach::find($program->coach_id);

        return view('student_backend/programs/view_program', $data);
    }

    public function applyView(Request $request) {
        $applyId = $request->id;

        $data['applyDetails'] = Apply::join('apply_details', 'applies.id', '=', 'apply_details.apply_id')
            ->join('programs', 'programs.id', '=', 'applies.program_id')
            ->where(['applies.id' => $applyId])
            ->get();

        $data['program'] = Program::join('applies', 'applies.program_id', '=', 'programs.id')
            ->join('coaches', 'coaches.id', '=', 'programs.coach_id')
            ->where(['applies.id' => $applyId])
            ->first();

        return view('student_backend/applies/view_apply', $data);
    }
}
