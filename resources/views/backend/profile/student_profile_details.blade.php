<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Student Profile</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(["Profile"]) !!}
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
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
