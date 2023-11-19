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
                            <form method="POST" id="frm-program" action="{{ route('program.apply', $program->id) }}" class="row g-3 needs-validation" novalidate="">
                                @csrf
                                <input type="hidden" name="program_id" value="{{ $program->id }}">
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom01">First Name</label>
                                    <input
                                        class="form-control program-name"
                                        id="validationCustom01"
                                        type="text"
                                        name="program_name"
                                        value="{{ $user->first_name }}"
                                        placeholder="Enter program name"
                                        required="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom02">Last Name</label>
                                    <input
                                        class="form-control session"
                                        id="validationCustom02"
                                        type="text"
                                        name="session"
                                        value="{{ $user->last_name }}"
                                        placeholder="Enter session"
                                        required="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom02">Graduation Year</label>
                                    <input
                                        class="form-control number-of-students"
                                        id="validationCustom02"
                                        type="text"
                                        name="number_of_students"
                                        value="{{ $user->graduation_year }}"
                                        placeholder="Enter number"
                                        required="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom02">Home Town</label>
                                    <input
                                        class="form-control number-of-students"
                                        id="validationCustom02"
                                        type="text"
                                        name="number_of_students"
                                        value="{{ $user->home_town }}"
                                        placeholder="Enter number"
                                        required="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom02">State</label>
                                    <input
                                        class="form-control number-of-students"
                                        id="validationCustom02"
                                        type="text"
                                        name="number_of_students"
                                        value="{{ $user->state }}"
                                        placeholder="Enter number"
                                        required="">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom02">Country</label>
                                    <input
                                        class="form-control number-of-students"
                                        id="validationCustom02"
                                        type="text"
                                        name="number_of_students"
                                        value="{{ $user->country }}"
                                        placeholder="Enter number"
                                        required="">
                                </div>

                                    @foreach($customFields as $field)
                                        <input type="hidden" name="label[]" value="{{ $field->label }}">
                                        <input type="hidden" name="type[]" value="{{ $field->type }}">
                                        <div class="col-md-4">
                                            <label class="form-label" for="validationCustom02">{{ $field->label }}</label>
                                            @if($field->type == 'select')
                                                @php $checkForMultiple = ($field->multiple) ? 'multiple' : ''; @endphp
                                                <select name="custom[]" id="" {{ $checkForMultiple  }} class="form-control">
                                                    @foreach($field->values as $value)
                                                        <option value="{{ $value->value }}">{{ $value->label }}</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <input name="custom[]" type="{{ $field->type }}" class="form-control">
                                            @endif
                                        </div>
                                    @endforeach

                                <div class="col-md-12">
                                    <button class="btn btn-primary float-end" id="btn-from-add" type="submit">Apply</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
