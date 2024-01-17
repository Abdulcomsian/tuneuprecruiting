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
                            <form action="{{ route('report.recruiter') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="from-date">From Date</label>
                                        <input type="date" id="from-date" value="{{ $from_date ?? '' }}" name="from_date" class="bw-input">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="to-date">To Date</label>
                                        <input type="date" id="to-date" value="{{ $to_date ?? '' }}" name="to_date" class="bw-input">
                                    </div>
                                    <div class="col-sm-3">
                                        @component('components.select-list', [
                                            'options' => range(1, 5),
                                            'selected' => $rating ?? '',
                                            'name' => 'rating',
                                            'id' => 'rating',
                                            'inputClass' => 'bw-raw-select',
                                            'label' => 'Rating',
                                            'arrayKey' => false
                                            ])
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-3">
                                        @component('components.select-list', [
                                            'options' => range(2000, date('Y')),
                                            'selected' => $graduation_year ?? '',
                                            'name' => 'graduation_year',
                                            'id' => 'graduation-year',
                                            'inputClass' => 'bw-raw-select',
                                            'arrayKey' => false,
                                            'label' => 'Graduation Year'
                                            ])
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-3 mt-3">
                                        @component('components.select-type-of-object-array', [
                                                'options' => $countries,
                                                'selected' => $country ?? '',
                                                'name' => 'country',
                                                'id' => 'country',
                                                'label' => 'Country',
                                            ])
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-3 mt-3">
                                        <x-dynamic-input
                                            id="state"
                                            name="state"
                                            value="{{ $state ?? '' }}"
                                            type="text"
                                            placeholder="State/Province" />
                                    </div>
                                    <div class="col-sm-3 mt-3">
                                        @component('components.select-list', [
                                                'name' => 'are_u_from_usa',
                                                'options' => ['Yes', 'No'],
                                                'selected' => ucfirst($are_u_from_usa ?? ''),
                                                'label' => ' Outside of the United States',
                                                'id' => 'are-u-from-usa',
                                                'arrayKey' => false
                                            ])
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-3 mt-3">
                                        <x-dynamic-input
                                            id="act-reading"
                                            name="act_reading"
                                            value="{{ $act_total ?? '' }}"
                                            placeholder="ACT Total"
                                            type="text" />
                                    </div>
                                    <div class="col-sm-3 mt-3">
                                        <x-dynamic-input
                                            id="sat-total"
                                            name="sat_total"
                                            value="{{ $sat_total ?? '' }}"
                                            placeholder="SAT Total"
                                            type="text" />
                                    </div>
                                    <div class="col-sm-3 mt-3">
                                        @component('components.select-list', [
                                            'options' => ['star' => 'Yes', 'null' => 'No'],
                                            'selected' => $favourite ?? '',
                                            'name' => 'favourite',
                                            'id' => 'favourite',
                                            'inputClass' => 'bw-raw-select',
                                            'label' => 'Favourite'
                                            ])
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-3 mt-3">
                                        @component('components.select-list', [
                                            'options' => range(2000, 2030),
                                            'selected' => $student_session ?? '',
                                            'name' => 'student_session',
                                            'id' => 'student-session',
                                            'inputClass' => 'bw-raw-select',
                                            'arrayKey' => false,
                                            'label' => 'Session'
                                            ])
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-3 mt-3">
                                        @component('components.select-list', [
                                            'options' => ['my_application' => 'My application', 'other' => 'Other'],
                                            'selected' => $applications ?? 'my_application',
                                            'name' => 'applications',
                                            'id' => 'applications',
                                            'inputClass' => 'bw-raw-select',
                                            'label' => 'Applications'
                                            ])
                                        @endcomponent
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
                                <table class="display" id="data-table">
                                    <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Graduation Year</th>
                                        <th>Country</th>
                                        <th>State</th>
                                        <th>Program</th>
                                        <th><x-list-view-action-heading /></th>
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
                                            <td>
                                                @if(isset($applications) && $applications != 'other')
                                                    @php $ratingName = 'apply_rating_'.date('his').rand(0,99999) @endphp
                                                    <x-bladewind.rating
                                                        rating="{{ $apply->rating ?? 1 }}"
                                                        name="{{ $ratingName }}"
                                                        onclick="saveRating('{{ $ratingName }}', {{ $apply->id }})"/>
                                                @endif
                                                <ul class="action">
                                                    @if(isset($applications) && $applications != 'other')
                                                        <li class="edit" style="margin-right: 8px"> <a href="{{ url('apply/status/'.encrypt($apply->id)) }}">
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
                                                        <li class="delete" style="margin-right: 8px">
                                                            <form method="POST" action="{{ route('apply.destroy', ['id' => encrypt($apply->id)]) }}" onsubmit='return confirm("Are you sure?")'>
                                                                @csrf
                                                                @method('DELETE')
                                                                <a href="#" onclick="$(this).closest('form').submit();"><i class="fa fa-trash"></i></a>
                                                            </form>
                                                        </li>
                                                        <li class="edit"><a href="{{ url('/apply/view/'. encrypt($apply->id)) }}"><i class="icofont icofont-eye-alt"></i></a></li>
                                                    @endif
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
