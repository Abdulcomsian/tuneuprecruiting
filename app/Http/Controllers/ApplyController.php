<?php

namespace App\Http\Controllers;

use App\Helpers\CommonHelper;
use App\Helpers\TableColumnReplacementHelper;
use App\Models\Apply;
use App\Models\ApplyDetail;
use App\Models\Coach;
use App\Models\EmailTemplate;
use App\Models\Notification;
use App\Models\Program;
use App\Models\RequestRequirement;
use App\Models\Student;
use App\Models\StudentAdditionalRequirement;
use App\Models\User;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;
use App\Mail\DefaultMail;

class ApplyController extends Controller
{
    public function acceptApplication($applicationId) {
        $applicationId = decrypt($applicationId);

        $data['apply'] = Apply::select('applies.*', 'applies.id as apply_id', 'students.*')
            ->join('students', 'students.id', '=', 'applies.student_id')
            ->where(['applies.id' => $applicationId])
            ->first();

        return view('backend/applies/accept', $data);
    }
    public function applies() {
        $data['applies'] = $this->getAppliesOfCoach(['programs.coach_id' => Session::get('coachId'), 'applies.trash' => 'active']);

        return view('backend/applies/applies', $data);
    }
    public function changeApplyStatus(Request $request) {
        $apply = Apply::findOrFail($request->id);

        match ($request->route('status')) {
            'favourite' => $apply->star === 'star' ? $apply->star = '' : $apply->star = 'star',
            'accept' => $apply->status = 'Accept',
            default => throw new InvalidArgumentException("Invalid status: $request->route('status')"),
        };

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
    public function getAppliesOfCoach($where) {
        return Apply::select('programs.*', 'applies.*', 'applies.id as apply_id', 'students.first_name', 'students.id as student_id', 'students.last_name', 'students.graduation_year', 'students.country', 'students.state')
            ->join('programs', 'programs.id', '=', 'applies.program_id')
            ->join('students', 'students.id', '=', 'applies.student_id')
            ->where($where)
            ->orderBy('applies.id', 'desc')
            ->get();
    }
    public function requestApplyRequirement(Request $request) {
        RequestRequirement::create($request->all());
        $apply = Apply::find($request->apply_id);
        $apply->status = 'Additional Requirements Requested';
        $apply->save();

        $user = CommonHelper::getUserData($apply->student_id, Student::class);

        // Notification
        Notification::create([
            'notification_for' => 'student',
            'user_id' => $user->id,
            'message' => 'Your application has been approved by the coach; kindly submit the required documents.',
            'route' => 'apply/requirements/form/' . encrypt($apply->id),
        ]);

        $student = User::join('students', 'students.user_id', '=', 'users.id')->where(['students.id' => $apply->student_id])->first();
        $formattedData = (object)[];
        $formattedData->subject = "Notification";

        $requirementUrl = url('http://localhost/student/apply/requirements/form/' . encrypt($apply->id));
        $formattedData->body = "
            <p>Your application has been approved by the coach, kindly submit the required documents.</p>
            <br>
            <a href='{$requirementUrl}'>Please proceed to submit the necessary documents by clicking here.</a>
        ";

        Mail::to($student->email)->send(new DefaultMail($formattedData));

        return redirect()->back()->with('success', 'Approved. The notification has been dispatched to the student.');
    }
    public function saveApplyRating(Request $request) {
        $apply = Apply::find($request->applyId);
        $apply->rating = $request->rating;
        $apply->save();

        return response(['status' => 200, 'message' => 'success']);
    }
    public function trashedApplies() {
        $data['applies'] = $this->getAppliesOfCoach(['applies.trash' => 'trash']);

        return view('backend/applies/trashed_applies', $data);
    }
    public function viewApply(Request $request) {
        // update notification status to read
        CommonHelper::updateNotificationStatus($request->route('notificationId'));

        $applyId = $request->id;
        $apply = Apply::find($applyId);
        $data['apply'] = $apply;

        $data['applyRequirements'] = StudentAdditionalRequirement::where(['apply_id' => $applyId])->get();

        $data['studentDetail'] = Apply::join('students', 'students.id', '=', 'applies.student_id')->where(['applies.id' => $applyId])->first();

        $data['applyDetails'] = ApplyDetail::where(['apply_id' => $apply->id])->get();

        return view('backend/applies/apply_details', $data);
    }
}
