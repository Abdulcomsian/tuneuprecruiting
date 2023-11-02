<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Total Applies</h3>
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
                        <div class="table-responsive theme-scrollbar">
                            <table class="table">
                                <thead>
                                <tr class="border-bottom-primary">
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Graduation Year</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Home Town</th>
                                    <th scope="col">State</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($applies as $apply)
                                    <tr class="border-bottom-secondary">
                                        <th scope="row">{{ $apply->student->first_name . $apply->student->last_name }}</th>
                                        <td> <img class="img-30 me-2" src="../assets/images/user/1.jpg" alt="profile">Ram Jacob</td>
                                        <td>{{ $apply->student->graduation_year }}</td>
                                        <td>{{ $apply->student->country }}</td>
                                        <td>{{ $apply->student->home_town }}</td>
                                        <td>{{ $apply->student->state }}</td>
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
                                                <li class="delete"><a href="#"><i class="icon-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="dataTables_paginate paging_simple_numbers">
                                {{ $applies->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
