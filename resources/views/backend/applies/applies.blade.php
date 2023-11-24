<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Total Applications</h3>
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
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive theme-scrollbar">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Program</th>
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
                                                <th scope="row">{{ $apply->first_name . $apply->last_name }}</th>
                                                <td>{{ $apply->program_name }}</td>
                                                <td>{{ $apply->graduation_year }}</td>
                                                <td>{{ $apply->country }}</td>
                                                <td>{{ $apply->home_town }}</td>
                                                <td>{{ $apply->state }}</td>
                                                <td>
                                                    <ul class="action">
                                                        <li class="edit"> <a href="#">
                                                                @if($apply->status == 'STAR')
                                                                    <i class="fa fa-heart-o"></i>
                                                                @else
                                                                    <i class="icofont icofont-heart-alt"></i></a>
                                                            @endif

                                                        </li>
                                                        <li class="edit"> <a href="{{ route('chat', [ 'id' => $apply->id, 'type' => 'User' ]) }}">
                                                                @if($apply->status == 'TALKING')
                                                                    <i class="icofont icofont-ui-text-chat"></i>
                                                                @else
                                                                    <i class="icofont icofont-chat"></i></a>
                                                            @endif
                                                        </li>
                                                        <li class="edit"><a href="{{ url('/apply/view/'. encrypt($apply->id)) }}"><i class="icofont icofont-eye-alt"></i></a></li>
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
