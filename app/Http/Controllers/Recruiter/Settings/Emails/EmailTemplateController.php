<?php

namespace App\Http\Controllers\Recruiter\Settings\Emails;

use App\Helpers\TableColumnReplacementHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmailTemplateRequest;
use App\Models\Coach;
use App\Models\EmailTemplate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coach = Coach::where(['user_id' => Auth::user()->id])->first();
        $data['templates'] = EmailTemplate::where(['coach_id' => $coach->id])->get();

        return view('backend/settings/emails/email_templates', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['tableColumns'] = TableColumnReplacementHelper::getTableColumnsReplacement();

        return view('backend/settings/emails/add_email_template', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmailTemplateRequest $request)
    {
        $coachId = Session::get('coachId');
        $request->request->add(['coach_id' => $coachId]);

        $this->updateStatus($request);

        $emailTemplate = EmailTemplate::create($request->all());

        return redirect()->route('template.show', $emailTemplate->id);
    }

    public function updateStatus($request) {
        if ($request->status == 'Active') {
            // Fetch the matching rows
            $rowsToUpdate = EmailTemplate::where(['coach_id' => $request->coach_id, 'template_for' => 'Application Delete'])->get();

            // Update each row individually
            foreach ($rowsToUpdate as $row) {
                $row->status = 'Disable';
                $row->save();
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['template'] = EmailTemplate::find($id);

        view()->share('viewEmailTemplate', true);

        $this->authorize('edit', $data['template']);

        return view('backend/settings/emails/view_email_template', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['template'] = EmailTemplate::find($id);

        $this->authorize('edit', $data['template']);

        $data['tableColumns'] = TableColumnReplacementHelper::getTableColumnsReplacement();

        return view('backend/settings/emails/add_email_template', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmailTemplateRequest $request, string $id)
    {
        $coachId = Session::get('coachId');
        $request->request->add(['coach_id' => $coachId]);

        $this->updateStatus($request);

        $template = EmailTemplate::find($id);
        $template->update($request->all());

        return redirect()->route('template.show', $template->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
