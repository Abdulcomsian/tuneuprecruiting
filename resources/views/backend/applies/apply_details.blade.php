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
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            Personal Information
                        </div>
                        <div class="card-body">
                            <div class="table-responsive theme-scrollbar">
                                <table class="table mb-5">
                                    @foreach ($studentDetail->getAttributes() as $key => $detail)
                                        @php
                                            $columnName = getColumnNameOfBasicInformation($key);
                                        @endphp

                                        @if ($columnName)
                                            <tr>
                                                <td>{{ $columnName }}</td>
                                                <td>
                                                    @if($key == 'cv')
                                                        <a href="{{ url('uploads/student_cv/'.$detail) }}">{{ $detail }}</a>
                                                    @elseif($key == 'short_video')
                                                        <a href="{{ url('uploads/students_videos/'.$detail) }}">{{ $detail }}</a>
                                                    @elseif($key == 'profile_image')
                                                        <a href="{{ url('uploads/users_image/'.$detail) }}">{{ $detail }}</a>
                                                    @else
                                                        {{ $detail }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            Academic Information
                        </div>
                        <div class="card-body">
                            <div class="table-responsive theme-scrollbar">
                                <table class="table mb-5">
                                    @foreach ($studentDetail->getAttributes() as $key => $detail)
                                        @php
                                            $columnName = getColumnNameOfAcademicInformation($key);
                                        @endphp

                                        @if ($columnName)
                                            <tr>
                                                <td>{{ $columnName }}</td>
                                                <td>
                                                    @if($key == 'transcript')
                                                        <a href="{{ url('uploads/transcript/'.$detail) }}">{{ $detail }}</a>
                                                    @else
                                                        {{ $detail }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                @if(!$applyDetails->isEmpty())
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive theme-scrollbar">
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
                @endif

                @if (!$applyRequirements->isEmpty()) ?>
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
                @endif
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
