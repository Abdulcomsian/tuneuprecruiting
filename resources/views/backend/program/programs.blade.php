<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Total Programs</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">
                                    <svg class="stroke-icon">
                                        <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Programs</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid basic_table">
            <div class="row">
                <div class="col-sm-12">
                    <a class="btn btn-success mb-2 float-end" type="button" href="{{ route('program.create') }}">Add a Program</a>
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
                            <div class="table-responsive theme-scrollbar">
                                <table class="display" id="data-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Session</th>
                                            <th scope="col">Number of Students</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Detail</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($programs as $program)
                                            <tr class="border-bottom-secondary">
                                                <td>{{ $program->program_name }}</td>
                                                <td>{{ $program->session }}</td>
                                                <td>{{ $program->number_of_students }}</td>
                                                <td>{{ $program->status }}</td>
                                                <td>{{ $program->details }}</td>
                                                <td>
                                                    <ul class="action">
                                                        <li class="edit"><a href="{{ route('program.show', $program->id) }}"><i class="icofont icofont-eye-alt"></i></a></li>
                                                        <li class="edit"><a href="{{ route('program.edit', $program->id) }}"><i class="fa fa-pencil-square-o"></i></a></li>
                                                        <li class="delete">
                                                            <form method="POST" action="{{ route('program.destroy', $program->id) }}" onsubmit='return confirm("Are you sure?")'>
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
        <!-- Full screen modal -->
        <div class="modal fade" id="exampleModalfullscreen" tabindex="-1" aria-labelledby="fullScreenModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="fullScreenModalLabel">Add a new program</h1>
                        <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body dark-modal">
                        @if ($errors->any())
                            <script>
                                $(document).ready(function() {
                                    // When the document is ready, show the modal if it has the "show" class
                                    $('#exampleModalfullscreen').modal('show');
                                });
                            </script>
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
                        <form method="POST" id="frm-program" action="{{ route('program.store') }}" class="row g-3 needs-validation" novalidate="">
                            @csrf
                            <input type="hidden" name="_method" value="POST" id="route-method">
                            <input type="hidden" value="{{ route('program.store') }}" id="route-post-method">
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom01">Program Name</label>
                                <input
                                    class="form-control program-name"
                                    id="validationCustom01"
                                    type="text"
                                    name="program_name"
                                    placeholder="Enter program name"
                                    required="">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom02">Session</label>
                                <input
                                    class="form-control session"
                                    id="validationCustom02"
                                    type="text"
                                    name="session"
                                    placeholder="Enter session"
                                    required="">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="validationCustom02">Number of Students</label>
                                <input
                                    class="form-control number-of-students"
                                    id="validationCustom02"
                                    type="text"
                                    name="number_of_students"
                                    placeholder="Enter number"
                                    required="">
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput1">Details</label>
                                    <textarea class="form-control detail" name="details"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary" id="btn-from-add" type="submit">Add</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End full screen modal -->
    </div>
    <script>
        $('#btn-add').click(function () {
            // empty inputs
            resetFormInputs();

            $('#exampleModalfullscreen').modal('show');
        })

        function resetFormInputs() {
            $('#route-method').val('POST');
            $('#btn-from-add').text("Add");
            const postRoute = $('#route-post-method').val();

            const form = $('#frm-program');
            form.attr('action', postRoute);

            $('.program-name').val('');
            $('.session').val('');
            $('.number-of-students').val('');
            $('.detail').val('');
        }

        $('.btn-edit').on('click', function () {
            $('#btn-from-add').text("Update");
            const route = $(this).data('route');
            const getDataRoute = $(this).data('get-data-route');

            const form = $('#frm-program');
            form.attr('action', route);

            $('#route-method').val('PUT');

            $.ajax({
                url: getDataRoute,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('.program-name').val(data.program_name);
                    $('.session').val(data.session);
                    $('.number-of-students').val(data.number_of_students);
                    $('.detail').val(data.detail);

                    $('#exampleModalfullscreen').modal('show');
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error("Error: " + error);
                }
            });
        })
    </script>
</x-app-layout>
