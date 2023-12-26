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
                                <div class="col-md-3">
                                    <label class="form-label" for="program-name">Program Name  <span class="text-danger">*</span></label>
                                    <input
                                        class="form-control program-name"
                                        id="program-name"
                                        type="text"
                                        name="program_name"
                                        placeholder="Enter program name"
                                        required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="session">Session <span class="text-danger">*</span></label>
                                    <input
                                        class="form-control session"
                                        id="session"
                                        type="text"
                                        name="session"
                                        placeholder="Enter session"
                                        required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="number-of-students">Number of Students <span class="text-danger">*</span></label>
                                    <input
                                        class="form-control number-of-students"
                                        id="number-of-students"
                                        type="text"
                                        name="number_of_students"
                                        placeholder="Enter number"
                                        required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="program-status">Status <span class="text-danger">*</span></label>
                                    <select name="status" required id="program-status" class="form-control">
                                        <option value=""></option>
                                        <option value="Public">Public</option>
                                        <option value="Dropped">Dropped</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="video">Video</label>
                                    <input
                                        class="form-control video"
                                        id="video"
                                        type="file"
                                        name="video_file"
                                        accept="video/*">
                                </div>
                                <div class="col-md-6">
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

           // Parse the JSON string to a JavaScript object
           // var jsonArray = JSON.parse(jsonString);

           // Output the JSON array to the console (you can do whatever you want with it)
           console.log(jsonString);
       })
    </script>
</x-app-layout>
