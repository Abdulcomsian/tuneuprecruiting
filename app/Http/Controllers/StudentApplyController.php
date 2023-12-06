<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\ApplyDetail;
use App\Models\Coach;
use App\Models\Program;
use App\Models\ProgramQuestion;
use App\Models\Student;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class StudentApplyController extends Controller
{
    public function programs() {
        $data['programs'] = Program::with('coach')->where(['programs.status' => 'public'])->get();
        return view('student_backend/programs/programs', $data);
    }

    public function studentApply($programId) {
        try {
            $programId = decrypt($programId);
        } catch (DecryptException $e) {
            return view('common/error')->with('errorMessage', 'Invalid or tampered ID');
        }

        $data['program'] = Program::find($programId);
        $data['customFields'] = json_decode($data['program']->custom_fields);

        //dd($data['customFields']);
        //$data['questions'] = ProgramQuestion::where(['program_id' => $programId])->get();

        $user = auth()->user();
        $data['user'] = Student::where(['user_id' => $user->id])->first();

        return view('student_backend/applies/apply', $data);
    }

    public function apply(Request $request, $programId) {
        // $user = auth()->user();
        $studentId = Session::get('studentId');


        // check when already applied
        $numRows = Apply::where(['student_id' => $studentId, 'program_id' => $programId])->count();
        if ($numRows > 0) {
            //return redirect()->back()->with('success', 'You have previously submitted an application for this program.');
        }

        // validation
        $program = Program::find($programId);
        $inputs = json_decode($program->custom_fields);

        $selectListCounter = 0;
        $inputCounter = 0;
        $fileCounter = 0;
        $radioCounter = 0;
        $rules = [];
        $messages = [];

        foreach ($inputs as $key => $input) {
            if ($input->type == 'checkbox-group') {
                if ($input->required) {
                    $rules["checkbox_$selectListCounter"] = 'required';
                    $messages["checkbox_$selectListCounter.required"] = "The {$input->label} field is required.";
                }
                $selectListCounter++;
            } else if($input->type == 'file') {
                if ($input->required) {
                    $rules["files.$fileCounter"] = 'required';
                    $messages["files.$fileCounter.required"] = "The {$input->label} field is required.";
                }
                $fileCounter++;
            } else if ($input->type == 'radio-group') {
                if ($input->required) {
                    $rules["radio_$radioCounter"] = 'required';
                    $messages["radio_$radioCounter.required"] = "The {$input->label} field is required.";
                }
                $radioCounter++;
            } else {
                if ($input->required) {
                    $rules["answer.$inputCounter"] = 'required';
                    $messages["answer.$inputCounter.required"] = "The {$input->label} field is required.";
                }
                $inputCounter++;
            }
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        //dd($validator);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $label = $request->label;
        $type = $request->type;
        $answer = $request->answer;

        $programData = [
            'student_id' => $studentId,
            'program_id' => $programId,
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

                //$file->store('uploads/apply_data/'); // 'uploads' is the storage folder; adjust as needed asset('storage/' . $file->file_path)

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
        try {
            $programId = decrypt($programId);
        } catch (DecryptException $e) {
            return view('common/error')->with('errorMessage', 'Invalid or tampered ID');
        }
        $program = Program::find($programId);
        $data['program'] = $program;
        $data['coach'] = Coach::find($program->coach_id);

        return view('student_backend/programs/view_program', $data);
    }
}
