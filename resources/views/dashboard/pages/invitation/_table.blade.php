<table class="table table-striped table-bordered table-hover dataTables-example" >
    <thead>
        <tr>
            <th>{{ trans('lang.dataTable.thead.sr_no') }}</th>
            <th>Name</th>
            <th>Invitation To</th>
            <th>Invited As</th>
            <th>Link</th>
            <th>Accepted At</th>
            <th>Expired At</th>
            <th>{{ trans('lang.dataTable.thead.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($invitations['items'] ?? [] as $key => $invitation)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $invitation->name }}</td>
                <td>
                    <a href="mailto:{{ $invitation->email }}">
                        {{ $invitation->email }}
                    </a>
                </td>
                <td>{{ $invitation->name }}</td>
                <td>
                    <samp>{{ $invitation->getRegistrationLink() }}</samp>
                </td>
                <td>
                    {{ is_null($invitation->accepted_at) ? '' : $invitation->accepted_at->diffForHumans() }}
                </td>
                <td>
                     N/A
                </td>
                <td>
                    <div class="btn-group btn-group-xs">
                        N/A
{{--                        <a--}}
{{--                            title="{{ $actions['edit'] .' '. $resource }}"--}}
{{--                            class="btn btn-primary btn-xs"--}}
{{--                            href="{{ route('invitations.edit', $invitation) }}"--}}
{{--                        >--}}
{{--                            <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>--}}
{{--                        </a>--}}

{{--                        <form--}}
{{--                            class="invitation__delete"--}}
{{--                            method="POST"--}}
{{--                            action="{{ route('invitations.destroy', $invitation) }}"--}}
{{--                            style="display: inline-block;"--}}
{{--                        >--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <button--}}
{{--                                title="{{ $actions['delete'] .' '. $resource }}"--}}
{{--                                type ="submit"--}}
{{--                                class="btn btn-danger btn-xs"--}}
{{--                            >--}}
{{--                                <i class="fa fa-trash fa-fw" aria-hidden="true"></i>--}}
{{--                            </button>--}}
{{--                        </form>--}}
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
