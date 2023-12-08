<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3></h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">
                                    <svg class="stroke-icon">
                                        <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Program</li>
                            <li class="breadcrumb-item">View Program</li>
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
                            <h3>Program Details</h3>
                        </div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive theme-scrollbar">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Coach Name</td>
                                                <td>{{ $coach->first_name . " " . $coach->last_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Program Name</td>
                                                <td>{{ $program->program_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Session</td>
                                                <td>{{ $program->session }}</td>
                                            </tr>
                                            <tr>
                                                <td>Number of Students</td>
                                                <td>{{ $program->number_of_students }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <a class="btn btn-success float-end" href="{{ url('/program/apply/'. encrypt($program->id)) }}">Apply</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>Video</h3>
                        </div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive theme-scrollbar">
                                    @if($program->video)
                                        <video width="640" height="360" controls>
                                            <source src="{{ asset('uploads/program_videos/'.$program->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @else
                                        <p class="text-center">No video found.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
