<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Application Details</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(["Applies"]) !!}
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
                            <div class="table-responsive theme-scrollbar">
                                <table class="table mb-5">
                                    <thead>
                                        <tr>
                                            <th>Complete Name</th>
                                            <th>Graduation Year</th>
                                            <th>Country</th>
                                            <th>Home Town</th>
                                            <th>State</th>
                                            <th>CV</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $apply->first_name . ' ' . $apply->last_name }}</td>
                                            <td>{{ $apply->graduation_year }}</td>
                                            <td>{{ $apply->country }}</td>
                                            <td>{{ $apply->home_town }}</td>
                                            <td>{{ $apply->state }}</td>
                                            <td><a href="{{ asset('uploads/student_cv/'.$apply->cv) }}">{{ $apply->cv }}</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                            @if($apply->status == 'accepted')
                                <div class="alert alert-success">
                                    Approved. The notification has been dispatched to the student.
                                </div>
                            @else
                                <form method="POST" id="frm-requirement" action="{{ route('apply.request.requirement') }}" class="row g-3" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_method" value="POST" id="route-method">
                                    <input type="hidden" name="custom_fields" id="custom-fields">
                                    <input type="hidden" name="apply_id" value="{{ $apply->apply_id }}">
                                    <div class="col-md-12">
                                        <div id="requirements-id"></div>
                                        <div id="build-wrap"></div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
