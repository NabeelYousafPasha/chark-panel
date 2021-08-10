<form
    id="{{ $form['id'] ?? '' }}"
    name="{{ $form['name'] ?? '' }}"
    method="{{ $form['method'] ?? '' }}"
    action="{{ $form['action'] ?? 'javascript::void(0)' }}"
    @if ($form['enctype'] ?? false)
        enctype="multipart/form-data"
    @endif
    autocomplete="off"
>
    @csrf
    @method($form['_method'] ?? '')

    {{-- FORM BODY --}}
    @includeIf($form['include_view'] ?? null)

    @if($submit_button['display'] ?? true)
        <div class="form-group text-right m-r">
            <button
                type="submit"
                class="btn btn-primary"
            >
                {{ $form['crud_action'] ?? trans('lang.actions.save') }}
            </button>
        </div>
    @endif
</form>
