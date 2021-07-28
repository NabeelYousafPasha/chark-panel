<table class="table table-striped table-bordered table-hover dataTables-example" >
    <thead>
        <tr>
            <th>{{ trans('lang.dataTable.thead.sr_no') }}</th>
            <th>Title</th>
            <th>Type</th>
            <th>Description</th>
            <th>Preview</th>
            <th>Enable / Disable</th>
            <th>{{ trans('lang.dataTable.thead.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($notifications['items'] ?? [] as $key => $notification)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $notification->title }}</td>
                <td>{{ $notification->notification_type }}</td>
                <td>{{ $notification->description }}</td>
                <td>
                    <span class="badge badge-light">
                        {{ $notification->is_enabled ? 'Is Enabled' : 'Is Disabled' }}
                    </span>
                </td>
                <td>
                    <div class="btn-group btn-group-xs">
                            <form
                                method="POST"
                                action="{{ route('notifications.status', $notification) }}"
                                style="display: inline-block;"
                            >
                                @csrf
                                @method('PATCH')
                                <button
                                    title="{{ (! $notification->is_enabled) ? $actions['enable'] : $actions['disable'] }} {{ $resource }}"
                                    class="btn {{ (! $notification->is_enabled) ? 'btn-success' : 'btn-info' }} btn-xs"
                                    type ="submit"
                                >
                                    <i class="{{ (! $notification->is_enabled) ? 'fa fa-bell-o' : 'fa fa-bell-slash-o' }} fa-fw" aria-hidden="true"></i>
                                </button>
                            </form>
                    </div>
                </td>

                <td>
                    <div class="btn-group btn-group-xs">
                            <a
                                title="{{ $actions['edit'] .' '. $resource }}"
                                class="btn btn-primary btn-xs"
                                href="{{ route('notifications.edit', $notification) }}"
                            >
                                <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                            </a>

                            <form
                                class="notification__delete"
                                method="POST"
                                action="{{ route('notifications.destroy', $notification) }}"
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
