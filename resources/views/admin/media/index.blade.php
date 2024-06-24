<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Total Videos</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(['Videos']) !!}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid basic_table">
            <div class="row">
                <div class="col-sm-12">
                    <a class="btn btn-success mb-2 float-end" type="button" href="{{ route('medias.create') }}">Add
                        a Video</a>
                </div>
            </div>
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

                            @if (session('success') || session('danger'))
                                @php $className = (session('success')) ? 'success' : 'danger'; @endphp
                                @php $message = (session('success')) ? session('success') : session('danger'); @endphp
                                <div class="alert alert-{{ $className }}">
                                    {{ $message }}
                                </div>
                            @endif
                            <div class="table-responsive theme-scrollbar">
                                <table class="display" id="data-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Video</th>
                                            <th scope="col"><x-list-view-action-heading /></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($medias as $media)
                                            <tr class="border-bottom-secondary">
                                                <td>{{ $media->title }}</td>
                                                <td>
                                                    <video width="200" height="100" controls preload="none">
                                                        {{-- @if (Storage::exists($media->path)) --}}
                                                        <source src="{{ asset($media->path) }}" type="video/mp4">
                                                        {{-- <p>Your browser does not support the video element.</p>
                                                        @else
                                                            <p>Video not found.</p>
                                                        @endif --}}
                                                    </video>
                                                    <a href="{{ asset($media->path) }}" download>Download</a>
                                                </td>
                                                <td>
                                                    <ul class="action">
                                                        <li class="edit"><a
                                                                href="{{ route('medias.show', $media->id) }}"><i
                                                                    class="icofont icofont-eye-alt"></i></a></li>
                                                        <li class="delete">
                                                            <form method="POST"
                                                                action="{{ route('medias.destroy', $media->id) }}"
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
    </div>
</x-app-layout>
