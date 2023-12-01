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
                            <li class="breadcrumb-item"><a href="index.html">
                                    <svg class="stroke-icon">
                                        <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Program</li>
                            <li class="breadcrumb-item">Add</li>
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
                            <form method="POST" id="frm-program" action="{{ route('program.update', $program->id) }}" class="row g-3 needs-validation" novalidate="" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="PUT" id="route-method">
                                <input type="hidden" name="custom_fields" id="custom-fields">
                                <input type="hidden" value="{{ route('program.store') }}" id="route-post-method">
                                <div class="col-md-3">
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
                                <div class="col-md-3">
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
                                <div class="col-md-3">
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
                                <div class="col-md-3">
                                    <label class="form-label" for="validationCustom02">Status</label>
                                    <select name="status" id="program-status" class="form-control">
                                        <option value="{{ $program->status }}">{{ ucfirst($program->status) }}</option>
                                        <option value=""></option>
                                        <option value="public">Public</option>
                                        <option value="drops">Drops</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom02">Video</label>
                                    <input
                                        class="form-control video"
                                        id="validationCustom02"
                                        type="file"
                                        name="video_file"
                                        accept="video/*">
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleFormControlInput1">Details</label>
                                        <textarea class="form-control detail" name="details">{{ $program->details }}</textarea>
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
        const fields = <?= $program->custom_fields ?>;
    </script>
</x-app-layout>
