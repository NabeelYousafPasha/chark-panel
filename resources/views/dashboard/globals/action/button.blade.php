<button
    type="{{ $action['type_details']['type'] ?? config('constants.actions.defaults.button.type') }}"
    title="{{ $action['title'] ?? config('constants.actions.defaults.title') }}"
    class="btn {{ $action['class'] ?? 'btn-default' }} btn-xs"
>
    <i
        class="fa {{ $action['icon'] ?? config('constants.actions.defaults.icon') }} fa-fw"
        aria-hidden="true"
    >
    </i>
</button>
