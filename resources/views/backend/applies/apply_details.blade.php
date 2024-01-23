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
                                            <td>{{ $studentDetail->first_name . ' ' . $studentDetail->last_name }}</td>
                                            <td>{{ $studentDetail->graduation_year }}</td>
                                            <td>{{ $studentDetail->country }}</td>
                                            <td>{{ $studentDetail->home_town }}</td>
                                            <td>{{ $studentDetail->state }}</td>
                                            <td><a href="{{ asset('uploads/student_cv/'.$studentDetail->cv) }}">{{ $studentDetail->cv }}</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>Question</th>
                                            <th>Answer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($applyDetails as $detail)
                                            @if($detail->type == 'checkbox-group')
                                                @php
                                                    $values = json_decode($detail->answer);
                                                    $detail->answer = '';
                                                    foreach ($values as $value) {
                                                        $detail->answer .= ucfirst($value) . ", ";
                                                    }
                                                @endphp
                                            @endif
                                            <tr class="border-bottom-secondary">
                                                <td>{{ $detail->label }}</td>
                                                <td>
                                                    @if($detail->type == 'file')
                                                        <a href="{{ asset('uploads/apply_data/'.$detail->answer) }}">{{ $detail->answer }}</a>
                                                    @else
                                                        {{ $detail->answer }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive theme-scrollbar">
                                <table class="display" id="basic-2">
                                    <thead>
                                    <tr>
                                        <th>Requirement</th>
                                        <th>Details</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($applyRequirements ?? [] as $requirement)
                                        @if($requirement->type == 'checkbox-group')
                                            @php
                                                $values = json_decode($requirement->answer);
                                                $requirement->answer = '';
                                                foreach ($values as $value) {
                                                    $requirement->answer .= ucfirst($value) . ", ";
                                                }
                                            @endphp
                                        @endif
                                        <tr class="border-bottom-secondary">
                                            <td>{{ $requirement->label }}</td>
                                            <td>
                                                @if($requirement->type == 'file')
                                                    <a href="{{ asset('uploads/apply_data/'.$requirement->answer) }}">{{ $requirement->answer }}</a>
                                                @else
                                                    {{ $requirement->answer }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
