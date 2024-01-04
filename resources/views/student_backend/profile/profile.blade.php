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
                                        @php $videoUrl = ($user->short_video) ? asset('uploads/students_videos/'.$user->short_video) : asset('assets/images/social-app/timeline-3.png'); @endphp
                                        <iframe width="100%" class="embed-responsive-item" src="{{ $videoUrl }}" allowfullscreen></iframe>
                                    </div>
                                    <div class="mb-3">
                                        <x-input-label value="Upload a video:" labelFor="fileInput" />
                                        <x-dynamic-input name="short_video" type="file" />
                                    </div>
                                    <div class="mb-3">
                                        @php $videoUrl = ($user->cv) ? asset('uploads/student_cv/'.$user->cv) : asset('assets/images/social-app/timeline-3.png'); @endphp
                                        <iframe width="100%" class="embed-responsive-item" src="{{ $videoUrl }}" allowfullscreen></iframe>
                                    </div>
                                    <div class="mb-3">
                                        <x-input-label value="Upload a CV:" labelFor="fileInput" />
                                        <x-dynamic-input name="cv" type="file" accept=".doc,.ppt,.pdf" />
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                name="first_name"
                                                value="{{ $user->first_name }}"
                                                type="text"
                                                required="true"
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
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                name="graduation_year"
                                                value="{{ $email }}"
                                                type="text"
                                                disable="true"
                                                required="true"
                                                id="email"
                                                placeholder="Email" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                name="password"
                                                type="text"
                                                id="password"
                                                placeholder="Password" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                name="password_confirmation"
                                                type="text"
                                                id="confirm-password"
                                                placeholder="Confirm Password" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="graduation-year"
                                                name="graduation_year"
                                                type="text"
                                                value="{{ $user->graduation_year }}"
                                                required
                                                placeholder="Graduation Year" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="home-town"
                                                name="home_town"
                                                type="text"
                                                value="{{ $user->home_town }}"
                                                required
                                                placeholder="Home Town" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="state"
                                                name="state"
                                                value="{{ $user->state }}"
                                                required
                                                type="text"
                                                placeholder="City" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            @component('components.select-type-of-object-array', ['options' => $countries, 'selected' => old('country', $user->country), 'name' => 'country', 'id' => 'country', 'label' => 'Country'])
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            @component('components.select-type-of-object-array', ['options' => $programTypes, 'selected' => old('program_type', $user->program_type), 'name' => 'program_type', 'id' => 'program-type', 'label' => 'Program Type'])
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="home-phone-number"
                                                name="home_phone_number"
                                                value="{{ old('home_phone_number', $user->home_phone_number) }}"
                                                required
                                                type="text"
                                                placeholder="Home phone number" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="mobile-number"
                                                name="mobile_number"
                                                value="{{ old('mobile_number', $user->mobile_number) }}"
                                                required
                                                type="text"
                                                placeholder="Mobile" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="guardian-name"
                                                name="guardians_name"
                                                value="{{ old('guardians_name', $user->guardians_name) }}"
                                                required
                                                type="text"
                                                placeholder="Guardian" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-8">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="primary-address"
                                                name="primary_address"
                                                value="{{ old('primary_address', $user->primary_address) }}"
                                                required
                                                type="text"
                                                placeholder="Primary address..." />
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            @component('components.radio-buttons', ['name' => 'gender', 'options' => getGenderTypes(), 'selected' => ucfirst(old('gender', $user->gender)), 'label' => 'Gender', 'id' => 'gender', 'required' => true])
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="high-school-name"
                                                name="high_school_name"
                                                value="{{ old('high_school_name', $user->high_school_name) }}"
                                                required
                                                type="text"
                                                placeholder="High school name..." />
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <x-dynamic-input name="transcript" type="file" placeholder="Transcript" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="intended-major"
                                                name="intended_major"
                                                value="{{ old('intended_major', $user->intended_major) }}"
                                                required
                                                type="text"
                                                placeholder="Intended Major" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            @component('components.select-list', ['name' => 'registered_with_ncaa', 'options' => ['Yes', 'No'], 'selected' => ucfirst(old('registered_with_ncaa', $user->registered_with_ncaa)), 'label' => 'Registered With NCAA', 'id' => 'registered-with-ncaa', 'required' => true, 'arrayKey' => false])
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="ncaa-id"
                                                name="ncaa_id"
                                                value="{{ old('ncaa_id', $user->ncaa_id) }}"
                                                required
                                                placeholder="NCAA ID"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="sat-math"
                                                name="sat_math"
                                                value="{{ old('sat_math', $user->sat_math) }}"
                                                required
                                                placeholder="SAT Math"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="sat-reading"
                                                name="sat_reading"
                                                value="{{ old('sat_reading', $user->sat_reading) }}"
                                                required
                                                placeholder="SAT Reading"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="sat"
                                                name="sat"
                                                value="{{ old('sat', $user->sat) }}"
                                                required
                                                placeholder="SAT"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="sat-writing"
                                                name="sat_writing"
                                                value="{{ old('sat_writing', $user->sat_writing) }}"
                                                required
                                                placeholder="SAT Writing"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="sat-total"
                                                name="sat_total"
                                                value="{{ old('sat_total', $user->sat_total) }}"
                                                required
                                                placeholder="SAT Total"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="act-total"
                                                name="act_total"
                                                value="{{ old('act_total', $user->act_total) }}"
                                                required
                                                placeholder="ACT Total"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="act-total"
                                                name="academic_honor"
                                                value="{{ old('academic_honor', $user->academic_honor) }}"
                                                required
                                                placeholder="ACT Total"
                                                type="text" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                id="other-interest"
                                                name="other_interest"
                                                value="{{ old('other_interest', $user->other_interest) }}"
                                                required
                                                placeholder="Other Interest"
                                                type="text" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title mb-0">Additional Information</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <x-dynamic-input
                                                type="text"
                                                name="academic_honors"
                                                placeholder="Academic Honors"
                                                value="{{ $user->academic_honors }}"
                                                id="academic-honors" />
                                        </div>
                                        <div class="col-md-4">
                                            <x-dynamic-input
                                                type="date"
                                                name="birth_date"
                                                placeholder="Date of Birth"
                                                value="{{ $user->birth_date }}"
                                                id="birth-date" />
                                        </div>
                                        <div class="col-md-4">
                                            <x-dynamic-input
                                                type="text"
                                                name="class_rank"
                                                placeholder="Class Rank"
                                                value="{{ $user->class_rank }}"
                                                id="class-rank" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <x-dynamic-input
                                                type="text"
                                                name="college"
                                                placeholder="College"
                                                value="{{ $user->college }}"
                                                id="college" />
                                        </div>
                                        <div class="col-md-3">
                                            <x-dynamic-input
                                                type="text"
                                                name="core_gpa"
                                                placeholder="Core GPA"
                                                value="{{ $user->core_gpa }}"
                                                id="core-gpa" />
                                        </div>
                                        <div class="col-md-3">
                                            <x-dynamic-input
                                                type="text"
                                                name="gpa"
                                                placeholder="GPA"
                                                value="{{ $user->gpa }}"
                                                id="gpa" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-5">
                                            <x-dynamic-input
                                                type="text"
                                                name="grad_year"
                                                placeholder="Grade Year"
                                                value="{{ $user->grad_year }}"
                                                id="grad" />
                                        </div>
                                        <div class="col-md-3">
                                            <x-dynamic-input
                                                type="text"
                                                name="height"
                                                placeholder="Height"
                                                value="{{ $user->height }}"
                                                id="height" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <x-dynamic-input
                                                type="text"
                                                name="interest_level"
                                                placeholder="Interest Level"
                                                value="{{ $user->interest_level }}"
                                                id="interest-level" />
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
