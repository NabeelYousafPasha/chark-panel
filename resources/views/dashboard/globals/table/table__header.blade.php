<tr>
    <th>{{ trans('lang.dataTable.thead.sr_no') }}</th>
    @isset($tableHeaders)
        @foreach($tableHeaders as $translationFromKey => $columns)
            @foreach($columns as $column)
                <th>
                    {{ !is_null($translationFromKey) ? trans($translationFromKey.'.'.$column) : $column }}
                </th>
            @endforeach
        @endforeach
    @endisset
    <th>{{ trans('lang.dataTable.thead.actions') }}</th>
</tr>
