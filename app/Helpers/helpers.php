<?php

if (!function_exists('getProgramApply')) {
    function getProgramApply($programId)
    {
        return DB::table('applies')
            ->where([
                'program_id' => $programId,
                'student_id' => session('studentId')
            ])
            ->first();
    }
}

if (!function_exists('isAccepted')) {
    function isAccepted($applyDetails)
    {
        if (!empty($applyDetails) && $applyDetails->status == 'Additional Requirements Requested' && $applyDetails->trash != 'trash') {
            return true;
        }
        return false;
    }
}

if (!function_exists('getApplyRowColor')) {
    function getApplyRowColor($apply)
    {
        if (!$apply) {
            return ['bgColor' => '', 'textColor' => '']; // Handle the case where no application is found
        }

        return match ($apply->trash) {
            'trash' => ['bgColor' => 'bg-danger', 'textColor' => 'text-white'],
            default => match ($apply->status) {
                'Additional Requirements Requested' => ['bgColor' => 'bg-warning', 'textColor' => 'text-white'],
                'Accept' => ['bgColor' => 'bg-success', 'textColor' => 'text-white'],
                default => ['bgColor' => '', 'textColor' => ''],
            }
        };
    }
}

if (!function_exists('getGenderTypes')) {
    function getGenderTypes()
    {
        return ['Male', 'Female', 'Other'];
    }
}

if (!function_exists('getColumnNameOfBasicInformation')) {
    function getColumnNameOfBasicInformation($columnName)
    {
        $columns = [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'preferred_name' => 'Preferred Name',
            'home_phone_number' => 'Home Phone Number',
            'mobile_number' => 'Mobile Number',
            'graduation_year' => 'Graduation Year',
            'birth_date' => 'Birth Date',
            'are_u_from_usa' => 'Are you from the United State',
            'country' => 'Country',
            'state' => 'State',
            'primary_address' => 'Primary Address',
            'guardians_name' => 'Guardians Name',
            'guardians_phone_number' => 'Guardians Phone Number',
            'program_type' => 'Program Type',
            'gender' => 'Gender',
            'high_school_name' => 'High School Name',
            'registered_with_ncaa' => 'Registered With Ncaa',
            'ncaa_id' => 'Ncaa ID',
            'gpa' => 'GPA',
            'sat_test_date' => 'Sat Test Date',
            'sat_reading' => 'Sat Reading',
            'sat_writing' => 'Sat Writing',
            'sat_math' => 'Sat Math',
            'sat_total' => 'Sat Total',
            'act_test_date' => 'ACT Test Date',
            'act_sum_score' => 'ACT Sum Score',
            'act_composite' => 'ACT Composite',
            'act_english' => 'ACT English',
            'act_math' => 'ACT math',
            'act_reading' => 'ACT Reading',
            'act_science' => 'ACT Science',
            'transcript' => 'Transcript',
            'profile_image' => 'Profile Image',
            'short_video' => 'Short Video',
            'cv' => 'CV',
        ];

        if (array_key_exists($columnName, $columns)) {
            return $columns[$columnName];
        }

        return false;
    }
}

if (!function_exists('getColumnNameOfAcademicInformation')) {
    function getColumnNameOfAcademicInformation($columnName)
    {
        $columns = [
            'high_school_name' => 'High School Name',
            'registered_with_ncaa' => 'Registered With Ncaa',
            'ncaa_id' => 'Ncaa ID',
            'gpa' => 'GPA',
            'sat_test_date' => 'Sat Test Date',
            'sat_reading' => 'Sat Reading',
            'sat_writing' => 'Sat Writing',
            'sat_math' => 'Sat Math',
            'sat_total' => 'Sat Total',
            'act_test_date' => 'ACT Test Date',
            'act_sum_score' => 'ACT Sum Score',
            'act_composite' => 'ACT Composite',
            'act_english' => 'ACT English',
            'act_math' => 'ACT math',
            'act_reading' => 'ACT Reading',
            'act_science' => 'ACT Science',
            'transcript' => 'Transcript',
        ];

        if (array_key_exists($columnName, $columns)) {
            return $columns[$columnName];
        }

        return false;
    }
}

if (!function_exists('checkForApplyRequirements')) {
    function checkForApplyRequirements($applyId)
    {
        $count = \Illuminate\Support\Facades\DB::table('request_requirements')->where(['apply_id' => $applyId])->count();
        return $count;
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

if (!function_exists('getCountryList')) {
    function getCountryList()
    {
        return \Illuminate\Support\Facades\DB::table('countries')->get();
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
