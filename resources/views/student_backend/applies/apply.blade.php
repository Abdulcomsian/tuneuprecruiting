<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3></h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(["Program", "Apply"]) !!}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid basic_table">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>Program Details</h3>
                        </div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive theme-scrollbar">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Coach Name</td>
                                                <td>{{ $program->first_name . " " . $program->last_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Program Name</td>
                                                <td>{{ $program->program_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Session</td>
                                                <td>{{ $program->session }}</td>
                                            </tr>
                                            <tr>
                                                <td>Number of Students</td>
                                                <td>{{ $program->number_of_students }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>Video</h3>
                        </div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive theme-scrollbar">
                                    @if($program->video)
                                        <video width="640" height="360" controls>
                                            <source src="{{ asset('uploads/program_videos/'.$program->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @else
                                        <p class="text-center">No video found.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-0">Basic Information</h3>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                @if(session('success') || session('danger'))
                                    @php $className = (session('success')) ? 'success' : 'danger'; @endphp
                                    @php $message = (session('success')) ? session('success') : session('danger'); @endphp
                                    <div class="alert alert-{{ $className }}">
                                        {{ $message }}
                                    </div>
                                @endif
                            <form method="POST" id="frm-program" action="{{ route('program.apply', encrypt($program->id)) }}" enctype="multipart/form-data" class="row g-3">
                                @csrf
                                <input type="hidden" name="program_id" value="{{ $program->id }}">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <x-dynamic-input
                                        id="first-name"
                                        type="text"
                                        name="first_name"
                                        disable="true"
                                        value="{{ $user->first_name }}"
                                        placeholder="First Name"
                                        required="true" />
                                </div>
                                <div class="col-md-3">
                                    <x-dynamic-input
                                        id="last-name"
                                        type="text"
                                        name="last_name"
                                        disable="true"
                                        value="{{ $user->last_name }}"
                                        placeholder="Last Name"
                                        required="true" />
                                </div>
                                <div class="col-md-3">
                                    <x-dynamic-input
                                        id="graduation-year"
                                        type="text"
                                        name="graduation_year"
                                        disable="true"
                                        value="{{ $user->graduation_year }}"
                                        placeholder="Graduation Year"
                                        required="true" />
                                </div>
                                <div class="col-md-3">
                                    <x-dynamic-input
                                        id="home-town"
                                        type="text"
                                        name="home_town"
                                        disable="true"
                                        value="{{ $user->home_town }}"
                                        placeholder="Home Town"
                                        required="true" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <x-dynamic-input
                                        id="state"
                                        type="text"
                                        name="state"
                                        disable="true"
                                        value="{{ $user->state }}"
                                        placeholder="State"
                                        required="true" />
                                </div>
                                <div class="col-md-2">
                                    <x-dynamic-input
                                        id="country"
                                        type="text"
                                        name="country"
                                        disabled
                                        value="{{ $user->country }}"
                                        placeholder="Country"
                                        required="" />
                                </div>
                                <div class="col-md-2">
                                    <x-dynamic-input
                                        type="text"
                                        name="academic_honors"
                                        value="{{ $user->academic_honors }}"
                                        placeholder="Academic Honors"
                                        id="academic-honors" />
                                </div>
                                <div class="col-md-2">
                                    <x-dynamic-input
                                        type="date"
                                        name="birth_date"
                                        value="{{ $user->birth_date }}"
                                        placeholder="Birth Date"
                                        id="birth-date" />
                                </div>
                                <div class="col-md-2">
                                    <x-dynamic-input
                                        type="text"
                                        name="class_rank"
                                        value="{{ $user->class_rank }}"
                                        placeholder="Class Rank"
                                        id="class-rank" />
                                </div>
                                <div class="col-md-2">
                                    <x-dynamic-input
                                        type="text"
                                        name="college"
                                        value="{{ $user->college }}"
                                        placeholder="College"
                                        id="college" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <x-dynamic-input
                                        type="text"
                                        name="core_gpa"
                                        value="{{ $user->core_gpa }}"
                                        placeholder="Core GPA"
                                        id="core-gpa" />
                                </div>
                                <div class="col-md-4">
                                    <x-dynamic-input
                                        type="text"
                                        name="gpa"
                                        value="{{ $user->gpa }}"
                                        placeholder="GPA"
                                        id="gpa" />
                                </div>
                                <div class="col-md-4">
                                    <label for="gender" class="form-label">Gender</label> <br />
                                    <input type="radio" name="gender" {{ ($user->gender == 'male') ? 'checked' : '' }} class="form-check-input" value="male" id="male">
                                    <label class="form-check-label" for="male">Male</label>
                                    <input type="radio" name="gender" {{ ($user->gender == 'female') ? 'checked' : '' }} class="form-check-input" value="female" id="female">
                                    <label class="form-check-label" for="female">Female</label>
                                    <input type="radio" name="gender" {{ ($user->gender == 'other') ? 'checked' : '' }} class="form-check-input" value="other" id="other">
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <x-dynamic-input
                                        type="text"
                                        name="grad_year"
                                        value="{{ $user->grad_year }}"
                                        placeholder="Grad. Year"
                                        id="grad" />
                                </div>
                                <div class="col-md-3">
                                    <x-dynamic-input
                                        type="text"
                                        name="height"
                                        value="{{ $user->height }}"
                                        placeholder="Grad. Year"
                                        id="height" />
                                </div>
                                <div class="col-md-3">
                                    <x-dynamic-input
                                        type="text"
                                        name="home_phone"
                                        value="{{ $user->home_phone }}"
                                        placeholder="Home Phone"
                                        id="home-phone" />
                                </div>
                                <div class="col-md-3">
                                    <x-dynamic-input
                                        type="text"
                                        name="interest_level"
                                        value="{{ $user->interest_level }}"
                                        placeholder="Interests Level"
                                        id="interest-level" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                                    @php $checkboxCounter = 0; @endphp
                                    @php $inputCounter = 0; @endphp
                                    @php $radioCounter = 0; @endphp
                                    @php $multiSelectListCounter = 0; @endphp
                                    @if(!empty($customFields))
                                        <div class="row">
                                            @foreach($customFields as $key => $field)
                                                @if($field->type !== 'file' && $field->type !== 'checkbox-group' && $field->type !== 'radio-group')
                                                    @if($field->type == 'select' && $field->multiple)

                                                    @else
                                                        <input type="hidden" name="label[]" value="{{ $field->label }}">
                                                        <input type="hidden" name="type[]" value="{{ $field->type }}">
                                                    @endif
                                                @endif
                                                @php $required = ($field->required) ? true : ''; @endphp
                                                @php $requiredLabel = ($field->required) ? "<span class='text-danger'>*</span>" : ''; @endphp
                                                    <div class="col-md-4">
                                                        @if($field->type == 'select')
                                                            @php $variableName = 'answer[]'; @endphp
                                                            @if($field->multiple)
                                                                @php
                                                                    $variableName = 'checkbox_' . $checkboxCounter . '[]';
                                                                    $checkboxCounter++;
                                                                @endphp
                                                                <input type="hidden" name="checkbox_labels[]" value="{{ $field->label }}">
                                                                <input type="hidden" name="checkbox_types[]" value="{{ $field->type }}">
                                                            @endif
                                                            @php $checkForMultiple = ($field->multiple) ? 'multiple' : ''; @endphp
                                                            @component('components.select-type-of-object-array', [
                                                                'name' => $variableName,
                                                                'options' => $field->values,
                                                                'selected' => old($variableName),
                                                                'label' => $field->label,
                                                                'id' => $variableName,
                                                                'required' => $required,
                                                                'keyName' => 'label',
                                                                'labelName' => 'label',
                                                                'valueName' => 'label'
                                                                ])
                                                            @endcomponent
                                                        @elseif($field->type == 'file')
                                                            <input type="hidden" name="file_label[]" value="{{ $field->label }}">
                                                            <input type="hidden" name="file_type[]" value="{{ $field->type }}">
                                                            <x-dynamic-input name="files[]" type="file" placeholder="{{ $field->label }}" required="{{ $required }}" accept="image/*,video/*" />
                                                        @elseif($field->type == 'radio-group')
                                                            <input type="hidden" name="radio_label[]" value="{{ $field->label }}">
                                                            <x-input-label value="{{ $field->label }}" required="{{ $required }}" labelFor="" />
                                                            @foreach($field->values as $radioKey => $value)
                                                                <input type="hidden" name="radio_counter" value="{{ $radioCounter }}">
                                                                <input type="radio" class="form-check-input" id="radio-{{ $key }}-{{ $radioKey }}" name="radio_{{ $radioCounter }}" {{ $required }} value="{{ $value->label }}">
                                                                <label class="form-check-label" for="radio-{{ $key }}-{{ $radioKey }}">{{ $value->label }}</label>
                                                            @endforeach
                                                            @php $radioCounter++ @endphp
                                                        @elseif($field->type == 'checkbox-group')
                                                            <input type="hidden" name="checkbox_labels[]" value="{{ $field->label }}">
                                                            <input type="hidden" name="checkbox_types[]" value="{{ $field->type }}">
                                                            <div class="form-group checkbox-group">
                                                                <x-input-label value="{{ $field->label }}" required="{{ $required }}" labelFor="" />
                                                                @foreach($field->values as $checkboxKey => $value)
                                                                    <input type="checkbox" id="checkbox-{{$key}}-{{ $checkboxKey }}" class="form-check-input" value="{{ $value->label }}" name="checkbox_{{ $checkboxCounter }}[]" {{ in_array($value->label, old('checkbox_'.$checkboxCounter, [])) ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="checkbox-{{$key}}-{{ $checkboxKey }}">{{ $value->label }}</label>
                                                                @endforeach
                                                            </div>
                                                            @php $checkboxCounter++; @endphp
                                                        @else
                                                            @php $min = (isset($field->min)) ? "min=".$field->min : "min=0"; @endphp
                                                            @php $max = (isset($field->max)) ? "max=".$field->max : "max=0"; @endphp
                                                            @php $placeholder = (isset($field->placeholder)) ? "placeholder=".$field->placeholder : "placeholder=".$field->label; @endphp
                                                            @php $maxLength = (isset($field->maxlength)) ? "maxlength=".$field->maxlength : "maxlength="; @endphp
                                                            @if($field->type == 'textarea')
                                                                <x-input-textarea
                                                                    name="answer[]"
                                                                    label="{{ $field->label }}"
                                                                    required="{{ (isset($field->required)) ? true : false }}"
                                                                    id="{{ str_replace(' ', '-', $field->label) }}"
                                                                    value="{{ old('answer.'.$inputCounter) }}" />
                                                            @else
                                                                <x-dynamic-input
                                                                    type="{{ $field->type }}"
                                                                    name="answer[]"
                                                                    value="{{ old('answer.'.$inputCounter) }}"
                                                                    placeholder="{{ $field->label }}"
                                                                    id="{{ str_replace(' ', '-', $field->label) }}"
                                                                    min="{{ (isset($field->min)) ? $field->min : false }}"
                                                                    max="{{ (isset($field->max)) ? $field->max : false }}"
                                                                    maxlength="{{ (isset($field->maxlength)) ? $field->maxlength : false }}"
                                                                    required="{{ (isset($field->$required)) ? true : false }}" />
                                                            @endif
                                                            @php $inputCounter++; @endphp
                                                        @endif
                                                    </div>
                                            @endforeach
                                        </div>
                                   @endif
                                <div class="col-md-12">
                                    <button class="btn btn-primary float-end mt-3" id="btn-from-add" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
