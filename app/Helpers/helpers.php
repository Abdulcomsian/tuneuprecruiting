<?php

if (!function_exists('countProgramApply')) {
    function countProgramApply($programId)
    {
        $count = \Illuminate\Support\Facades\DB::table('applies')->where(['program_id' => $programId, 'student_id' => session('studentId')])->count();
        return $count;
    }
}

if (!function_exists('getGenderTypes')) {
    function getGenderTypes()
    {
        return ['Male', 'Female', 'Other'];
    }
}

if (!function_exists('getEmailTemplateTypes')) {
    function getEmailTemplateTypes($typeNumber = null)
    {
        $templateTypes = ['Application Delete'];

        if ($typeNumber) {
            return $templateTypes[$typeNumber];
        }

        return $templateTypes;
    }
}

if (!function_exists('generateBreadcrumbs')) {
    function generateBreadcrumbs($items) {
        $breadcrumbs = [];

        // Always add the home link with an SVG icon
        $homeItem = '
        <li class="breadcrumb-item"><a href="' . url('/') . '">
            <svg class="stroke-icon">
                <use href="'. asset("assets/svg/icon-sprite.svg#stroke-home") .'"></use>
            </svg></a>
        </li>
    ';
        $breadcrumbs[] = $homeItem;

        // Add the rest of the items in the breadcrumb trail
        foreach ($items as $item) {
            $breadcrumbItem = '<li class="breadcrumb-item">' . $item . '</li>';
            $breadcrumbs[] = $breadcrumbItem;
        }

        return implode("\n", $breadcrumbs);
    }
}
