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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(session('success') || session('danger'))
                                @php $className = (session('success')) ? 'success' : 'danger'; @endphp
                                @php $message = (session('success')) ? session('success') : session('danger'); @endphp
                                <div class="alert alert-{{ $className }}">
                                    {{ $message }}
                                </div>
                            @endif
                                @if(isset($template))
                                    <form action="{{ route('template.update', $template->id) }}" method="post">
                                    <input type="hidden" name="_method" value="PUT" id="route-method">
                                @else
                                    <form action="{{ route('template.store') }}" method="post">
                                @endif
                                @csrf
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Template For</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $template->subject }}</td>
                                            <td>{{ $template->template_for }}</td>
                                            <td>{{ $template->status }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <h1>Template:</h1><br>
                                        <textarea id="editor1" name="body" cols="30" rows="10">{{ old('body', $template->body ?? '') }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-12">
                                        <a href="{{ route('template.edit', $template->id) }}" class="btn btn-primary float-end">Edit</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
</x-app-layout>
