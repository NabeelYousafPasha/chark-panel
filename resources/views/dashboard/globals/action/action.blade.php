<div style="display:block">
    @forelse($params ?? [] as $paramKey => $actions)
        <div
            class="btn-group btn-group-xs action-buttons"
        >
            @if($actions['title'] ?? false)
                <a
                    title="{{ $actions['title'] }}"
                    href="{{ config('constants.actions.defaults.a.href') }}"
                    class="btn btn-link btn-sm"
                >
                        {{ $actions['title'] }}
                </a>
            @endif

            @foreach($actions['functions'] ?? [] as $actionKey => $action)

                {{-- check Permissions to render --}}
                @if(($action['can'] ?? false) == false)
                    @continue
                @endif

                {{-- check what to render: a, form --}}
                @if(($actions['functions'][$actionKey]['type'] ?? '') != config('constants.actions.types.a'))
                    @includeIf('dashboard.globals.action.form', ['action' => $action])
                @else
                    @includeIf('dashboard.globals.action.a', ['action' => $action])
                @endif
            @endforeach

            {{-- if not last iteration then add Span --}}
            @if(! $loop->last)
                <span>&emsp; &emsp;</span>
            @endif
        </div>
    @empty
        <div>No Permissions to perform any action.</div>
    @endforelse
</div>
