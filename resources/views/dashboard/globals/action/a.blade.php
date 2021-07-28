<a
    title="{{ $action['title'] ?? config('constants.actions.defaults.title') }}"
    class="btn {{ $action['class'] ?? 'btn-default' }} btn-xs action-btn"
    href="{{ $action['route'] ?? config('constants.actions.defaults.a.href') }}"
>
    <i
        class="fa {{ $action['icon'] ?? config('constants.actions.defaults.icon') }} fa-fw"
        aria-hidden="true"
    >
    </i>
</a>
