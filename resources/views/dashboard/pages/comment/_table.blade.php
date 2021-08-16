<table class="table table-striped table-bordered table-hover dataTables-example" >
    <thead>
        <tr>
            <th>{{ trans('lang.dataTable.thead.sr_no') }}</th>
            <th>Creation Date</th>
            <th>Patient Name</th>
            <th>Assessment No. </th>
            <th>Comment</th>
            <th>Created By</th>
            <th>{{ trans('lang.dataTable.thead.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($comments ?? [] as $key => $comment)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $comment->created_at }}</td>
                <td>{{$comment->patient->alias}}</td>
                <td>{{$comment->assessment_id}}</td>
                <td>{{$comment->comment}}</td>
                <td>{{ $comment->created_by }}</td>
                <td> 
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
