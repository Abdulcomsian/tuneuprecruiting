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
                                                    @php $ratingName = 'apply_rating_'.date('his').rand(0,99999) @endphp
                                                    <x-bladewind.rating
                                                        rating="{{ $apply->rating ?? 1 }}"
                                                        name="{{ $ratingName }}"
                                                        onclick="saveRating('{{ $ratingName }}', {{ $apply->id }})"/>
                                                    <ul class="action">
                                                        <li class="edit" style="margin-right: 8px">
                                                            <a href="{{ url('apply/status/'.encrypt($apply->apply_id)) }}" title="Favourite">
                                                                @if($apply->star == 'star')
                                                                    <i class="icofont icofont-heart-alt"></i>
                                                            </a>
                                                                @else
                                                                    <i class="fa fa-heart-o"></i>
                                                               @endif

                                                        </li>
                                                        <li class="edit" style="margin-right: 8px">
                                                            <a href="{{ route('chat', encrypt($apply->student_id)) }}" title="Chat">
                                                                @if($apply->talking == 'talking')
                                                                    <i class="icofont icofont-ui-text-chat"></i>
                                                                @else
                                                                    <i class="icofont icofont-chat"></i>
                                                            </a>
                                                            @endif
                                                        </li>
                                                        <li class="edit" style="margin-right: 8px">
                                                            <a href="{{ url('/apply/view/'. encrypt($apply->apply_id)) }}" title="View">
                                                                <i class="icofont icofont-eye-alt"></i>
                                                            </a>
                                                        </li>
                                                        <li class="edit">
                                                            <a href="{{ route('program.apply.accept', encrypt($apply->apply_id)) }}" title="Accept">
                                                                <i class="icofont icofont-file-document"></i>
                                                            </a>
                                                        </li>
                                                        <li class="delete">
                                                            <form method="POST" action="{{ route('apply.destroy', ['id' => encrypt($apply->apply_id)]) }}" onsubmit='return confirm("Are you sure?")'>
                                                                @csrf
                                                                @method('DELETE')
                                                                <a href="#" onclick="$(this).closest('form').submit();" title="Delete">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
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
