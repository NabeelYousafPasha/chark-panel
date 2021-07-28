<form
    class="{{ $action['type_details']['class'] ?? '' }}"
    method="{{ $action['type_details']['method'] ?? '' }}"
    action="{{ $action['route'] ?? config('constants.actions.defaults.a.href') }}"
    style="display: inline-block;"
>
    @csrf
    @if($action['type_details']['_method'] ?? false)
        @method($action['type_details']['_method'])
    @endif
    @includeIf('dashboard.globals.action.button')
</form>
