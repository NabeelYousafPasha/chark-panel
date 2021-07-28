@extends('dashboard.layout.app')

@section('stylesheets')
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>{{ $page }}</h2>
            @includeIf('dashboard.globals.breadcrumb.breadcrumbs')
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>List of All {{ $page }}</h5>
                        <div class="ibox-tools">
                            @if(1)
                                <a
                                    title="{{ $actions['add'] .' '. $resource }}"
                                    class="btn btn-primary btn-xs"
                                    href="{{ $crud['create'] ?? 'javascript::void(0)' }}"
                                >
                                    <i class="fa-fw fa fa-plus"></i>
                                </a>
                            @endif
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            @includeIf('dashboard.pages.issue._table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- start modals --}}
    @includeIf($modalDelete, ['resource' => $resource ?? ''])
    {{-- end modals --}}
@endsection

@section('scripts')
    <script>
        {{-- ***************** datatable *************** --}}
        $(document).ready(function(){
            $('#table__issues').DataTable({
                pageLength: 10,
                responsive: true,
                scrollX: true,
                processing: true,
                serverSide: true,
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false },
                    { data: 'subject', name: 'issues.subject', searchable: false, orderable: false },
                    { data: 'description', name: 'issues.description', searchable: false, orderable: false },
                    { data: 'media', name: 'media', searchable: false, orderable: false },
                    { data: 'name', name: 'users.name', searchable: false, orderable: false },
                    { data: 'resolved_at', name: 'issues.resolved_at', searchable: false, orderable: false },
                    { data: 'created_at', name: 'issues.created_at', searchable: false, orderable: false },
                ],
                orderable: false,
            });

        });
    </script>
@endsection
