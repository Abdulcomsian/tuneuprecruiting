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
                            <li class="breadcrumb-item">Edit</li>
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
                            <form method="POST" id="frm-program" action="{{ route('program.update', $program->id) }}" class="row g-3 needs-validation" novalidate="">
                                @csrf
                                <input type="hidden" name="_method" value="PUT" id="route-method">
                                <input type="hidden" name="program_id" value="{{ $program->id }}">
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom01">Program Name</label>
                                    <input
                                        class="form-control program-name"
                                        id="validationCustom01"
                                        type="text"
                                        name="program_name"
                                        value="{{ $program->program_name }}"
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
                                        value="{{ $program->session }}"
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
                                        value="{{ $program->number_of_students }}"
                                        placeholder="Enter number"
                                        required="">
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Details</label>
                                        <textarea class="form-control detail" name="details">{{ $program->details }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    @foreach($questions as $question)
                                        <div id="row" class="d-flex">
                                            <input type="hidden" name="ids[]" value="{{ $question->id }}">
                                            <div class="col-md-10">
                                                <div class="input-group mb-3">

                                                    <input type="text" name="questions[]" value="{{ $question->question }}" class="form-control m-input">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <select name="types[]" id="" class="form-control">
                                                    <option value="{{ $question->type }}">{{ $question->type }}</option>
                                                    <option value="text">Text</option>
                                                    <option value="radio">Radio</option>
                                                    <option value="checkbox">Checkbox</option>
                                                    <option value="file">File</option>
                                                </select>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div id="newinput"></div>
                                    <button id="rowAdder" type="button" class="btn btn-dark">
                                        <span class="bi bi-plus-square-dotted">
                                        </span> ADD Question
                                    </button>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary float-end" id="btn-from-add" type="submit">Add Program</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
    <script type="text/javascript">
        $("#rowAdder").click(function () {
            newRowAdd =
                '<div id="row" class="d-flex">' +
                '<div class="col-md-10">' +
                '<div class="input-group mb-3">' +
                '<div class="input-group-prepend">' +
                '<button class="btn btn-danger" id="DeleteRow" type="button">' +
                '<i class="bi bi-trash"></i> Delete</button>' +
                '</div>' +
                '<input type="text" required name="questions[]" class="form-control m-input">' +
                '</div>' +
                '</div>' +
                '<div class="col-md-2">' +
                '<select required name="types[]" id="" class="form-control">' +
                '<option value="">Question type</option>' +
                '<option value="text">Text</option>' +
                '<option value="radio">Radio</option>' +
                '<option value="checkbox">Checkbox</option>' +
                '<option value="file">File</option>' +
                '</select>' +
                '</div>' +
                '</div>';

            $('#newinput').append(newRowAdd);
        });
        $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
        })
    </script>
</x-app-layout>
