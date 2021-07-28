<table class="table table-striped table-bordered table-hover dataTables-example" >
    <thead>
        <tr>
            <th>{{ trans('lang.dataTable.thead.sr_no') }}</th>
            <th>Patient</th>
            <th>Gender</th>
            <th>City</th>
            <th>Created By</th>
            <th>{{ trans('lang.dataTable.thead.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($patients ?? [] as $key => $patient)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $patient->full_name }}</td>
                <td>{{ ucfirst($patient->gender) }}</td>
                <td>{{ $patient->city }}</td>
                <td>{{ $patient->username }}</td>
                <td>
                    <div class="btn-group btn-group-xs">
                        <a
                            title="{{ $actions['view'] .' '. $resource }}"
                            class="btn btn-default btn-xs"
                            href="{{ route('dashboard.patients.show', $patient) }}"
                        >
                            <i class="fa fa-eye fa-fw" aria-hidden="true"></i>
                        </a>

                        {{--@if($crud['EDIT_MODULE']['can'] ?? false)
                            <a
                                title="{{ $actions['edit'] .' '. $resource }}"
                                class="btn btn-primary btn-xs"
                                href="{{ route('modules.edit', $patient) }}"
                            >
                                <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                            </a>
                        @endif--}}

                        @if($crud['DELETE_MODULE']['can'] ?? false)
                            <form
                                class="patient__delete"
                                method="POST"
                                action="{{ route('dashboard.patients.destroy', $patient) }}"
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
