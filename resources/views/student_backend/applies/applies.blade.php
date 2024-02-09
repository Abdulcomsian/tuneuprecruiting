<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3> My Applications</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(["My Applications"]) !!}
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
                                <table class="display" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>College Name</th>
                                            <th>Program Name</th>
                                            <th>Coach Name</th>
                                            <th>Number of Students</th>
                                            <th>Detail</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th><x-list-view-action-heading /></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($applies as $apply)
                                            @php $formatting = getApplyRowColor($apply) @endphp
                                            <tr class="border-bottom-secondary {{ $formatting['bgColor'] }}">
                                                <td class="{{ $formatting['bgColor'] }}">{{ $apply->college_or_university }}</td>
                                                <td>{{ $apply->program_name }}</td>
                                                <td>{{ $apply->first_name . " " . $apply->last_name }}</td>
                                                <td>{{ $apply->number_of_students }}</td>
                                                <td>{{ $apply->details }}</td>
                                                <td>{{ $apply->status }}</td>
                                                <td>{{ $apply->created_at }}</td>
                                                <td>
                                                    <ul class="action">
                                                        @if(isAccepted($apply))
                                                            @if(checkForApplyRequirements($apply->id))
                                                                <li class="edit">
                                                                    <a href="{{ url('/student/apply/requirements/form/'.encrypt($apply->apply_id)) }}"
                                                                       title="Submit Requirements">
                                                                        <i class="icofont icofont-file-document {{ $formatting['textColor'] }}"></i>
                                                                    </a>
                                                                </li>
                                                            @endif
                                                            <li class="edit">
                                                                <a class="{{ $formatting['textColor'] }}" title="Chat"
                                                                   href="{{ route('chat', encrypt($userId)) }}">
                                                                    <i class="icofont icofont-chat {{ $formatting['textColor'] }}"></i></a>
                                                            </li>
                                                        @endif
                                                        <li class="edit">
                                                            <a href="{{ route('apply.edit', encrypt($apply->apply_id)) }}">
                                                                <i class="fa fa-pencil-square-o {{ $formatting['textColor'] }}"></i>
                                                            </a>
                                                        </li>
                                                        <li class="edit">
                                                            <a href="{{ route('program.apply.view', encrypt($apply->apply_id)) }}">
                                                            <i class="icofont icofont-eye-alt {{ $formatting['textColor'] }}"></i></a>
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
                        <h1 class="modal-title fs-5" id="fullScreenModalLabel">Program Apply</h1>
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
                                <button class="btn btn-primary" disabled id="btn-from-add" type="submit">Apply</button>
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
            $('#btn-from-add').text("Apply");
            const postRoute = $('#route-post-method').val();

            const form = $('#frm-program');
            form.attr('action', postRoute);

            $('.program-name').val('');
            $('.session').val('');
            $('.number-of-students').val('');
            $('.detail').val('');
        }

        $('.btn-edit').on('click', function () {
            $('#btn-from-add').text("Apply");
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
