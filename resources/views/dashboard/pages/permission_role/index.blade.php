@extends('dashboard.layout.app')

@section('stylesheets')
    {{-- iCheck --}}
    <link href="{{ asset('backend-assets/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('backend-assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">
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
                            @includeIf('dashboard.pages.permission_role._table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- iCheck -->
    <script src="{{ asset('backend-assets/js/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
@endsection
