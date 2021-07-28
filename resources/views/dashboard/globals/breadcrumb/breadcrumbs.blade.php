<ol class="breadcrumb">
    @foreach($breadcrumbs ?? [] as $breadcrumb)
        @php $lastActive = $breadcrumb['active'] ?? false; @endphp
        <li class="{{ ($lastActive) ? 'active' : '' }}">
            <a href="{{ $breadcrumb['route'] ?? 'javascript::void(0)' }}">
                @if($lastActive)
                    <strong>{{ $breadcrumb['name'] ?? '' }}</strong>
                @else
                    {{ $breadcrumb['name'] ?? '' }}
                @endif
            </a>
        </li>
    @endforeach
</ol>
