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
                        <h5>{{ config('app.name') }}</h5>
                        <div class="ibox-tools">
                            @if($crud['CREATE_PATIENT']['can'] ?? false)
                                <a
                                    data-toggle="modal"
                                    data-target="#modal__createPatient"
                                    class="btn btn-primary btn-xs"
                                    title="{{ $actions['add'] .' '. $resource }}"
                                >
                                    <i class="fa-fw fa fa-plus"></i>
                                    Add New Patient
                                </a>
                            @endif
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                        <div class="ibox-content">
                            <div class="jumbotron">
                                <h2>{{ config('app.name') }} User's Guide</h2>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <embed
                                            name="plugin"
                                            src="{{ asset('user-guide/V1.pdf') }}"
                                            type="application/pdf"
                                        >
                                        <br>
                                        <br>
                                        <a
                                            target="_blank"
                                            class="btn btn-primary"
                                            href="{{ asset('user-guide/V1.pdf') }}"
                                        >
                                            <i class="fa fa-download"></i>
                                            Download - Complete User Guide
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- start modals --}}
    @includeIf('dashboard.pages.patient.modal')
    {{-- end modals --}}
@endsection

@section('scripts')
@endsection
