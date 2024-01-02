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
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive theme-scrollbar">
                                <table class="display" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Graduation Year</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>Program</th>
                                            <th>Home Town</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($applies as $apply)
                                            <tr class="border-bottom-secondary">
                                                <th scope="row">{{ $apply->first_name . ' ' . $apply->last_name }}</th>
                                                <td>{{ $apply->graduation_year }}</td>
                                                <td>{{ $apply->country }}</td>
                                                <td>{{ $apply->state }}</td>
                                                <td>{{ $apply->program_name }}</td>
                                                <td>{{ $apply->home_town }}</td>
                                                <td>
                                                    @php $ratingName = 'apply_rating_'.date('his').rand(0,99999) @endphp
                                                    <x-bladewind.rating
                                                        rating="{{ $apply->rating ?? 0 }}"
                                                        name="{{ $ratingName }}"
                                                        onclick="saveRating('{{ $ratingName }}', {{ $apply->id }})"/>
                                                    <ul class="action">
                                                        <li class="edit" style="margin-right: 8px"> <a href="{{ url('apply/status/'.encrypt($apply->apply_id)) }}">
                                                                @if($apply->star == 'star')
                                                                    <i class="icofont icofont-heart-alt"></i></a>
                                                                @else
                                                                    <i class="fa fa-heart-o"></i>
                                                               @endif

                                                        </li>
                                                        <li class="edit" style="margin-right: 8px"> <a href="{{ route('chat', encrypt($apply->student_id)) }}">
                                                                @if($apply->talking == 'talking')
                                                                    <i class="icofont icofont-ui-text-chat"></i>
                                                                @else
                                                                    <i class="icofont icofont-chat"></i></a>
                                                            @endif
                                                        </li>
                                                        <li class="edit" style="margin-right: 8px"><a href="{{ url('/apply/view/'. encrypt($apply->apply_id)) }}"><i class="icofont icofont-eye-alt"></i></a></li>
                                                        <li class="delete">
                                                            <form method="POST" action="{{ route('apply.destroy', ['id' => encrypt($apply->apply_id)]) }}" onsubmit='return confirm("Are you sure?")'>
                                                                @csrf
                                                                @method('DELETE')
                                                                <a href="#" onclick="$(this).closest('form').submit();"><i class="fa fa-trash"></i></a>
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
    <script>
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
            console.log(formData);
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
