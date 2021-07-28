<table
    class="table table-striped table-bordered table-hover dataTables-example"
    id="table__issues"
    width="100%"
>
    <thead>
        <tr>
            <th>{{ trans('lang.dataTable.thead.sr_no') }}</th>
            <th>{{ trans($translationFromKey.'.subject') }}</th>
            <th>{{ trans($translationFromKey.'.description') }}</th>
            <th>{{ trans('lang.file.attached') }}</th>
            <th>{{ trans($translationFromKey.'.user_id') }}</th>
            <th>{{ trans($translationFromKey.'.resolved_at') }}</th>
            <th>{{ trans($translationFromKey.'.created_at') }}</th>
        </tr>
    </thead>
</table>
