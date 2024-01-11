<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
    public function recruiterReport(Request $request) {
        $data = $request->all();

        if (!isset($request->applications)) {
            $data['applications'] = 'my_application';
        }

        $where = array_filter([
            'applies.rating' => $request->rating ?? null,
            'applies.star' => $request->favourite ? 'star' : null,
            'programs.session' => $request->student_session ?? null,
            'programs.coach_id' => $request->applications == 'other' ? null : Session::get('coachId'),
            'students.graduation_year' => $request->graduation_year ?? null,
        ]);

        $query  = Apply::select('applies.*', 'students.first_name', 'students.last_name', 'students.graduation_year', 'students.country', 'students.state', 'programs.program_name')
            ->join('programs', 'programs.id', '=', 'applies.program_id')
            ->join('students', 'students.id', '=', 'applies.student_id')
            ->where($where);
            // Add date range filter if both from_date and to_date are provided
            if ($request->filled('from_date') && $request->filled('to_date')) {
                $query->whereBetween('applies.created_at', [$request->from_date, $request->to_date]);
            }
        $data['applies'] = $query->get();

        return view('backend.reports.recruiter', $data);
    }
}
