<form
    action="{{ route('dashboard.setup.permissions_roles.store') }}"
    method="POST"
    id="permission_role_form"
    name="permission_role_form"
>
    @csrf
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Permissions</th>
                @foreach($roles as $role)
                    <th>
                        <small>
                            {{ $role }}
                        </small>
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission_id => $permission)
            <tr>
                <td>
                    <small>
                        {{ $permission }}
                    </small>
                </td>
                @foreach($roles as $role_id => $role)
                    <th>
                        <input
                            class="i-checks checkbox"
                            type="checkbox"
                            name="permissions_roles[{!! $permission_id !!}][{!! $role_id !!}]"
                            value="1"
                            {!! (in_array($permission_id.'-'.$role_id, $permissions_roles)) ? 'checked' : '' !!}
                        >
                    </th>
                @endforeach
            </tr>
        @endforeach
        <tr>
            <th colspan="{{ 1+count($roles ?? []) }}">
                <button
                    class="btn btn-block btn-primary"
                >
                    {{ trans('lang.actions.save') }}
                </button>
            </th>
        </tr>
        </tbody>
    </table>
</form>
