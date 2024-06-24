<x-app-layout>
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6 ps-0">
                        <h3>Videos</h3>
                    </div>
                    <div class="col-sm-6 pe-0">
                        <ol class="breadcrumb">
                            {!! generateBreadcrumbs(['Programs']) !!}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                @foreach ($medias as $media)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $media->title }}</h5>
                                <td>
                                    <video width="100%" controls preload="metadata" controlsList="nodownload">
                                        @if (Storage::exists($media->path))
                                            <source src="{{ asset('storage/' . $media->path) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        @else
                                            <p>Video not found.</p>
                                        @endif
                                    </video>
                                    <div
                                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none;">
                                    </div>
                                </td>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());

        document.onkeydown = function(e) {
            if (e.key === 'F12' ||
                (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'J')) ||
                (e.ctrlKey && (e.key === 'U' || e.key === 'S'))) {
                return false;
            }
        };

        // Disables inspect element on reload
        (function() {
            function disableInspect() {
                document.body.style.pointerEvents = 'none';
            }

            function enableInspect() {
                document.body.style.pointerEvents = 'auto';
            }

            window.addEventListener('beforeunload', disableInspect);
            window.addEventListener('load', enableInspect);
        })();
    </script>
</x-app-layout>
