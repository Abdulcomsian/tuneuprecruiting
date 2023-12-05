<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\ApplyDetail;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ApplyController extends Controller
{
    public function applies() {
        $data['applies'] = Apply::select('programs.*', 'applies.*', 'applies.id as apply_id', 'students.first_name', 'students.id as student_id', 'students.last_name', 'students.graduation_year', 'students.country', 'students.home_town', 'students.state')
            ->join('programs', 'programs.id', '=', 'applies.program_id')
            ->join('students', 'students.id', '=', 'applies.student_id')
            ->where(['programs.coach_id' => Session::get('coachId'), 'applies.trash' => 'active'])
            ->orderBy('applies.id', 'desc')
            ->get();

        return view('backend/applies/applies', $data);
    }

    public function changeStatusToStar($applyId) {
        try {
            $applyId = decrypt($applyId);
        } catch (DecryptException $e) {
            return view('common/error')->with('errorMessage', 'Invalid or tampered ID');
        }

        $apply = Apply::find($applyId);
        if ($apply->star == 'star') {
            $apply->star = '';
        } else {
            $apply->star = 'star';
        }

        $apply->save();

        return redirect()->back()->with('success', 'Star.');
    }

    public function destroy($id) {
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            return view('common/error')->with('errorMessage', 'Invalid or tampered ID');
        }

        $apply = Apply::find($id);
        $apply->trash = 'trash';
        $apply->save();

        return redirect()->back()->with('success', 'Deleted.');
    }

    public function viewApply($id) {
        try {
            $id = decrypt($id);
        } catch (DecryptException $e) {
            return view('common/error')->with('errorMessage', 'Invalid or tampered ID');
        }

        $apply = Apply::find($id);
        $data['apply'] = $apply;
        $data['applyDetails'] = ApplyDetail::where(['apply_id' => $apply->id])->get();

        return view('backend/applies/apply_details', $data);
    }
}
