<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>{{ $program->program_name }} Applications</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(["Program", "Applications"]) !!}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid basic_table">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>Program</h3>
                        </div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive theme-scrollbar">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Program Name</td>
                                                <td>{{ $program->program_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Number of Students</td>
                                                <td>{{ $program->number_of_students }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>Questions</h3>
                        </div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive theme-scrollbar">
                                    @if($questions)
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Question</th>
                                                <th scope="col">Type</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($questions as $question)
                                                <tr>
                                                    <td>{{ $question->label }}</td>
                                                    <td>{{ $question->type }}</td>
                                                </tr>
                                            @empty
                                                <p>No items found.</p>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    @else
                                        <p class="m-3">No Question or custom fields.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                        <th>Home Town</th>
                                        <th>State</th>
                                        <th><x-list-view-action-heading /></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($applies as $apply)
                                        <tr class="border-bottom-secondary">
                                            <th scope="row">{{ $apply->student->first_name . $apply->student->last_name }}</th>
                                            <td>{{ $apply->student->graduation_year }}</td>
                                            <td>{{ $apply->student->country }}</td>
                                            <td>{{ $apply->student->home_town }}</td>
                                            <td>{{ $apply->student->state }}</td>
                                            <td>
                                                @php $ratingName = 'apply_rating_'.$apply->apply_id @endphp
                                                <x-bladewind.rating
                                                    rating="{{ $apply->rating ?? 1 }}"
                                                    name="{{ $ratingName }}"
                                                    onclick="saveRating('{{ $ratingName }}', {{ $apply->apply_id }})"/>
                                                <ul class="action">
                                                    <x-apply-action-buttons :apply="$apply" />
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
