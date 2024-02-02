@props(['idName' => 'modal-small'])
<!-- Modal -->
<div class="modal fade" id="{{ $idName }}" tabindex="-1" role="dialog" aria-labelledby="{{ $idName }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-toggle-wrapper" id="data-container">

                    <button class="btn bg-primary d-flex align-items-center gap-2 text-light ms-auto" type="button" data-bs-dismiss="modal">Explore More<i data-feather="arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
