<x-app-layout>
    <style>
        .btn.btn-black {
            background-color: #000;
            color: #fff;
            border: none;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 0.25rem;
            transition: background-color 0.2s;
        }

        .btn.btn-black:hover {
            background-color: #444;
        }
    </style>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Add new Coach</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(['Add new Coach']) !!}
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

                            @if (session('success') || session('danger'))
                                @php $className = (session('success')) ? 'success' : 'danger'; @endphp
                                @php $message = (session('success')) ? session('success') : session('danger'); @endphp
                                <div class="alert alert-{{ $className }}">
                                    {{ $message }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('store.coach') }}" class="row g-3"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-3">
                                    <x-dynamic-input id="university" type="university" name="university"
                                        value="{{ old('university') }}" placeholder="Enter University Name"
                                        required="true" />
                                </div>
                                <div class="col-md-3">
                                    <x-dynamic-input id="division" type="text" name="division"
                                        value="{{ old('division') }}" placeholder="Enter Division" required="true" />
                                </div>
                                <div class="col-md-3">
                                    <x-dynamic-input id="name" type="text" name="name"
                                        value="{{ old('name') }}" placeholder="Enter Coach Name" required="true" />
                                </div>
                                <div class="col-md-3">
                                    <x-dynamic-input id="email" type="email" name="email"
                                        value="{{ old('email') }}" placeholder="Enter Coach Email" required="true" />
                                </div>
                                {{-- <div class="col-md-3">
                                    <label>Select University</label>
                                    <select name="university" class="bw-raw-select" required>
                                        @foreach ($universities as $university)
                                            <option value="{{$university->id}}">{{$university->name}}</option>
                                        @endforeach
                                    </select>
                                </div> --}}

                                <div class="col-md-12">
                                    <button class="btn btn-primary float-end mt-3" id="btn-from-add"
                                        type="submit">Submit</button>
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
                                        <th scope="col">Division</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
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


    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Coach</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="university">University</label>
                            <input type="text" class="form-control" id="university" name="university" required>
                        </div>
                        <div class="form-group">
                            <label for="division">Division</label>
                            <input type="text" class="form-control" id="division" name="division" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="d-flex justify-content-end pt-3">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function() {
            var table = $('.data-table').DataTable({
                "order": [
                    [0, "desc"]
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('manage.coach') }}",
                columns: [{
                        data: null,
                        name: 'index',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'university',
                        name: 'university'
                    },
                    {
                        data: 'division',
                        name: 'division'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: false
                    },
                ],
                createdRow: function(row, data, dataIndex) {
                    $('td:eq(0)', row).html(dataIndex + 1);
                }
            });
        });


        $(document).on("click", ".delete", function() {
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
                        url: "{{ route('delete.coach') }}",
                        type: 'post',
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id
                        },
                        success: function(res) {
                            if (res.success == true) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: res.msg,
                                    icon: "success",
                                    customClass: {
                                        confirmButton: 'btn btn-black' // Custom class for the confirm button
                                    },
                                    buttonsStyling: false
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: "Not Deleted!",
                                    text: res.msg,
                                    icon: "error",
                                    customClass: {
                                        confirmButton: 'btn btn-black' // Custom class for the confirm button
                                    },
                                    buttonsStyling: false
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                });
                            }

                        },
                    })
                }
            });
        })

        $(document).on("click", ".edit", function() {
            let id = $(this).data('id');
            $.ajax({
                url: "{{ route('edit.coach') }}",
                type: 'get',
                data: {
                    id: id
                },
                success: function(res) {
                    if (res.success) {
                        // Populate the form with the returned data
                        $('#editForm #id').val(res.data.id);
                        $('#editForm #university').val(res.data.university.name);
                        $('#editForm #division').val(res.data.division);
                        $('#editForm #name').val(res.data.name);
                        $('#editForm #email').val(res.data.email);

                        // Show the edit modal
                        $('#editModal').modal('show');
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: res.msg,
                            icon: "error"
                        });
                    }
                }
            });
        });

        $(document).on("submit", "#editForm", function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('update.coach') }}",
                type: 'post',
                data: $(this).serialize(),
                success: function(res) {
                    console.log(res);
                    if (res.success) {
                        Swal.fire({
                            title: "Updated!",
                            text: res.msg,
                            icon: "success",
                            customClass: {
                                confirmButton: 'btn btn-black' // Custom class for the confirm button
                            },
                            buttonsStyling: false
                        }).then(() => {
                            $('#editModal').modal('hide');
                            $('.data-table').DataTable().ajax.reload();
                        });
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: res.msg,
                            icon: "error",
                            customClass: {
                                confirmButton: 'btn btn-black' // Custom class for the confirm button
                            },
                            buttonsStyling: false
                        });
                    }
                },
                error: function(xhr, status, error) {
                    let errorMessage = xhr.status + ': ' + xhr.statusText;
                    Swal.fire({
                        title: "Error!",
                        text: "Error - " + errorMessage,
                        icon: "error"
                    });
                }
            });
        });
    </script>
</x-app-layout>
