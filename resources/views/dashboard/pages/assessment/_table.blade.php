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
                    <div class="btn-group btn-group-xs">
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
