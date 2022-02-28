<table class="table table-striped table-bordered table-hover dataTables-example">
    <thead>
        <tr>
            <th>{{ trans('lang.dataTable.thead.sr_no') }}</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Registerd At</th>
            <th>Verified At</th>
            <th>{{ trans('lang.dataTable.thead.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users ?? [] as $key => $user)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $user->full_name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach($user->roles ?? [] as $role)
                        <span class="badge badge-success">
                            {{ $role->name }}
                        </span>
                    @endforeach
                </td>
                <td>
                    {{ $user->created_at->format('d-M-Y') }}
                </td>
                <td>
                    {{ $user->email_verified_at ?? 'Not Verified' }}
                </td>

                <td>
                    <div class="btn-group btn-group-xs">
                        @if($forceChangePassword ?? false)
                            <a
                                title="{{ 'Force Change Password '. $resource }}"
                                class="btn btn-success btn-xs"
                                href="{{ route('users.password.update', ['forceChange' => 1 , 'user' => $user]) }}"
                            >
                                <i class="fa fa-user-secret fa-fw" aria-hidden="true"></i>
                            </a>
                        @endif
                    </div>

                    <div class="btn-group btn-group-xs">
                        @if($crud['EDIT_USER']['can'] ?? false)
                            <a
                                title="{{ $actions['edit'] .' '. $resource }}"
                                class="btn btn-primary btn-xs"
                                href="{{ route('dashboard.users.edit', $user) }}"
                            >
                                <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                            </a>
                        @endif

                        @if($crud['DELETE_USER']['can'] ?? false)
                            <form
                                class="user__delete"
                                method="POST"
                                action="{{ route('dashboard.users.destroy', $user) }}"
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
