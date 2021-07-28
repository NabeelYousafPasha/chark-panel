<table class="table table-striped table-bordered table-hover dataTables-example" >
    <thead>
        @includeIf('dashboard.globals.table.table__header', [
            'tableHeaders' => [
                $translationFromKey ?? null => array_diff($tasks['columns'] ?? [], []),
            ],
        ])
    </thead>
    <tbody>
        @foreach($tasks['items'] ?? [] as $key => $task)
            <tr>
                <td>{{ ++$key }}</td>
                @foreach($tasks['columns'] ?? [] as $dbColumns)
                    <td>
                        {{ $task->$dbColumns }}
                    </td>
                @endforeach
                <td>
                    <div class="btn-group btn-group-xs">
                        <a
                            title="{{ $actions['edit'] .' '. $resource }}"
                            class="btn btn-primary btn-xs"
                            href="{{ route('tasks.edit', $task) }}"
                        >
                            <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                        </a>

                        <form
                            class="invitation__delete"
                            method="POST"
                            action="{{ route('tasks.destroy', $task) }}"
                            style="display: inline-block;"
                        >
                            @csrf
                            @method('DELETE')
                            <button
                                title="{{ $actions['delete'] .' '. $resource }}"
                                type ="submit"
                                class="btn btn-danger btn-xs"
                            >
                                <i class="fa fa-trash fa-fw" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
