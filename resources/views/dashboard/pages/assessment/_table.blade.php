<table class="table table-striped table-bordered table-hover dataTables-example" >
    <thead>
        <tr>
            <th>{{ trans('lang.dataTable.thead.sr_no') }}</th>
            <th>Creation Date</th>
            <th>External Assessment</th>
            <th>Polygraph</th>
            <th>Polysomnography</th>
            <th>Created By</th>
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
                <td>{{ $patientAssessment->created_by }}</td>
                <td> 
                    
                    <a
                        title="{{ $actions['edit'] .' '. $resource }}"
                        class="btn btn-primary btn-xs"
                        href="{{ route('dashboard.assessment.edit.step', [
                            'assessment' => $patientAssessment,
                            'step' => 'step1']) }}"
                    >
                        <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                    </a>
                    <a
                        class="btn btn-primary btn-xs"
                        href="{{ route('dashboard.comment.index', [
                            'assessment' => $patientAssessment,
                            'patient' => $patientAssessment->patient_id
                            ]) }}"
                    >
                        <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                    </a>
                    
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
