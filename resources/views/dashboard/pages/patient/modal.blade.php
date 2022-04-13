<div
    class="modal inmodal "
    id="modal__createPatient"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Terms & Agreements</h2>
            </div>
            <div class="modal-body">
                <p>
                    You are about to start registering a new patient on {{ config('app.name') }}. Please read the conditions,
                    data protection laws and accept the surrender of data for scientific purposes
                    <a
                        href="{{ route('terms-conditions') }}"
                        target="_blank"
                        class="btn-link"
                    >
                        <strong>here</strong>
                    </a>
                    , before continuing with the request.
                    <br>
                    <br>
                    Accepting means that you have read and accept
                    <a
                        href="{{ route('terms-conditions') }}"
                        target="_blank"
                        class="btn-link"
                    >
                        <strong>{{ config('app.name') }}’s usage conditions</strong>
                    </a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">I Disagree</button>
                <a
                    title="{{ $actions['add'] .' '. $resource }}"
                    href="{{ $crud['CREATE_PATIENT']['route'] ?? 'javascript::void(0)' }}"
                    class="btn btn-primary"
                >
                    I Agree
                </a>
            </div>
        </div>
    </div>
</div>
