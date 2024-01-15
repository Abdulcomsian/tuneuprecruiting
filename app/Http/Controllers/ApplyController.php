<?php

namespace App\Http\Controllers;

use App\Helpers\TableColumnReplacementHelper;
use App\Models\Apply;
use App\Models\ApplyDetail;
use App\Models\Coach;
use App\Models\EmailTemplate;
use App\Models\Program;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;
use App\Mail\DefaultMail;

class ApplyController extends Controller
{
    public function applies() {
        $data['applies'] = Apply::select('programs.*', 'applies.*', 'applies.id as apply_id', 'students.first_name', 'students.id as student_id', 'students.last_name', 'students.graduation_year', 'students.country', 'students.state')
            ->join('programs', 'programs.id', '=', 'applies.program_id')
            ->join('students', 'students.id', '=', 'applies.student_id')
            ->where(['programs.coach_id' => Session::get('coachId'), 'applies.trash' => 'active'])
            ->orderBy('applies.id', 'desc')
            ->get();

        return view('backend/applies/applies', $data);
    }

    public function saveApplyRating(Request $request) {
        $apply = Apply::find($request->applyId);
        $apply->rating = $request->rating;
        $apply->save();

        return response(['status' => 200, 'message' => 'success']);
    }

    public function changeStatusToStar(Request $request) {
        $applyId = $request->id;
        $apply = Apply::find($applyId);

        $apply->star = ($apply->star == 'star') ? '' : 'star';
        $apply->save();

        return redirect()->back()->with('success', 'Star.');
    }

    public function destroy(Request $request) {
        $applyId = $request->id;
        $apply = Apply::find($applyId);
        $apply->trash = 'trash';
        $apply->save();

        $student = User::join('students', 'students.user_id', '=', 'users.id')->where(['students.id' => $apply->student_id])->first();
        $program = Program::find($apply->program_id);

        $templateData['student'] = Student::find(1);
        $templateData['recruiter'] = Coach::find(1);
        $templateData['program'] = $program;
        $emailTemplate = EmailTemplate::where(['coach_id' => $program->coach_id, 'status' => 'Active', 'template_for' => 'Application Delete'])->first();

        if (is_null($emailTemplate)) {
            $emailTemplate = EmailTemplate::where(['coach_id' => 0, 'template_for' => 'Application Delete'])->firstOrFail();
        }

        $formattedData = TableColumnReplacementHelper::getFormattedArray($templateData);

        $emailTemplate->body = TableColumnReplacementHelper::renderDynamicContent($emailTemplate->body, $formattedData);

        Mail::to($student->email)->send(new DefaultMail($emailTemplate));

        return redirect()->back()->with('success', 'Deleted.');
    }

    public function viewApply(Request $request) {
        $applyId = $request->id;
        $apply = Apply::find($applyId);
        $data['apply'] = $apply;

        $data['studentDetail'] = Apply::join('students', 'students.id', '=', 'applies.student_id')->where(['applies.id' => $applyId])->first();

        $data['applyDetails'] = ApplyDetail::where(['apply_id' => $apply->id])->get();

        return view('backend/applies/apply_details', $data);
    }
}
