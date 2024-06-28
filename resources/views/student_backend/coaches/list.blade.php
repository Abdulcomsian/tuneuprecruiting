<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Coaches</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(['Add new Coach']) !!}
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive theme-scrollbar">
                            <div class="d-flex justify-content-between mb-2">
                                <div id="data-table_filter" class="dataTables_filter">
                                    <label>
                                        University:
                                        <select id="university-filter" class="form-control form-control-sm mt-2"
                                            style="width: 190px;">
                                            <option value="">All</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">University/College Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function() {
            var table = $('.data-table').DataTable({
                "order": [
                    [0, "desc"]
                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('coach.list') }}",
                    data: function(d) {
                        var universityId = $('#university-filter').val();

                        if (universityId) {
                            d.university_id = universityId;
                        }
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'university',
                        name: 'university'
                    },
                ]
            });

            $('#university-filter').change(function() {
                table.draw();
            });

            table.draw();

            $.ajax({
                url: "{{ route('universities.list') }}",
                method: "GET",
                success: function(response) {
                    if (response.status) {
                        response.data.forEach(function(university) {
                            $('#university-filter').append('<option value="' + university.id +
                                '">' + university.name + '</option>');
                        });
                    }
                }
            });
        });
    </script>
</x-app-layout>
