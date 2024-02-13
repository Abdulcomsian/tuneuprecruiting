<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Trashed Applications</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(["Trashed Applications"]) !!}
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
                            <x-alert />
                            <div class="table-responsive theme-scrollbar">
                                <table class="display" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>Submission Date</th>
                                            <th>Full Name</th>
                                            <th>Graduation Year</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>Program</th>
                                            <th>Status</th>
                                            <th><x-list-view-action-heading /></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($applies as $apply)
                                            <tr class="border-bottom-secondary">
                                                <td>{{ \Carbon\Carbon::parse($apply->created_at)->format('d-m-Y') }}</td>
                                                <th scope="row">{{ $apply->first_name . ' ' . $apply->last_name }}</th>
                                                <td>{{ $apply->graduation_year }}</td>
                                                <td>{{ $apply->country }}</td>
                                                <td>{{ $apply->state }}</td>
                                                <td>{{ $apply->program_name }}</td>
                                                <td>{{ $apply->status }}</td>
                                                <td>
                                                    <ul class="action">
                                                        <li class="edit" style="margin-right: 8px">
                                                            <a href="{{ url('/apply/restore/'. encrypt($apply->apply_id)) }}" title="Restore from trash">
                                                                <i class="icofont icofont-redo"></i>
                                                            </a>
                                                        </li>
                                                        <li class="edit" style="margin-right: 8px">
                                                            <a href="{{ url('/apply/view/'. encrypt($apply->apply_id)) }}" title="View">
                                                                <i class="icofont icofont-eye-alt"></i>
                                                            </a>
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
    </div>
</x-app-layout>
