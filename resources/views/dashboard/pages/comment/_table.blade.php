<table class="table table-striped table-bordered table-hover dataTables-example" >
    <thead>
        <tr>
            <th>{{ trans('lang.dataTable.thead.sr_no') }}</th>
            <th>Creation Date</th>
            <th>Comment</th>
            <th>Created By</th>
        </tr>
    </thead>
    <tbody>
        @foreach($comments ?? [] as $key => $comment)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $comment->created_at }}</td>
                <td>{{ $comment->comment }}</td>
                <td>{{ $comment->created_by }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
