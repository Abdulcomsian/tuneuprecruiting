<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Apply Requirements</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(["Apply", "Apply Requirements"]) !!}
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
                            <x-form-errors-alert :errors="$errors" />
                            <x-alert />
                            @if($additionalRequirements > 0)
                                <div class="alert alert-info">
                                    Submission of requirements is complete.
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="{{ route('program.apply.view', encrypt($apply_id)) }}" class="btn btn-primary float-end">View</a>
                                    </div>
                                </div>
                            @else
                                <form method="post" action="{{ route('requirements.submit') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="requirement_id" value="{{ $requirements->id }}">
                                    <input type="hidden" name="apply_id" value="{{ $apply_id }}">
                                    <x-custom-fields :customFields=$customFields />
                                    <div class="col-md-12">
                                        <button class="btn btn-primary float-end mt-3" id="btn-from-add" type="submit">Submit</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
