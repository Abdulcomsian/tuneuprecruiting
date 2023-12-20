<?php

if (!function_exists('countProgramApply')) {
    function countProgramApply($programId)
    {
        $count = \Illuminate\Support\Facades\DB::table('applies')->where(['program_id' => $programId, 'student_id' => session('studentId')])->count();
        return $count;
    }
}
