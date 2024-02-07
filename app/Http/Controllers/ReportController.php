<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
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

        $data['numberOfApplies'] = Apply::whereBetween('created_at', [$fromDate, $toDate])->count();
        $data['numberOfUSAApplies'] = Apply::join('students', 'applies.student_id', '=', 'students.id')
            ->whereBetween('applies.created_at', [$fromDate, $toDate])
            ->where('are_u_from_usa', 'Yes')
            ->count();
        $data['numberOfOutOfUSAApplies'] = Apply::join('students', 'applies.student_id', '=', 'students.id')
            ->whereBetween('applies.created_at', [$fromDate, $toDate])
            ->where('are_u_from_usa', 'No')
            ->count();

        return view('backend.reports.applications', $data);
    }
}
