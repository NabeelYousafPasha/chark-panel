<table class="table table-striped table-bordered table-hover dataTables-example">
    <thead>
        <tr>
            <th>{{ trans('lang.dataTable.thead.sr_no') }}</th>
            <th>Name</th>
            <th>Email</th>
            <th>Organization</th>
            <th>Role</th>
            <th>Registerd At</th>
            <th>Modifications</th>
            <th>Supervisions</th>
            <th>{{ trans('lang.dataTable.thead.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users['items'] ?? [] as $key => $user)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->organization->name ?? '' }}</td>
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

                        @if($rolesSwitcher ?? false)
                            <button
                                title="{{ 'Change Role '. $resource }}"
                                data-toggle="dropdown"
                                class="btn btn-info btn-xs dropdown-toggle"
                                aria-expanded="false"
                            >
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                            @forelse($rolesToSwitch ?? [] as $role)
                                <li>
                                    <a
                                        href="{{ route('users.role.update', ['user' => $user, 'role' => $role]) }}"
                                    >
                                        {{ $role->name }}
                                    </a>
                                </li>
                            @empty
                                <li><a href={{ 'javascript::void(0)' }}>N/A</a></li>
                            @endforelse
                        </ul>
                        @endif
                    </div>
                </td>

                <td>
                    <div class="btn-group btn-group-xs">
                        @if($permission['supervision'] ?? false)
                            <a
                                title="Assign for Supervision"
                                class="btn btn-warning btn-xs"
                                href="{{ route('supervisions.create', [$user]) }}"
                            >
                                <i class="fa fa-random fa-fw"></i>
                            </a>
                        @endif
                    </div>
                </td>

                <td>
                    <div class="btn-group btn-group-xs">
                        {{--@if(! $user->hasRole(\App\Models\Role::ROLE_SUPER_ADMIN))
                        <a
                            title="{{ 'Switch to Admin' .' '. $resource }}"
                            class="btn btn-success btn-xs user__switch_to_admin"
                            href="{{ route('users.update.admin', ['user' => $user, 'switch=true']) }}"
                        >
                            <i class="fa fa-toggle-on fa-fw"></i>
                        </a>
                        @endif--}}


                        <a
                            title="{{ 'Profile' .' '. $resource }}"
                            class="btn btn-info btn-xs"
                            href="{{ route('users.profile', [$user]) }}"
                        >
                            <i class="fa fa-address-card-o fa-fw"></i>
                        </a>

                        @if(in_array(($user->user_edit_btn ?? false), ['TRUE', 1], true))
                            <a
                                title="{{ $actions['edit'] .' '. $resource }}"
                                class="btn btn-primary btn-xs"
                                href="{{ route('users.edit', $user) }}"
                            >
                                <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                            </a>
                        @endif

                        @if(in_array(($user->user_delete_btn ?? false), ['TRUE', 1], true))
                            <form
                                class="user__delete"
                                method="POST"
                                action="{{ route('users.destroy', $user) }}"
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
