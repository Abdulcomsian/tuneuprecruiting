<?php

namespace App\Http\Controllers;

use App\Helpers\CommonHelper;
use App\Http\Requests\InformationRequest;
use App\Models\Notification;
use App\Models\RequestInfoOrDemo;
use App\Models\User;
use Mail;
use App\Mail\DefaultMail;
use Illuminate\Http\Request;

class RequestInfoOrDemoController extends Controller
{
    public function requestForm() {
        return view('common/request_info_or_demo/request_form');
    }

    public function sendInfoRequest(InformationRequest $request) {
        $information = RequestInfoOrDemo::create($request->all());

        $user = User::where(['role' => 'admin'])->first();

        // Notification
        Notification::create([
            'notification_for' => 'admin',
            'user_id' => $user->id,
            'message' => "A {$request->college_or_university} has sought a demonstration",
            'route' => 'request/info/view/' . encrypt($information->id),
        ]);

        $formattedData = (object)[];
        $formattedData->subject = "Demo Inquiry";

        $formattedData->body = "
            <p>A {$request->college_or_university} has sought a demonstration, and the following information provides the details.</p>
            <br />
            <p>{$request->college_or_university}: {$request->university_name}</p>
            <p>Contact Name: {$request->contact_name}</p>
            <p>Email: {$request->email}</p>
            <p>Phone Number: {$request->phone_number}</p>
            <p>Info: {$request->info}</p>
        ";

        Mail::to($user->email)->send(new DefaultMail($formattedData));

        return back()->with('success', 'Submission received.');
    }

    public function viewInfoRequest(Request $request) {
        $id = decrypt($request->route('id'));
        $data['information'] = RequestInfoOrDemo::find($id);

        return view('admin/request_information/view_information', $data);
    }

    public function allRequests() {
        $data['requests'] = RequestInfoOrDemo::where(['status' => 'new'])->get();

        return view('admin/request_information/requests', $data);
    }

    public function destroy($id) {
        $id = decrypt($id);
        $request = RequestInfoOrDemo::find($id);
        $request->status = 'deleted';
        $request->save();

        return back()->with('success', 'Deleted');
    }
}
