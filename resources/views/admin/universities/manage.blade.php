<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Add new Coach</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(["Add new Coach"]) !!}
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
                            <form method="POST" action="{{ route('store.university') }}" class="row g-3" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-3">
                                    <x-dynamic-input
                                        id="name"
                                        type="text"
                                        name="university_name"
                                        value="{{ old('university_name') }}"
                                        placeholder="University Name"
                                        required="true" />
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

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive theme-scrollbar">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">University/College Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function () {
            var table = $('.data-table').DataTable({
                "order": [[0, "desc"]],
                processing: true,
                serverSide: true,
                ajax: "{{ route('manage.university') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });


        $(document).on("click", ".delete", function(){
            let id = $(this).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{route('delete.university')}}",
                        type: 'post',
                        data: {_token: "{{csrf_token()}}", id: id},
                        success:function(res){
                            if(res.success == true){
                                Swal.fire({
                                    title: "Deleted!",
                                    text: res.msg,
                                    icon: "success"
                                }).then((result)=>{
                                    if(result.isConfirmed){
                                        location.reload();
                                    }
                                });
                            }else{
                                Swal.fire({
                                    title: "Not Deleted!",
                                    text: res.msg,
                                    icon: "error"
                                }).then((result)=>{
                                    if(result.isConfirmed){
                                        location.reload();
                                    }
                                });
                            }
                            
                        },
                    })
                }
            });
        })
    </script>
</x-app-layout>
