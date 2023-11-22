<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Apply;
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
        $data['questions'] = ProgramQuestion::where(['program_id' => $programId])->get();

        $user = auth()->user();
        $data['user'] = Student::where(['user_id' => $user->id])->first();

        return view('student_backend/applies/apply', $data);
    }

    public function apply(Request $request, $programId) {
        $label = $request->label;
        $type = $request->type;
        $answer = $request->answer;

        if($request->has('files')) {
            $files = $request->file('files');
            dd($files);
            foreach ($files as $file) {
                $request->validate([
                    $file => 'file|mimes:jpg,png,jpeg,mp4', // Specify allowed file formats
                ]);

                $filename= date('YmdHi').$file->getClientOriginalName();
                dd($filename);
                $imagePath = 'uploads/apply_data/';
                $file-> move(public_path($imagePath), $filename);

                //$data->profile_image = $filename;
            }
            dd("Works");
            dd($request->all());
        }
        die;
        dd($request->all());
        for ($i = 0; $i < count($type); $i++) {
            if ($type == 'file') {

            }
        }

        for ($i = 0; $i < count($label); $i++) {
            if ($type[$i] == 'file') {

            }
            $tableData = [
                'program_id' => $programId,
                'label' => $label[$i],
                'type' => $type[$i],
                'answer' => $answer[$i]
            ];

            ProgramQuestion::create($tableData);
        }
        dd($request->all());
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
