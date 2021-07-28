<div
    class="modal inmodal "
    id="modal__global_delete"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">{{ trans('lang.actions.delete') }}</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete {{ $resource ?? '' }}?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button
                    type="button"
                    class="btn btn-danger"
                    id="delete__btn"
                >
                    {{ trans('lang.actions.delete') }}
                </button>
            </div>
        </div>
    </div>
</div>
