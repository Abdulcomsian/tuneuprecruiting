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
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">
                                    <svg class="stroke-icon">
                                        <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Users</li>
                            <li class="breadcrumb-item active"> Edit Profile</li>
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
                                        <label for="fileInput">
                                            Upload an image (JPG, JPEG, or PNG):
                                        </label>
                                        <input name="profile_image" type="file" placeholder="Choose image" accept=".jpg,.jpeg,png">
                                    </div>
                                    <div class="mb-3">
                                        @php $videoUrl = ($user->short_video) ? asset('uploads/students_videos/'.$user->short_video) : asset('assets/images/social-app/timeline-3.png'); @endphp
                                        <iframe width="100%" class="embed-responsive-item" src="{{ $videoUrl }}" allowfullscreen></iframe>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fileInput">
                                            Upload a video:
                                        </label>
                                        <input name="short_video" type="file">
                                    </div>
                                    <div class="mb-3">
                                        @php $videoUrl = ($user->cv) ? asset('uploads/student_cv/'.$user->cv) : asset('assets/images/social-app/timeline-3.png'); @endphp
                                        <iframe width="100%" class="embed-responsive-item" src="{{ $videoUrl }}" allowfullscreen></iframe>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fileInput">
                                            Upload a CV:
                                        </label>
                                        <input name="cv" type="file" accept=".doc,.ppt,.pdf">
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
                                            <label class="form-label">First Name <span class="text-danger">*</span></label>
                                            <input
                                                class="form-control"
                                                name="first_name"
                                                value="{{ $user->first_name }}"
                                                type="text"
                                                required
                                                placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                            <input
                                                class="form-control"
                                                name="last_name"
                                                value="{{ $user->last_name }}"
                                                type="text"
                                                required
                                                placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Email address <span class="text-danger">*</span></label>
                                            <input
                                                class="form-control"
                                                name="graduation_year"
                                                value="{{ $email }}"
                                                type="text"
                                                disabled
                                                required
                                                placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input
                                                class="form-control"
                                                name="password"
                                                type="text"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input
                                                class="form-control"
                                                name="password_confirmation"
                                                type="text"
                                                placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Graduation Year <span class="text-danger">*</span></label>
                                            <input
                                                class="form-control"
                                                name="graduation_year"
                                                type="text"
                                                value="{{ $user->graduation_year }}"
                                                required
                                                placeholder="Graduation Year">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Home Town <span class="text-danger">*</span></label>
                                            <input
                                                class="form-control"
                                                name="home_town"
                                                type="text"
                                                value="{{ $user->home_town }}"
                                                required
                                                placeholder="Home Town">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">State <span class="text-danger">*</span></label>
                                            <input
                                                class="form-control"
                                                name="state"
                                                value="{{ $user->state }}"
                                                required
                                                type="text"
                                                placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Country <span class="text-danger">*</span></label>
                                            <select class="form-control btn-square" name="country" required>
                                                @if($user->country)
                                                    <option value="{{ $user->country }}">{{ $user->country }}</option>
                                                @endif
                                                <option value="">--Select--</option>
                                                <option value="germany">Germany</option>
                                                <option value="canada">Canada</option>
                                                <option value="usa">Usa</option>
                                                <option value="aus"></option>
                                            </select>
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
                                            <label for="academic-honors" class="form-label">Academic Honors</label>
                                            <input type="text" name="academic_honors" value="{{ $user->academic_honors }}" class="form-control" id="academic-honors">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="birth-date" class="form-label">Birth Date</label>
                                            <input type="date" name="birth_date" value="{{ $user->birth_date }}" class="form-control" id="birth-date">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="class-rank" class="form-label">Class Rank</label>
                                            <input type="text" name="class_rank" value="{{ $user->class_rank }}" class="form-control" id="class-rank">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="college" class="form-label">College</label>
                                            <input type="text" name="college" value="{{ $user->college }}" class="form-control" id="college">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="core-gpa" class="form-label">Core GPA</label>
                                            <input type="text" name="core_gpa" value="{{ $user->core_gpa }}" class="form-control" id="core-gpa">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="gpa" class="form-label">GPA</label>
                                            <input type="text" name="gpa" value="{{ $user->gpa }}" class="form-control" id="gpa">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="gender" class="form-label">Gender</label> <br />
                                            <input type="radio" name="gender" {{ ($user->gender == 'male') ? 'checked' : '' }} class="form-check-input" value="male" id="male">
                                            <label class="form-check-label" for="male">Male</label>
                                            <input type="radio" name="gender" {{ ($user->gender == 'female') ? 'checked' : '' }} class="form-check-input" value="female" id="female">
                                            <label class="form-check-label" for="female">Female</label>
                                            <input type="radio" name="gender" {{ ($user->gender == 'other') ? 'checked' : '' }} class="form-check-input" value="other" id="other">
                                            <label class="form-check-label" for="other">Other</label>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="grad" class="form-label">Grad. Year</label>
                                            <input type="text" name="grad_year" value="{{ $user->grad_year }}" class="form-control" id="grad">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="height" class="form-label">Height</label>
                                            <input type="text" name="height" value="{{ $user->height }}" class="form-control" id="height">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="home-phone" class="form-label">Home Phone</label>
                                            <input type="text" name="home_phone" value="{{ $user->home_phone }}" class="form-control" id="home-phone">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="interest-level" class="form-label">Interests Level</label>
                                            <input type="text" name="interest_level" value="{{ $user->interest_level }}" class="form-control" id="interest-level">
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
