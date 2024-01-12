<?php

namespace App\Http\Controllers\Recruiter\Settings\Emails;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailTemplateRequest;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['templates'] = EmailTemplate::all();

        return view('backend/settings/emails/email_templates', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['tableColumns'] = ['student-first_name', 'student-last_name', 'recruiter-first_name', 'recruiter-last_name'];

        return view('backend/settings/emails/add_email_template', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmailTemplateRequest $request)
    {
        EmailTemplate::create($request->all());
        return redirect()->back()->with('success', 'Template created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['template'] = EmailTemplate::find($id);
        $data['tableColumns'] = ['student-first_name', 'student-last_name', 'recruiter-first_name', 'recruiter-last_name'];

        return view('backend/settings/emails/add_email_template', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmailTemplateRequest $request, string $id)
    {
        $template = EmailTemplate::find($id);
        $template->update($request->all());

        return redirect()->back()->with('success', 'Template updated successfully...');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
