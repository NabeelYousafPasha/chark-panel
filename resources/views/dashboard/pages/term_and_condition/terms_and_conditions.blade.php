@extends('dashboard.layout.app')

@section('stylesheets')
    {{-- iCheck --}}
    <link href="{{ asset('backend-assets/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('backend-assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>{{ trans('lang.terms_and_conditions') }}</h2>
            @includeIf('dashboard.globals.breadcrumb.breadcrumbs')
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{ trans('lang.terms_and_conditions') }}</h5>
                        <div class="ibox-tools">
                            @if(0)
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
                    <div class="ibox-content text-center css-animation-box">
                        <form
                            class=""
                            action="{{ route('users.accpet.terms_conditions') }}"
                            method="POST"
                        >
                            @csrf
                            @method('PATCH')
                            <div class="">

                            </div>

                            <div class="form-group">
                                <label class="control-label">
                                    <input
                                        type="checkbox"
                                        class="i-checks checkbox"
                                        name="accept"
                                        value="1"
                                    >
                                    {{ 'I Agree and Accept Terms & Conditions' }}
                                </label>
                            </div>

                            <div class="form-group">
                                <button
                                    class="btn btn-sm btn-primary"
                                    type="submit"
                                >
                                    <i class="fa fa-check-circle fa-fw"></i>
                                    {{ trans('lang.actions.accept') }}
                                </button>
                            </div>
                        </form>
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
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
@endsection
