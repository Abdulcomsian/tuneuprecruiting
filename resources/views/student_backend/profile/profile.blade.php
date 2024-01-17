<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Edit Profile</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(["Users", "Edit Profile"]) !!}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="edit-profile">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h3 class="card-title mb-0">My Profile</h3>
                                <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                @if(auth()->user()->is_profile_completed == "not-completed")
                                    <div class="alert alert-danger">
                                        Please complete your profile first.
                                    </div>
                                @endif
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
                                <form method="POST" action="{{ route('student.profile.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-2">
                                        <div class="profile-title">
                                            <div class="d-flex">
                                                @php $profile_image = ($user->profile_image) ? asset("uploads/users_image/".$user->profile_image) : asset('assets/images/user/7.jpg'); @endphp
                                                <img class="img-70 rounded-circle" alt="" src="{{ $profile_image }}" style="width: 70px; height: 70px;">
                                                <div class="flex-grow-1">
                                                    <h3 class="mb-1">{{ $user->first_name }}</h3>
                                                    <p>{{ ucfirst(auth()->user()->role) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <x-input-label value="Upload an image (JPG, JPEG, or PNG):" labelFor="fileInput" />
                                        <x-dynamic-input name="profile_image" type="file" placeholder="Choose image" accept=".jpg,.jpeg,png" />
                                    </div>
                                    <div class="mb-3">
                                        @php $videoUrl = ($user->cv) ? asset('uploads/student_cv/'.$user->cv) : asset('assets/images/social-app/timeline-3.png'); @endphp
                                        <iframe width="100%" class="embed-responsive-item" src="{{ $videoUrl }}" allowfullscreen></iframe>
                                    </div>
                                    <div class="mb-3">
                                        <x-input-label value="Upload a CV:" labelFor="fileInput" />
                                        <x-dynamic-input name="cv" type="file" accept=".doc,.ppt,.pdf" />
                                    </div>
                                    <div class="mb-3">
                                        @php $videoUrl = ($user->short_video) ? asset('uploads/students_videos/'.$user->short_video) : asset('assets/images/social-app/timeline-3.png'); @endphp
                                        <iframe width="100%" class="embed-responsive-item" src="{{ $videoUrl }}" allowfullscreen></iframe>
                                    </div>
                                    <div class="mb-3">
                                        <x-input-label value="Upload a video:" labelFor="fileInput" />
                                        <x-dynamic-input name="short_video" type="file" />
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h3 class="card-title mb-0">Personal Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                name="first_name"
                                                value="{{ $user->first_name }}"
                                                type="text"
                                                required="{{ true }}"
                                                placeholder="First name"
                                                id="first-name"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                name="last_name"
                                                value="{{ $user->last_name }}"
                                                type="text"
                                                required="true"
                                                placeholder="Last Name"
                                                id="last-name" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                name="preferred_name"
                                                value="{{ old('preferred_name', $user->preferred_name) }}"
                                                type="text"
                                                required="true"
                                                id="preferred-name"
                                                placeholder="Preferred Name" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                name="email"
                                                value="{{ $email }}"
                                                type="email"
                                                disable="true"
                                                required="true"
                                                id="email"
                                                placeholder="Email" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                name="home_phone_number"
                                                value="{{ old('home_phone_number', $user->home_phone_number) }}"
                                                type="text"
                                                required="true"
                                                id="home-phone-number"
                                                placeholder="Home phone number" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="mobile-number"
                                                name="mobile_number"
                                                type="text"
                                                value="{{ old('mobile_number', $user->mobile_number) }}"
                                                required="true"
                                                placeholder="Cell Phone Number" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="graduation-year"
                                                name="graduation_year"
                                                type="text"
                                                value="{{ old('graduation_year', $user->graduation_year) }}"
                                                required={{ true }}
                                                placeholder="Graduation Year" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <x-dynamic-input
                                            type="date"
                                            name="birth_date"
                                            placeholder="Date of Birth"
                                            value="{{ old('birth_date', $user->birth_date) }}"
                                            required="{{ true }}"
                                            id="birth-date" />
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            @component('components.select-list', [
                                                    'name' => 'are_u_from_usa',
                                                    'options' => ['Yes', 'No'],
                                                    'selected' => ucfirst(old('are_u_from_usa', $user->are_u_from_usa)),
                                                    'label' => 'Are you from the United State',
                                                    'id' => 'are-u-from-usa',
                                                    'required' => true,
                                                    'arrayKey' => false
                                                ])
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            @component('components.select-type-of-object-array', [
                                                    'options' => $countries,
                                                    'selected' => old('country', $user->country),
                                                    'name' => 'country',
                                                    'id' => 'country',
                                                    'label' => 'Country',
                                                    'required' => true
                                                ])
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="state"
                                                name="state"
                                                value="{{ old('state', $user->state) }}"
                                                required={{ true }}
                                                type="text"
                                                placeholder="State/Province" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="primary-address"
                                                name="primary_address"
                                                value="{{ old('primary_address', $user->primary_address) }}"
                                                required={{ true }}
                                                type="text"
                                                placeholder="Primary Address" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="guardian-name"
                                                name="guardians_name"
                                                value="{{ old('guardians_name', $user->guardians_name) }}"
                                                required={{ true }}
                                                type="text"
                                                placeholder="Guardian Name" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="guardian-phone-number"
                                                name="guardians_phone_number"
                                                value="{{ old('guardians_phone_number', $user->guardians_phone_number) }}"
                                                required={{ true }}
                                                type="text"
                                                placeholder="Guardian Phone Number" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            @component('components.select-type-of-object-array', [
                                                    'options' => $programTypes,
                                                    'selected' => old('program_type', $user->program_type),
                                                    'name' => 'program_type',
                                                    'id' => 'program-type',
                                                    'label' => 'Program Type',
                                                    'required' => true
                                                ])
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            @component('components.radio-buttons', [
                                                    'name' => 'gender',
                                                    'options' => getGenderTypes(),
                                                    'selected' => ucfirst(old('gender', $user->gender)),
                                                    'label' => 'Gender',
                                                    'id' => 'gender',
                                                    'required' => true
                                                ])
                                            @endcomponent
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title mb-0">Academic Information</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <x-dynamic-input
                                                    id="high-school-name"
                                                    name="high_school_name"
                                                    value="{{ old('high_school_name', $user->high_school_name) }}"
                                                    type="text"
                                                    placeholder="High school name..." />
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                @component('components.select-list', [
                                                        'name' => 'registered_with_ncaa',
                                                        'options' => ['Yes', 'No'],
                                                        'selected' => ucfirst(old('registered_with_ncaa', $user->registered_with_ncaa)),
                                                        'label' => 'Registered With NCAA',
                                                        'id' => 'registered-with-ncaa',
                                                        'arrayKey' => false
                                                    ])
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <x-dynamic-input
                                                    id="ncaa-id"
                                                    name="ncaa_id"
                                                    value="{{ old('ncaa_id', $user->ncaa_id) }}"
                                                    placeholder="NCAA ID"
                                                    type="text" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <x-dynamic-input
                                                type="text"
                                                name="gpa"
                                                placeholder="GPA"
                                                value="{{ $user->gpa }}"
                                                id="gpa" />
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <x-dynamic-input
                                                    id="sat-test-date"
                                                    name="sat_test_date"
                                                    value="{{ old('sat_test_date', $user->sat_test_date) }}"
                                                    placeholder="SAT Test Date"
                                                    type="date" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <x-dynamic-input
                                                    id="sat-reading"
                                                    name="sat_reading"
                                                    value="{{ old('sat_reading', $user->sat_reading) }}"
                                                    placeholder="SAT Reading"
                                                    type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <x-dynamic-input
                                                    id="sat-writing"
                                                    name="sat_writing"
                                                    value="{{ old('sat_writing', $user->sat_writing) }}"
                                                    placeholder="SAT Writing"
                                                    type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <x-dynamic-input
                                                    id="sat-math"
                                                    name="sat_math"
                                                    value="{{ old('sat_math', $user->sat_math) }}"
                                                    placeholder="SAT Math"
                                                    type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <x-dynamic-input
                                                    id="sat-total"
                                                    name="sat_total"
                                                    value="{{ old('sat_total', $user->sat_total) }}"
                                                    placeholder="SAT Total"
                                                    type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <x-dynamic-input
                                                    id="act-test-date"
                                                    name="act_test_date"
                                                    value="{{ old('act_test_date', $user->act_test_date) }}"
                                                    placeholder="ACT Test Date"
                                                    type="date" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <x-dynamic-input
                                                    id="act-sum-score"
                                                    name="act_sum_score"
                                                    value="{{ old('act_sum_score', $user->act_sum_score) }}"
                                                    placeholder="ACT SUM Score"
                                                    type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <x-dynamic-input
                                                    id="act-composite"
                                                    name="act_composite"
                                                    value="{{ old('act_composite', $user->act_composite) }}"
                                                    placeholder="ACT Composite"
                                                    type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <x-dynamic-input
                                                    id="act-english"
                                                    name="act_english"
                                                    value="{{ old('act_english', $user->act_english) }}"
                                                    placeholder="ACT English"
                                                    type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <x-dynamic-input
                                                    id="act-math"
                                                    name="act_math"
                                                    value="{{ old('act_math', $user->act_math) }}"
                                                    placeholder="ACT Math"
                                                    type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <x-dynamic-input
                                                    id="act-reading"
                                                    name="act_reading"
                                                    value="{{ old('act_total', $user->act_total) }}"
                                                    placeholder="ACT Total"
                                                    type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <x-dynamic-input
                                                    id="act-science"
                                                    name="act_science"
                                                    value="{{ old('act_total', $user->act_total) }}"
                                                    placeholder="ACT Science"
                                                    type="text" />
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4">
                                            <div class="mb-3">
                                                <x-dynamic-input name="transcript" type="file" placeholder="Transcript" />
                                            </div>
                                        </div>
                                </div>
                                <div class="card-footer">
                                    <div class="card-footer text-end">
                                        <button class="btn btn-primary" type="submit">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
