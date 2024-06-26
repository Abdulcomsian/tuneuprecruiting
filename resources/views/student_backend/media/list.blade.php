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
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 style="font-weight:bold;text-transform: capitalize;" class="card-title">
                                    {{ $media->title }}</h5>
                                <div>
                                    <video width="100%" controls preload="metadata" controlsList="nodownload">
                                        <source src="{{ asset($media->path) }}" type="video/mp4">
                                    </video><br>
                                    <div class="mt-2">
                                        <h5><a href="#" class="link-light"
                                                style="font-weight:bold;text-transform: capitalize;"
                                                onclick="openModal('{{ $media->id }}')">View Description</a></h5>
                                    </div>

                                </div>

                                <div class="modal fade" id="descriptionModal_{{ $media->id }}" tabindex="-1"
                                    aria-labelledby="descriptionModalLabel_{{ $media->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title" id="descriptionModalLabel_{{ $media->id }}">
                                                    <b>{{ $media->title }}</b>
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">X</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>{!! $media->description !!}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

        function openModal(mediaId) {
            var modalId = '#descriptionModal_' + mediaId;
            $(modalId).modal('show');
        }
    </script>
</x-app-layout>
