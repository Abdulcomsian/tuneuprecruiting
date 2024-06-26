<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Update Video</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(['Update Video']) !!}
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
                            <form method="POST" action="{{ route('medias.update', $media->id) }}" class="row g-3"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="col-md-5">
                                    <x-dynamic-input id="videoTitle" type="text" name="title"
                                        value="{{ old('title', $media->title) }}" placeholder="Video Title"
                                        required="true" />
                                </div>

                                <div class="col-md-5">
                                    <x-dynamic-input id="video" type="file" name="video" placeholder="Video"
                                        onchange="previewVideo(event)" />
                                    <small class="text-muted">Leave empty if you don't want to change the video</small>
                                </div>
                                <div class="col-md-2">
                                    <video id="videoPreview" width="250" height="100" controls preload="metadata">
                                        @if ($media->path)
                                            <source src="{{ asset($media->path) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        @else
                                            <p>Video not found.</p>
                                        @endif
                                    </video>
                                </div>
                                {{-- <div class="col-md-12">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" rows="10" cols="80">{{ old('description', $media->description) }}</textarea>
                                </div> --}}
                                <div class="col-md-12">
                                    @component('components.input-textarea', [
                                        'name' => 'description',
                                        'id' => 'description',
                                        'className' => 'bw-textarea',
                                        'value' => old('description', $media->description),
                                        'required' => true,
                                        'label' => 'Description',
                                        'inputLabel' => true,
                                    ])
                                    @endcomponent
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary float-end mt-3" type="submit">Update</button>
                                    <a href="{{ route('medias.show', $media->id) }}"
                                        class="btn btn-secondary mt-3">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Video.js CSS and JavaScript -->
    <link href="https://vjs.zencdn.net/7.15.4/video-js.css" rel="stylesheet" />
    <script src="https://vjs.zencdn.net/7.15.4/video.min.js"></script>

    <script>
        function previewVideo(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const videoPreview = document.getElementById('videoPreview_html5_api');
                videoPreview.src = e.target.result;
                videojs(videoPreview).load(); // Reload the video player with the new source
            };

            reader.readAsDataURL(file);
        }
    </script>
</x-app-layout>
