<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\ApplyDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{
    public function applies() {
//        $user = User::with(['student.applies'])->findOrFail(Auth::user()->id);
//
//        $data['applies'] = $user->applies()->with('student')->get();
        $user = auth()->user();
//        dd( $user->id);
//        $data['applies'] = Apply::join('programs', 'programs.id', '=', 'applies.program_id')
//            ->join('students', 'students.id', '=', 'applies.student_id')
//            ->where(['programs.coach_id' => $user->id])
//            ->get();
        $data['applies'] = Apply::join('programs', 'programs.id', '=', 'applies.program_id')
            ->join('students', 'students.id', '=', 'applies.student_id')
            ->where('programs.coach_id', $user->id)  // Change here
            ->get();
//        dd($data['applies']);
        return view('backend/applies/applies', $data);
    }

    public function viewApply($id) {
        $data['apply'] = Apply::where(['id' => $id])->first();
        $data['applyDetails'] = ApplyDetail::where(['apply_id' => $id])->get();
        // dd($data['applyDetails']);
        return view('backend/applies/apply_details', $data);
    }
}
