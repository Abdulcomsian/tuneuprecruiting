<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Application Details</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">
                                    <svg class="stroke-icon">
                                        <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                    </svg></a></li>
                            <li class="breadcrumb-item">Applies</li>
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
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>Question</th>
                                            <th>Answer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($applyDetails as $detail)
                                            @if($detail->type == 'checkbox-group')
                                                @php
                                                    $values = json_decode($detail->answer);
                                                    $detail->answer = '';
                                                    foreach ($values as $value) {
                                                        $detail->answer .= ucfirst($value) . ", ";
                                                    }
                                                @endphp
                                            @endif
                                            <tr class="border-bottom-secondary">
                                                <td>{{ $detail->label }}</td>
                                                <td>
                                                    @if($detail->type == 'file')
                                                        <a href="{{ asset('uploads/apply_data/'.$detail->answer) }}">{{ $detail->answer }}</a>
                                                    @else
                                                        {{ $detail->answer }}
                                                    @endif
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
