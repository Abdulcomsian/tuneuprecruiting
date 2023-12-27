<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Add new Recruiter</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(["Add new Recruiter"]) !!}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid basic_table">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
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
                            <form method="POST" id="frm-recuriter" action="{{ route('recuriter.store') }}" class="row g-3" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-3">
                                    <label class="form-label" for="first-name">First Name <span class="text-danger">*</span></label>
                                    <input
                                        class="form-control program-name"
                                        id="first-name"
                                        type="text"
                                        name="first_name"
                                        value="{{ old('first_name') }}"
                                        placeholder="First name"
                                        required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="last-name">Last Name <span class="text-danger">*</span></label>
                                    <input
                                        class="form-control"
                                        id="last-name"
                                        type="text"
                                        name="last_name"
                                        value="{{ old('last_name') }}"
                                        placeholder="Last name"
                                        required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="college-or-university">College/University Name <span class="text-danger">*</span></label>
                                    <input
                                        class="form-control program-name"
                                        id="college-or-university"
                                        type="text"
                                        name="college_or_university"
                                        value="{{ old('college_or_university') }}"
                                        placeholder="Enter program name"
                                        required>
                                </div>
                                <div class="col-md-3">
                                    <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label> <br />
                                    <input type="radio" name="gender" class="form-check-input" value="male" id="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="male">Male</label>
                                    <input type="radio" name="gender" class="form-check-input" value="female" id="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="female">Female</label>
                                    <input type="radio" name="gender" class="form-check-input" value="other" id="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="program-type">Type of Program <span class="text-danger">*</span></label>
                                    <select name="program_type" id="program-type" class="form-control" required>
                                        <option value="">Select Type of Program</option>
                                        <option value="Golf" {{ old('program_type') == 'Golf' ? 'selected' : '' }}>Golf</option>
                                        <option value="Soccer" {{ old('program_type') == 'Soccer' ? 'selected' : '' }}>Soccer</option>
                                        <option value="Lacrosse" {{ old('program_type') == 'Lacrosse' ? 'selected' : '' }}>Lacrosse</option>
                                        <option value="Hockey" {{ old('program_type') == 'Hockey' ? 'selected' : '' }}>Hockey</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="video">Email <span class="text-danger">*</span></label>
                                    <input
                                        class="form-control video"
                                        id="email"
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="example@example.com"
                                        required>
                                </div>
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
