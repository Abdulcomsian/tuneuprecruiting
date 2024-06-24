<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Total Recruiters</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(['Total Recruiters']) !!}
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
                            <div class="table-responsive theme-scrollbar">
                                <table class="display" id="data-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">University/College Name</th>
                                            <th scope="col">Program Type</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Website</th>
                                            <th scope="col">About</th>
                                            <th scope="col">Email</th>
                                            <th scope="col"><x-list-view-action-heading /></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr class="border-bottom-secondary">
                                                <td>{{ $user->college_or_university }}</td>
                                                <td>{{ $user->program_type }}</td>
                                                <td>{{ $user->first_name }}</td>
                                                <td>{{ $user->last_name }}</td>
                                                <td>{{ $user->website }}</td>
                                                <td>{{ $user->about_me }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <ul class="action">
                                                        <li class="delete">
                                                            <form method="POST"
                                                                action="{{ route('recuriter.destroy', $user->id) }}"
                                                                onsubmit='return confirm("Are you sure?")'>
                                                                @csrf
                                                                @method('DELETE')
                                                                <a href="#"
                                                                    onclick="$(this).closest('form').submit();"><i
                                                                        class="fa fa-trash"></i></a>
                                                            </form>
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
