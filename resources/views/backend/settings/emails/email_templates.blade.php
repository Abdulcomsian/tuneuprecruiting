<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Total Applications</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(["Total Applications"]) !!}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid basic_table">
            <div class="row mb-3">
                <div class="col-sm-12">
                    <a href="{{ route('template.create') }}" class="btn btn-primary float-end">Add new template</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive theme-scrollbar">
                                <table class="display" id="data-table">
                                    <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th><x-list-view-action-heading /></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($templates as $template)
                                        <tr class="border-bottom-secondary">
                                            <th scope="row">{{ $template->subject }}</th>
                                            <td>{{ $template->template_for }}</td>
                                            <td>{{ $template->status }}</td>
                                            <td>
                                                <ul class="action">
                                                    <li class="edit"><a href="{{ route('template.show', $template->id) }}"><i class="icofont icofont-eye-alt"></i></a></li>
                                                    <li class="edit"><a href="{{ route('template.edit', $template->id) }}"><i class="fa fa-pencil-square-o"></i></a></li>
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
