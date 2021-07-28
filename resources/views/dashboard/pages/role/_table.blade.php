<table class="table table-striped table-bordered table-hover dataTables-example" >
    <thead>
        @includeIf('dashboard.globals.table.table__header', [
            'tableHeaders' => [
                $translationFromKey ?? null => array_diff($roles['columns'] ?? [], [
                    'org_name', 'user_name'
                ]),
            ],
        ])
    </thead>
    <tbody>
        @foreach($roles['items'] ?? [] as $key => $role)
            <tr>
                <td>{{ ++$key }}</td>
                @foreach(array_diff($roles['columns'] ?? [], [
                     'created_by', 'organization_id'
                ]) as $dbColumns)
                    <td>
                        {{ $role->$dbColumns }}
                    </td>
                @endforeach
                <td>
                    <div class="btn-group btn-group-xs">
                        @if(in_array(($role->role_edit_btn ?? false), ['TRUE', 1], true))
                            <a
                                title="{{ $actions['edit'] .' '. $resource }}"
                                class="btn btn-primary btn-xs"
                                href="{{ route('setup.roles.edit', $role) }}"
                            >
                                <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                            </a>
                        @endif

                        @if(in_array(($role->role_delete_btn ?? false), ['TRUE', 1], true))
                            <form
                                class="role__delete"
                                method="POST"
                                action="{{ route('setup.roles.destroy', $role) }}"
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
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
