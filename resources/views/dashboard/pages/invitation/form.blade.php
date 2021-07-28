@extends('dashboard.layout.app')

@section('stylesheets')
    {{-- Select 2 CSS --}}
    <link href="{{ asset('backend-assets/css/plugins/select2/select2.min.css') }}" rel="stylesheet">
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
                        <h5>{{ $page }}</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">
                                @include('dashboard.globals.form.form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Select2 JS -->
    <script src="{{ asset('backend-assets/js/plugins/select2/select2.full.min.js') }}"></script>

    <script>
        // select2
        $(".select2").select2();
        $("#invited_as").select2({
            placeholder: "Inviting as ...",
            allowClear: false
        });
    </script>
@endsection
