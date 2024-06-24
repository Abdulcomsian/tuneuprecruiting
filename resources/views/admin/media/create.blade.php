<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Add new Video</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(['Add new Video']) !!}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
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

                            @if (session('success') || session('danger'))
                                @php $className = (session('success')) ? 'success' : 'danger'; @endphp
                                @php $message = (session('success')) ? session('success') : session('danger'); @endphp
                                <div class="alert alert-{{ $className }}">
                                    {{ $message }}
                                </div>
                            @endif
                            <form method="POST" id="frm-media" action="{{ route('medias.store') }}" class="row g-3"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <x-dynamic-input id="videoTitle" type="text" name="title"
                                        value="{{ old('title') }}" placeholder="Video Title" required="true" />
                                </div>

                                <div class="col-md-6">
                                    <x-dynamic-input id="video" type="file" name="video"
                                        value="{{ old('video') }}" placeholder="Video" required="true" />
                                </div>

                                <!-- Video Preview -->
                                {{-- <div class="col-md-4">
                                    <video id="video-preview" width="320" height="240" controls
                                        style="display:none;">
                                        <source src="" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div> --}}

                                <div class="col-md-12">
                                    <button class="btn btn-primary float-end mt-3" id="btn-form-add"
                                        type="submit">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
