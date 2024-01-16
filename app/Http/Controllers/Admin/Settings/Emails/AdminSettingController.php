<?php

namespace App\Http\Controllers\Admin\Settings\Emails;

use App\Helpers\TableColumnReplacementHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmailTemplateRequest;
use App\Models\EmailTemplate;

class AdminSettingController extends Controller
{
    public function emailTemplates() {
        $data['templates'] = EmailTemplate::where(['coach_id' => 0])->get();
        return view('admin/settings/emails/email_templates', $data);
    }

    public function editEmailTemplate($templateId) {
        $templateId = decrypt($templateId);
        $data['template'] = EmailTemplate::find($templateId);

        $data['tableColumns'] = TableColumnReplacementHelper::getTableColumnsReplacement();

        return view('admin/settings/emails/add_email_template', $data);
    }

    public function updateEmailTemplate(EmailTemplateRequest $request, string $id) {
        $id = decrypt($id);
        $template = EmailTemplate::find($id);
        $template->update($request->all());

        return redirect()->route('admin.email.template.show', encrypt($template->id));
    }

    public function showEmailTemplate(string $id) {
        $id = decrypt($id);
        $data['template'] = EmailTemplate::find($id);

        view()->share('viewEmailTemplate', true);

        return view('admin/settings/emails/view_email_template', $data);
    }
}
