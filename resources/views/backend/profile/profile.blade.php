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
                                        <x-input-label value="Upload an image (JPG, JPEG, or PNG):" labelFor="image" />
                                        <x-dynamic-input
                                            type="file"
                                            name="profile_image"
                                            accept="image/*"
                                            id="image" />
                                    </div>
                                    <div class="mb-3">
                                        @php $videoUrl = ($user->short_video) ? asset('uploads/users_video/'.$user->short_video) : asset('assets/images/social-app/timeline-3.png'); @endphp
                                        <iframe width="100%" class="embed-responsive-item" src="{{ $videoUrl }}" allowfullscreen></iframe>
                                    </div>
                                    <div class="mb-3">
                                        <x-input-label value="Upload a video:" labelFor="video" />
                                        <x-dynamic-input
                                            type="file"
                                            name="short_video"
                                            accept="video/*"
                                            id="video" />
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                            @csrf
                            <div class="card-header pb-0">
                                <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                type="text"
                                                value="{{ $user->first_name }}"
                                                placeholder="First Name"
                                                name="first_name"
                                                required="true"
                                                id="first-name" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                type="text"
                                                value="{{ $user->last_name }}"
                                                placeholder="Last Name"
                                                name="last_name"
                                                required="true"
                                                id="last-name" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                type="email"
                                                value="{{ $email }}"
                                                placeholder="email@example.com"
                                                name="email"
                                                disable="true"
                                                required="true"
                                                id="email" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                type="password"
                                                placeholder="Password"
                                                name="password"
                                                id="password" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <x-dynamic-input
                                                type="password"
                                                placeholder="Confirm Password"
                                                name="password_confirmation"
                                                id="confirm-password" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <div class="mb-3">
                                            @component('components.radio-buttons', [
                                                'name' => 'gender',
                                                'options' => getGenderTypes(),
                                                'selected' => ucfirst(old('gender', $user->gender)),
                                                'label' => 'Gender',
                                                'required' => true
                                                ])
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        @component('components.select-type-of-object-array', [
                                            'options' => $programTypes,
                                            'selected' => old('program_type', $user->program_type),
                                            'name' => 'program_type',
                                            'id' => 'program-type',
                                            'required' => 'true',
                                            'label' => 'Type of Program'
                                            ])
                                        @endcomponent
                                    </div>
                                    <div class="col-md-5">
                                        <x-dynamic-input
                                            type="text"
                                            placeholder="College/University Name"
                                            name="college_or_university"
                                            value="{{ old('college_or_university', $user->college_or_university) }}"
                                            required="trur"
                                            id="college-or-university" />
                                    </div>
                                    <div class="col-md-12 mb-5">
                                        <div>
                                            <x-input-textarea name="about_me" required="true" id="about-me" value="{{ $user->about_me }}" label="About Me" />
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
