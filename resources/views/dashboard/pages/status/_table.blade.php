<table class="table table-striped table-bordered table-hover dataTables-example" >
    <thead>
        @includeIf('dashboard.globals.table.table__header', [
            'tableHeaders' => [
                $translationFromKey ?? null => array_diff($statuses['columns'] ?? [], []),
            ],
        ])
    </thead>
    <tbody>
        @foreach($statuses['items'] ?? [] as $key => $status)
            <tr>
                <td>{{ ++$key }}</td>
                @foreach($statuses['columns'] ?? [] as $dbColumns)
                    <td>
                        {{ $status->$dbColumns }}
                    </td>
                @endforeach
                <td>
                    <div class="btn-group btn-group-xs">
                        <button type="button" class="btn">N/A</button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
