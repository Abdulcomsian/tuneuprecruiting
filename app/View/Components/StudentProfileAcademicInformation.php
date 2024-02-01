<?php

namespace App\View\Components;

use App\Helpers\CommonHelper;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StudentProfileAcademicInformation extends Component
{
    /**
     * Create a new component instance.
     */
    public $user;
    public function __construct()
    {
        $this->user = CommonHelper::getStudentDetails();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.student-profile-academic-information');
    }
}
