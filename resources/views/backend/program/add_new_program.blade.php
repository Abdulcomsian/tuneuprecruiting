<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Add new program</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(["Program", "Add"]) !!}
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
                            <form method="POST" id="frm-program" action="{{ route('program.store') }}" class="row g-3" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="POST" id="route-method">
                                <input type="hidden" name="custom_fields" id="custom-fields">
                                <input type="hidden" value="{{ route('program.store') }}" id="route-post-method">
                                <div class="col-md-4">
                                    <x-bladewind.input
                                        name="program_name"
                                        required="true"
                                        id="program-name"
                                        label="Program Name"
                                        error_message="You will need to enter program name" />
                                </div>
                                <div class="col-md-4">
                                    <x-bladewind.input
                                        name="session"
                                        required="true"
                                        id="session"
                                        label="Session"
                                        error_message="You will need to enter session" />
                                </div>
                                <div class="col-md-4">
                                    <x-bladewind.input
                                        name="number_of_students"
                                        required="true"
                                        id="number-of-students"
                                        label="Number of Students"
                                        error_message="You will need to enter session" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="program-status">Status <span class="text-danger">*</span></label>
                                    <select name="status" required id="program-status" class="form-control">
                                        <option value="">Select</option>
                                        <option value="Public">Public</option>
                                        <option value="Dropped">Dropped</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="program-type">Program Type <span class="text-danger">*</span></label>
                                    @component('components.select-type-of-object-array', ['options' => $programTypes, 'selected' => old('program_for', $programType), 'name' => 'program_type', 'id' => 'program-type'])
                                    @endcomponent
                                </div>
                                <div class="col-md-3">
                                    <label for="gender" class="form-label">Program For <span class="text-danger">*</span></label>  <br />
                                    @component('components.radio-buttons', ['name' => 'program_for', 'options' => ['Male', 'Female', 'Other'], 'selected' => ucfirst(old('program_for', $gender))])
                                    @endcomponent
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="video">Video</label>
                                    <input
                                        class="form-control video"
                                        id="video"
                                        type="file"
                                        name="video_file"
                                        accept="video/*">
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="details">Details <span class="text-danger">*</span></label>
                                        <textarea class="form-control detail" id="details" required name="details"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div id="build-wrap"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
    <script>
        jQuery($ => {
            const fbTemplate = document.getElementById('build-wrap');
            $(fbTemplate).formBuilder();
        });

       $('#btn-from-add').click(function () {
           var codeElement = $('.formData-json');

           // Get the text content of the code element and trim whitespace
           var jsonString = $.trim(codeElement.html());
       })
    </script>
</x-app-layout>
