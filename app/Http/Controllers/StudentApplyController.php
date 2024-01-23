<?php

namespace App\Http\Controllers;

use App\Helpers\CommonHelper;
use App\Models\Apply;
use App\Models\ApplyDetail;
use App\Models\Coach;
use App\Models\Notification;
use App\Models\Program;
use App\Models\RequestRequirement;
use App\Models\Student;
use App\Models\StudentAdditionalRequirement;
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

    public function requirementForm(Request $request) {
        // update notification status to read
        CommonHelper::updateNotificationStatus($request->route('notificationId'));

        $id = decrypt($request->route('id'));

        $apply = Apply::find($id);
        $data['requirements'] = RequestRequirement::where(['apply_id' => $apply->id])->first();
        $data['customFields'] = json_decode($data['requirements']->custom_fields);
        $data['apply_id'] = $id;

        $data['additionalRequirements'] = StudentAdditionalRequirement::where(['apply_id' => $apply->id])->count();

        return view('student_backend.applies.requirements', $data);
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

    public function submitRequirements(ApplyRequest $request) {
        $data = ['apply_id' => $request->apply_id, 'request_requirement_id' => $request->requirement_id];

        $apply = Apply::join('programs', 'programs.id', '=', 'applies.program_id')->first();

        $user = CommonHelper::getUserData($apply->coach_id, Coach::class);

        if ($request->has('files')) {
            $this->handleFileInputs($request, $data, StudentAdditionalRequirement::class);
        }
        if ($request->has('radio_counter')) {
            $this->handleRadioInputs($request, $data, StudentAdditionalRequirement::class);
        }

        if ($request->has('checkbox_labels')) {
            $this->handleCheckboxInputs($request, $data, StudentAdditionalRequirement::class);
        }

        if ($request->has('label')) {
            $this->handleSingleInputs($request, $data, StudentAdditionalRequirement::class);
        }

        // Notification
        $message = ucfirst(Session::get('firstName')) . ' has submitted extra requirements; please click here to review them.';
        Notification::create([
            'notification_for' => 'student',
            'user_id' => $user->id,
            'message' => $message,
            'route' => '/apply/view/' . encrypt($request->apply_id),
        ]);

        return redirect()->route('program.apply.view', encrypt($request->apply_id));
    }

    private function handleFileInputs($request, $data, $module) {
        $file_label = $request->file_label;
        $file_type = $request->file_type;

        $validated = $request->validate([
            'files.*' => 'file|mimes:jpg,png,jpeg,mp4', // Specify allowed file formats
        ]);

        foreach ($validated['files'] as $key => $file) {
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->storeAs('uploads/apply_data', $filename);

            $data = [
                ...$data,
                'label' => $file_label[$key],
                'type' => $file_type[$key],
                'answer' => $filename,
            ];

            $module::create($data);
        }
    }

    private function handleRadioInputs($request, $data, $module)
    {
        $radioCounter = $request->radio_counter;
        $radioLabel = $request->radio_label;

        for ($i = 0; $i <= $radioCounter; $i++) {
            $variableName = "radio_$i";
            $answer = $request->$variableName;

            $this->saveInput('radio-group', $radioLabel[$i], $answer, $data, $module);
        }
    }

    private function handleCheckboxInputs($request, $data, $module)
    {
        $checkboxLabels = $request->checkbox_labels;
        $checkboxTypes = $request->checkbox_types;

        for ($i = 0; $i < count($checkboxLabels); $i++) {
            $variableName = "checkbox_$i";
            $answer = $request->$variableName;

            $this->saveInput($checkboxTypes[$i], $checkboxLabels[$i], json_encode($answer), $data, $module);
        }
    }

    private function handleSingleInputs($request, $data, $module)
    {
        $label = $request->label;
        $type = $request->type;
        $answer = $request->answer;

        if (is_array($label) && is_array($type) && is_array($answer)) {
            foreach ($label as $i => $item) {
                $this->saveInput($type[$i], $item, $answer[$i], $data, $module);
            }
        } else {
            $this->saveInput($type, $label, $answer, $data, $module);
        }
    }

    private function saveInput($type, $label, $answer, $data, $module)
    {
        $tableData = array_merge($data, [
            'label' => $label,
            'type' => $type,
            'answer' => $answer,
        ]);

        $module::create($tableData);
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

        $programData = [
            'student_id' => $studentId,
            'program_id' => $request->id,
            'status' => 'UNREAD'
        ];

        $apply = Apply::create($programData);

        $data = ['apply_id' => $apply->id];

        if ($request->has('files')) {
            $this->handleFileInputs($request, $data, ApplyDetail::class);
        }
        if ($request->has('radio_counter')) {
            $this->handleRadioInputs($request, $data, ApplyDetail::class);
        }

        if ($request->has('checkbox_labels')) {
            $this->handleCheckboxInputs($request, $data, ApplyDetail::class);
        }

        if ($request->has('label')) {
            $this->handleSingleInputs($request, $data, ApplyDetail::class);
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

        $data['applyRequirements'] = StudentAdditionalRequirement::where(['apply_id' => $applyId])->get();

        return view('student_backend/applies/view_apply', $data);
    }
}
