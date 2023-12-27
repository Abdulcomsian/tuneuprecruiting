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
                                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-2">
                                        <div class="profile-title">
                                            <div class="d-flex">
                                                @php $profile_image = ($user->profile_image) ? asset("uploads/users_image/".$user->profile_image) : asset('assets/images/user/7.jpg'); @endphp
                                                <img class="img-70 rounded-circle" alt="" src="{{ $profile_image }}" style="width: 70px; height: 70px;">
                                                <div class="flex-grow-1">
                                                    <h3 class="mb-1">{{ $user->name }}</h3>
                                                    <p>COACH</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fileInput">
                                            Upload an image (JPG, JPEG, or PNG):
                                        </label>
                                        <input name="profile_image" type="file" placeholder="Choose image">
                                    </div>
                                    <div class="mb-3">
                                        @php $videoUrl = ($user->short_video) ? asset('uploads/users_video/'.$user->short_video) : asset('assets/images/social-app/timeline-3.png'); @endphp
                                        <iframe width="100%" class="embed-responsive-item" src="{{ $videoUrl }}" allowfullscreen></iframe>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fileInput">
                                            Upload a video:
                                        </label>
                                        <input name="short_video" type="file">
                                    </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                            @csrf
                            <div class="card-header pb-0">
                                <h3 class="card-title mb-0">Edit Profile</h3>
                                <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">First Name</label>
                                            <input
                                                class="form-control"
                                                name="first_name"
                                                value="{{ $user->first_name }}"
                                                type="text"
                                                placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input
                                                class="form-control"
                                                name="last_name"
                                                value="{{ $user->last_name }}"
                                                type="text"
                                                placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Email address</label>
                                            <input
                                                class="form-control"
                                                name="email"
                                                value="{{ $email }}"
                                                type="email"
                                                disabled
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
                                    <div class="col-sm-3 col-md-3">
                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label> <br />
                                            <input type="radio" name="gender" class="form-check-input" value="male" id="male" {{ old('gender', $user->gender) == 'male' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="male">Male</label>
                                            <input type="radio" name="gender" class="form-check-input" value="female" id="female" {{ old('gender', $user->gender) == 'female' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="female">Female</label>
                                            <input type="radio" name="gender" class="form-check-input" value="other" id="other" {{ old('gender', $user->gender) == 'other' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="other">Other</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label" for="program-type">Type of Program <span class="text-danger">*</span></label>
                                        <select name="program_type" id="program-type" class="form-control" required>
                                            <option value="">Select Type of Program</option>
                                            <option value="Golf" {{ old('program_type', $user->program_type) == 'Golf' ? 'selected' : '' }}>Golf</option>
                                            <option value="Soccer" {{ old('program_type', $user->program_type) == 'Soccer' ? 'selected' : '' }}>Soccer</option>
                                            <option value="Lacrosse" {{ old('program_type', $user->program_type) == 'Lacrosse' ? 'selected' : '' }}>Lacrosse</option>
                                            <option value="Hockey" {{ old('program_type', $user->program_type) == 'Hockey' ? 'selected' : '' }}>Hockey</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="college-or-university">College/University Name <span class="text-danger">*</span></label>
                                        <input
                                            class="form-control program-name"
                                            id="college-or-university"
                                            type="text"
                                            name="college_or_university"
                                            value="{{ old('college_or_university', $user->college_or_university) }}"
                                            placeholder="Enter program name"
                                            required>
                                    </div>
                                    <div class="col-md-12 mb-5">
                                        <div>
                                            <label class="form-label">About Me</label>
                                            <textarea
                                                class="form-control"
                                                name="about_me"
                                                rows="4"
                                                placeholder="Enter About your description">{{ $user->about_me }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
