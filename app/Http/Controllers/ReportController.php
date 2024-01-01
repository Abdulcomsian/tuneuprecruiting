<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function recruiterReport(Request $request) {
        $data['applies'] = [];
        $data['countries'] = [
            [ 'name' => 'Benin'],
            [ 'name' => 'Burkina Faso'],
            [ 'name' => 'Ghana'],
            [ 'name' => 'Nigeria'],
            [ 'name' => 'Kenya']
        ];

        return view('backend.reports.recruiter', $data);
    }
}
