<table class="table table-striped table-bordered table-hover dataTables-example" >
    <thead>
        <tr>
            <th>{{ trans('lang.dataTable.thead.sr_no') }}</th>
            <th>Clinic</th>
            <th>Details</th>
            <th>Created By</th>
            <th>{{ trans('lang.dataTable.thead.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clinics ?? [] as $key => $clinic)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $clinic->name }}</td>
                <td>{{ $clinic->details }}</td>
                <td>{{ $clinic->created_by }}</td>
                <td>
                    <div class="btn-group btn-group-xs">
                        {{--<a
                            title="{{ $actions['view'] .' '. $resource }}"
                            class="btn btn-default btn-xs"
                            href="{{ route('dashboard.clinics.show', $clinic) }}"
                        >
                            <i class="fa fa-eye fa-fw" aria-hidden="true"></i>
                        </a>--}}

                        @if($crud['EDIT_CLINIC']['can'] ?? false)
                            <a
                                title="{{ $actions['edit'] .' '. $resource }}"
                                class="btn btn-primary btn-xs"
                                href="{{ route('dashboard.clinics.edit', $clinic) }}"
                            >
                                <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                            </a>
                        @endif

                        @if($crud['DELETE_CLINIC']['can'] ?? false)
                            <form
                                class="clinic__delete"
                                method="POST"
                                action="{{ route('dashboard.clinics.destroy', $clinic) }}"
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
