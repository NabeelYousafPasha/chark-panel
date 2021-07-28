<table class="table table-striped table-bordered table-hover dataTables-example" >
    <thead>
        <tr>
            <th>{{ trans('lang.dataTable.thead.sr_no') }}</th>
            <th>Activity</th>
            <th>User</th>
            <th>Previous Values</th>
            <th>Updated Values</th>
            <th>URL</th>
            <th>Model</th>
            <th>Activity At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($activities as $key => $activity)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $activity->event }}</td>
                <td>{{ $activity->name }}</td>
                <td>{{ $activity->old_values }}</td>
                <td>{{ $activity->new_values }}</td>
                <td>{{ $activity->url }}</td>
                <td>{{ $activity->auditable_type }}</td>
                <td>{{ $activity->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
