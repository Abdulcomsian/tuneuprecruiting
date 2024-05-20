<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Country;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller {
    public function applicationReport(Request $request) {
        // Define default date range if none provided
        $fromDate = Carbon::parse('01/01/2024');
        $toDate = Carbon::today();

        if ($request->has('date_range')) {
            try {
                // Split the date range string into separate dates
                [$fromDate, $toDate] = explode(" - ", $request->date_range);

                // Validate date format using Carbon's built-in parsing
                $fromDate = Carbon::parse($fromDate);
                $toDate = Carbon::parse($toDate);
            } catch (Exception $e) {
                // Handle invalid date format gracefully (e.g., display an error message)
                return back()->withErrors(['date_range' => 'Invalid date range format.']);
            }
        }

        // Update data array with extracted dates
        $data = [
            'fromDate' => $fromDate->format('d/m/Y'),
            'toDate' => $toDate->format('d/m/Y'),
        ];

        $data['applies'] = Student::select('graduation_year')
            ->selectRaw('COUNT(applies.id) as total_applies')
            ->selectRaw('SUM(CASE WHEN are_u_from_usa = "Yes" THEN 1 ELSE 0 END) as applies_from_usa')
            ->selectRaw('SUM(CASE WHEN are_u_from_usa = "No" THEN 1 ELSE 0 END) as applies_from_out_of_usa')
            ->leftJoin('applies', 'students.id', '=', 'applies.student_id')
            ->leftJoin('programs', 'applies.program_id', '=', 'programs.id')
            ->where('programs.coach_id', Session::get('coachId'))
            ->whereBetween('applies.created_at', [$fromDate, $toDate])
            ->groupBy('graduation_year')
            ->get();

        return view('backend.reports.applications', $data);
    }
    public function recruiterReport(Request $request) {
        $data = $request->all();

        $data['countries'] = Country::all();

        if (!isset($request->applications)) {
            $data['applications'] = 'my_application';
        }

        $where = array_filter([
            'applies.rating' => $request->rating ?? null,
            'applies.star' => $request->favourite ? 'star' : null,
            'programs.session' => $request->student_session ?? null,
            'programs.coach_id' => $request->applications == 'other' ? null : Session::get('coachId'),
            'students.graduation_year' => $request->graduation_year ?? null,
            'students.country' => $request->country ?? null,
            'students.state' => $request->state ?? null,
            'students.sat_total' => $request->sat_total ?? null,
            'students.act_reading' => $request->act_reading ?? null,
            'students.are_u_from_usa' => $request->are_u_from_usa ?? null,
        ]);

        $query  = Apply::select('applies.*', 'applies.id as apply_id', 'students.first_name', 'students.last_name', 'students.graduation_year', 'students.country', 'students.state', 'programs.program_name')
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
