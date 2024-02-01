<?php

namespace App\View\Components;

use App\Helpers\CommonHelper;
use App\Models\Country;
use App\Models\ProgramType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StudentProfileBasicInformation extends Component
{
    /**
     * Create a new component instance.
     */
    public $countries;
    public $programTypes;
    public $user;
    public function __construct()
    {
        $this->countries = Country::all();
        $this->programTypes = ProgramType::all();

        $this->user = CommonHelper::getStudentDetails();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.student-profile-basic-information');
    }
}
