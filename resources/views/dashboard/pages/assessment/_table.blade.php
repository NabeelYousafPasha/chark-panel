<table class="table table-striped table-bordered table-hover dataTables-example" >
    <thead>
        <tr>
            <th>{{ trans('lang.dataTable.thead.sr_no') }}</th>
            <th>Creation Date</th>
            <th>External Assessment</th>
            <th>Polygraph</th>
            <th>Polysomnography</th>
            <th>Created By</th>
            <th>Comments</th>
            <th>{{ trans('lang.dataTable.thead.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($patientAssessments ?? [] as $key => $patientAssessment)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $patientAssessment->created_at }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $patientAssessment->full_name }}</td>
                <td>
                    <div class="btn-group-xs">
                        <a
                            title="{{ $actions['add'] .' Comment' }}"
                            class="btn btn-success btn-xs"
                            href="{{ route('dashboard.comment.index', ['assessment' => $patientAssessment,]) }}"
                        >
                            <i class="fa fa-comment fa-fw" aria-hidden="true"></i>
                        </a>
                    </div>
                </td>
                <td>
                    <div class="button-group btn-group-xs">
                        <a
                            title="Show"
                            class="btn btn-default btn-xs"
                            href="{{ route('dashboard.assessment.show', ['assessment' => $patientAssessment,]) }}"
                        >
                            <i class="fa fa-eye fa-fw" aria-hidden="true"></i>
                        </a>

                        <a
                            title="{{ $actions['edit'] .' '. $resource }}"
                            class="btn btn-primary btn-xs"
                            href="{{ route('dashboard.assessment.edit.step', ['assessment' => $patientAssessment, 'step' => 'step1',]) }}"
                        >
                            <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
