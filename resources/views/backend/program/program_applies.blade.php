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
                            <li class="breadcrumb-item">Applies</li>
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
                            <h3>Program</h3>
                        </div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive theme-scrollbar">
                                    <table class="table">
                                        <tbody>
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
                            <h3>Questions</h3>
                        </div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive theme-scrollbar">
                                    @if($questions)
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Question</th>
                                                <th scope="col">Type</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($questions as $question)
                                                <tr>
                                                    <td>{{ $question->label }}</td>
                                                    <td>{{ $question->type }}</td>
                                                </tr>
                                            @empty
                                                <p>No items found.</p>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    @else
                                        <p class="m-3">No Question or custom fields.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive theme-scrollbar">
                                <table class="display" id="data-table">
                                    <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Graduation Year</th>
                                        <th>Country</th>
                                        <th>Home Town</th>
                                        <th>State</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($applies as $apply)
                                        <tr class="border-bottom-secondary">
                                            <th scope="row">{{ $apply->student->first_name . $apply->student->last_name }}</th>
                                            <td>{{ $apply->student->graduation_year }}</td>
                                            <td>{{ $apply->student->country }}</td>
                                            <td>{{ $apply->student->home_town }}</td>
                                            <td>{{ $apply->student->state }}</td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit"> <a href="{{ url('apply/status/'.encrypt($apply->id)) }}">
                                                            @if($apply->star == 'star')
                                                                <i class="icofont icofont-heart-alt"></i></a>
                                                        @else
                                                            <i class="fa fa-heart-o"></i>
                                                        @endif

                                                    </li>
                                                    <li class="edit"> <a href="{{ route('chat', encrypt($apply->student_id)) }}">
                                                            @if($apply->talking == 'talking')
                                                                <i class="icofont icofont-ui-text-chat"></i>
                                                            @else
                                                                <i class="icofont icofont-chat"></i></a>
                                                        @endif
                                                    </li>
                                                    <li class="edit"><a href="{{ url('/apply/view/'. encrypt($apply->id)) }}"><i class="icofont icofont-eye-alt"></i></a></li>
                                                    <li class="delete">
                                                        <form method="POST" action="{{ route('apply.destroy', ['id' => encrypt($apply->id)]) }}" onsubmit='return confirm("Are you sure?")'>
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="#" onclick="$(this).closest('form').submit();"><i class="fa fa-trash"></i></a>
                                                        </form>
                                                    </li>
                                                </ul>
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
