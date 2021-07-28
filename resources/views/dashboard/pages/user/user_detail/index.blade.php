@extends('dashboard.layout.app')

@section('stylesheets')
    <link href="{{ asset('backend-assets/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('backend-assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">
    <style type="text/css">
        .select2-container{
            width: 100% !important;
        }
    </style>
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
            <div class="col-md-12">
                <div class="ibox {{ (count($errors->all()) > 0) ? '' : 'collapsed' }}">
                    <div class="ibox-title">
                        <h5>Update Profile Details</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        @include('dashboard.globals.form.form')
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>
                            {{ $page }}
                        </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        @includeIf('dashboard.pages.user.user_detail._table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('backend-assets/js/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            // select2
            $("#country_id").select2({
                placeholder: "Select a Country",
                allowClear: true
            });

            // radio buttons
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

        });

    </script>
@endsection
