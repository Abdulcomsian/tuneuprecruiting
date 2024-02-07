<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Recruiter Report</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(["Report"]) !!}
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
                            <form action="{{ route('report.application') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="date-range">Date Range</label>
                                        <input type="text" style="width: 400px" name="date_range" id="reservationtime" class="form-control" value="{{ $fromDate }} - {{ $toDate }}"  class="span4"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 mt-4">
                                        <input type="submit" class="btn btn-success float-end" value="Filter">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive theme-scrollbar">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Total applications Submitted</th>
                                        <th>Submissions within the United States</th>
                                        <th>Submissions outside of the United States</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $numberOfApplies }}</td>
                                            <td>{{ $numberOfUSAApplies }}</td>
                                            <td>{{ $numberOfOutOfUSAApplies }}</td>
                                        </tr>
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
    <script>
        $(document).ready(function() {
            $('#reservationtime').daterangepicker({
                timePickerIncrement: 30,
                format: 'DD/MM/YYYY'
            }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });
        saveRating = function(element, applyId) {

            // element here is the corresponding rating component.
            // dom_el() is a helper function in BladewindUI
            // access the value of the element

            let element_value = dom_el(`.rating-value-${element}`).value;
            var baseUrl = "{{ url('/') }}";
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            var formData = {
                rating: element_value,
                applyId: applyId,
                _token: csrfToken
            }

            $.ajax({
                type: "POST",
                url: baseUrl+"/apply/rating",
                data: formData,
                dataType: "json",
                success: function(response){
                    // Handle the successful response here
                    console.log(response);
                },
                error: function(error){
                    // Handle errors here
                    console.log(error);
                }
            });

            // now that you have the rating value you can save it
            // maybe via an ajax call.. completely up to you
            // ajaxCall(
            //     'post',
            //     '/article/rating/save',
            //     `rating=${element_value}`
            // );
        }
    </script>
</x-app-layout>
