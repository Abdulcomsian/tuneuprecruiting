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
                                    <label class="form-label" for="validationCustom01">First Name</label>
                                    <input
                                        class="form-control program-name"
                                        id="validationCustom01"
                                        type="text"
                                        name="program_name"
                                        disabled
                                        value="{{ $user->first_name }}"
                                        placeholder="Enter program name"
                                        required="">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="validationCustom02">Last Name</label>
                                    <input
                                        class="form-control session"
                                        id="validationCustom02"
                                        type="text"
                                        name="session"
                                        disabled
                                        value="{{ $user->last_name }}"
                                        placeholder="Enter session"
                                        required="">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="validationCustom02">Graduation Year</label>
                                    <input
                                        class="form-control number-of-students"
                                        id="validationCustom02"
                                        type="text"
                                        name="number_of_students"
                                        disabled
                                        value="{{ $user->graduation_year }}"
                                        placeholder="Enter number"
                                        required="">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="validationCustom02">Home Town</label>
                                    <input
                                        class="form-control number-of-students"
                                        id="validationCustom02"
                                        type="text"
                                        name="number_of_students"
                                        disabled
                                        value="{{ $user->home_town }}"
                                        placeholder="Enter number"
                                        required="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label class="form-label" for="validationCustom02">State</label>
                                    <input
                                        class="form-control number-of-students"
                                        id="validationCustom02"
                                        type="text"
                                        name="number_of_students"
                                        disabled
                                        value="{{ $user->state }}"
                                        placeholder="Enter number"
                                        required="">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label" for="validationCustom02">Country</label>
                                    <input
                                        class="form-control number-of-students"
                                        id="validationCustom02"
                                        type="text"
                                        name="number_of_students"
                                        disabled
                                        value="{{ $user->country }}"
                                        placeholder="Enter number"
                                        required="">
                                </div>
                                <div class="col-md-2">
                                    <label for="academic-honors" class="form-label">Academic Honors</label>
                                    <input type="text" name="academic_honors" value="{{ $user->academic_honors }}" class="form-control" id="academic-honors">
                                </div>
                                <div class="col-md-2">
                                    <label for="birth-date" class="form-label">Birth Date</label>
                                    <input type="date" name="birth_date" value="{{ $user->birth_date }}" class="form-control" id="birth-date">
                                </div>
                                <div class="col-md-2">
                                    <label for="class-rank" class="form-label">Class Rank</label>
                                    <input type="text" name="class_rank" value="{{ $user->class_rank }}" class="form-control" id="class-rank">
                                </div>
                                <div class="col-md-2">
                                    <label for="college" class="form-label">College</label>
                                    <input type="text" name="college" value="{{ $user->college }}" class="form-control" id="college">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="core-gpa" class="form-label">Core GPA</label>
                                    <input type="text" name="core_gpa" value="{{ $user->core_gpa }}" class="form-control" id="core-gpa">
                                </div>
                                <div class="col-md-4">
                                    <label for="gpa" class="form-label">GPA</label>
                                    <input type="text" name="gpa" value="{{ $user->gpa }}" class="form-control" id="gpa">
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
                                    <label for="grad" class="form-label">Grad. Year</label>
                                    <input type="text" name="grad_year" value="{{ $user->grad_year }}" class="form-control" id="grad">
                                </div>
                                <div class="col-md-3">
                                    <label for="height" class="form-label">Height</label>
                                    <input type="text" name="height" value="{{ $user->height }}" class="form-control" id="height">
                                </div>
                                <div class="col-md-3">
                                    <label for="home-phone" class="form-label">Home Phone</label>
                                    <input type="text" name="home_phone" value="{{ $user->home_phone }}" class="form-control" id="home-phone">
                                </div>
                                <div class="col-md-3">
                                    <label for="interest-level" class="form-label">Interests Level</label>
                                    <input type="text" name="interest_level" value="{{ $user->interest_level }}" class="form-control" id="interest-level">
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
                                                @php $required = ($field->required) ? 'required' : ''; @endphp
                                                @php $requiredLabel = ($field->required) ? "<span class='text-danger'>*</span>" : ''; @endphp
                                                    <div class="col-md-4">
                                                        <label class="form-label" for="validationCustom02">{{ $field->label }} {!! $requiredLabel !!}</label>
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
                                                            <select name="{{ $variableName }}" id="" {{ $checkForMultiple  }} {{ $required }} class="form-control">
                                                                <option value=""></option>
                                                                @foreach($field->values as $value)
                                                                    <option value="{{ $value->label }}">{{ $value->label }}</option>
                                                                @endforeach
                                                            </select>
                                                        @elseif($field->type == 'file')
                                                            <input type="hidden" name="file_label[]" value="{{ $field->label }}">
                                                            <input type="hidden" name="file_type[]" value="{{ $field->type }}">
                                                            <input class="form-control" {{ $required }} type="file" name="files[]" accept="image/*,video/*">
                                                        @elseif($field->type == 'radio-group')
                                                            <input type="hidden" name="radio_label[]" value="{{ $field->label }}">
                                                            <br />
                                                            @foreach($field->values as $radioKey => $value)
                                                                <input type="hidden" name="radio_counter" value="{{ $radioCounter }}">
                                                                <input type="radio" class="form-check-input" id="radio-{{ $key }}-{{ $radioKey }}" name="radio_{{ $radioCounter }}" {{ $required }} value="{{ $value->label }}">
                                                                <label class="form-check-label" for="radio-{{ $key }}-{{ $radioKey }}">{{ $value->label }}</label>
                                                            @endforeach
                                                            @php $radioCounter++ @endphp
                                                        @elseif($field->type == 'checkbox-group')
                                                            <input type="hidden" name="checkbox_labels[]" value="{{ $field->label }}">
                                                            <input type="hidden" name="checkbox_types[]" value="{{ $field->type }}">
                                                            <br />
                                                            <div class="form-group checkbox-group">
                                                                @foreach($field->values as $checkboxKey => $value)
                                                                    <input type="checkbox" id="checkbox-{{$key}}-{{ $checkboxKey }}" class="form-check-input" value="{{ $value->label }}" name="checkbox_{{ $checkboxCounter }}[]" {{ in_array($value->label, old('checkbox_'.$checkboxCounter, [])) ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="checkbox-{{$key}}-{{ $checkboxKey }}">{{ $value->label }}</label>
                                                                @endforeach
                                                            </div>
                                                            @php $checkboxCounter++; @endphp
                                                        @else
                                                            @php $min = (isset($field->min)) ? "min=".$field->min : ''; @endphp
                                                            @php $max = (isset($field->max)) ? "max=".$field->max : ''; @endphp
                                                            @php $placeholder = (isset($field->placeholder)) ? "placeholder=".$field->placeholder : ''; @endphp
                                                            @php $maxLength = (isset($field->maxlength)) ? "maxlength=".$field->maxlength : ''; @endphp
                                                            @if($field->type == 'textarea')
                                                                <textarea name="answer[]" {{ $placeholder }} class="form-control">{{ old('answer.'.$inputCounter) }}</textarea>
                                                            @else
                                                                <input name="answer[]" {{ $placeholder }} value="{{ old('answer.'.$inputCounter) }}" {{ $min }} {{ $max }} {{ $maxLength }} {{ $required }} type="{{ $field->type }}" class="form-control">
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
