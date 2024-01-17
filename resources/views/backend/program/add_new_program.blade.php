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
                                    <x-dynamic-input
                                        type="text"
                                        placeholder="Program Name"
                                        name="program_name"
                                        required="true"
                                        id="program-name" />
                                </div>
                                <div class="col-md-4">
                                    <x-dynamic-input
                                        type="text"
                                        placeholder="Number of Students"
                                        name="number_of_students"
                                        required="true"
                                        id="number-of-students" />
                                </div>
                                <div class="col-md-4">
                                    @component('components.select-list', [
                                        'options' => ['Public', 'Dropped'],
                                        'selected' => old('status'),
                                        'name' => 'status',
                                        'id' => 'program-status',
                                        'arrayKey' => false,
                                        'required' => true,
                                        'label' => 'Status'
                                        ])
                                    @endcomponent
                                </div>
                                <div class="col-md-4">
                                    @component('components.select-type-of-object-array', [
                                        'options' => $programTypes,
                                        'selected' => old('program_for', $programType),
                                        'name' => 'program_type',
                                        'id' => 'program-type',
                                        'required' => true,
                                        'label' => 'Program Type'
                                        ])
                                    @endcomponent
                                </div>
                                <div class="col-md-4">
                                    <x-dynamic-input
                                        type="file"
                                        name="video_file"
                                        accept="video/*"
                                        placeholder="Video"
                                        id="video" />
                                </div>
                                <div class="col-md-4">
                                    @component('components.radio-buttons', [
                                        'name' => 'program_for',
                                        'options' => ['Male', 'Female', 'Other'],
                                        'selected' => ucfirst(old('program_for', $gender)),
                                        'label' => 'Program For'
                                        ])
                                    @endcomponent
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <x-input-textarea name="details" label="Details" required="true" id="details" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div id="program-id"></div>
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
