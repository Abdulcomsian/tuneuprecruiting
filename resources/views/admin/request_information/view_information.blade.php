<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Information</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(["Information"]) !!}
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>College/University</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $information->college_or_university ?? null }}</td>
                                        <td>{{ $information->university_name ?? null }}</td>
                                        <td>{{ $information->email ?? null }}</td>
                                        <td>{{ $information->info ?? null }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
