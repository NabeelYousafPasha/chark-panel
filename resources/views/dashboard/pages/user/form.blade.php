@extends('dashboard.layout.app')

@section('stylesheets')
    <style>
        .show_hide__password{
            cursor: pointer;
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

<script>
    $(document).ready(function () {
        // select2
        $("#organization_id").select2({
            placeholder: "Select an Organization",
            allowClear: true
        });

        $(".show_hide__password").on('click', function () {
            let icon = $(this).children('i');
            let input = $(this).siblings(':input');
            let inputType = input.attr('type');
            // toggle type of input and icon
            switch (inputType) {
                case 'password':
                    input.attr('type', 'text');
                    icon.attr('class', 'fa-fw fa fa-eye');
                    break;
                case 'text':
                    input.attr('type', 'password');
                    icon.attr('class', 'fa-fw fa fa-eye-slash');
                    break;
                default:
                    input.attr('type', 'password');
                    icon.attr('class', 'fa-fw fa fa-eye-slash');
                    break;
            }
        });

    });
</script>
@endsection
