<table class="table table-striped table-bordered table-hover dataTables-example" >
    <thead>
        <tr>
            <th>{{ trans('lang.dataTable.thead.sr_no') }}</th>
            <th>Patient ID / Alias</th>
            <th>Gender</th>
            <th>DOB / Age</th>
            <th>Clinic</th>
            <th>Country</th>
            <th>Created By</th>
            <th>Assessments</th>
            <th>{{ trans('lang.dataTable.thead.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($patients ?? [] as $key => $patient)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $patient->alias }}</td>
                <td>{{ ucfirst($patient->gender) }}</td>
                <td>{{ $patient->dob }} <span class="badge">{{ $patient->age_via_dob->format('%y years') }}</span></td>
                <td>{{ $patient->clinic_name }}</td>
                <td>{{ $patient->country_name }}</td>
                <td>{{ $patient->username }}</td>
                <td>
                    <div class="btn-group btn-group-xs">
                        <a
                            title="Assessment"
                            class="btn btn-info btn-xs"
                            href="{{ route('dashboard.assessment.index', ['patient' => $patient]) }}"
                        >
                            <i class="fa fa-commenting-o fa-fw" aria-hidden="true"></i>
                        </a>
                    </div>
                </td>
                <td>
                    <div class="btn-group btn-group-xs">
                        <a
                            title="{{ $actions['view'] .' '. $resource }}"
                            class="btn btn-default btn-xs"
                            href="{{ route('dashboard.patients.show', $patient) }}"
                        >
                            <i class="fa fa-eye fa-fw" aria-hidden="true"></i>
                        </a>
                        
                        <a
                            title="Patient Details"
                            class="btn btn-success btn-xs"
                            href="{{ route('dashboard.patient-details.create', $patient) }}"
                        >
                            <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                        </a>

                        @if($crud['EDIT_PATIENT']['can'] ?? false)
                            <a
                                title="{{ $actions['edit'] .' '. $resource }}"
                                class="btn btn-primary btn-xs"
                                href="{{ route('dashboard.patients.edit', ['patient' => $patient]) }}"
                            >
                                <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                            </a>
                        @endif

                        @if($crud['DELETE_PATIENT']['can'] ?? false)
                            <form
                                class="patient__delete"
                                method="POST"
                                action="{{ route('dashboard.patients.destroy', ['patient' => $patient]) }}"
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
