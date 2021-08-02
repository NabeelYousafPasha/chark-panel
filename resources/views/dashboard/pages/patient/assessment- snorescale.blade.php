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
                        <h5>New {{ $page }}</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="">
                                 <form action="" method="post">
                                    <div class="row">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            0 - Normal Breathing
                                        </label>
                                    </div>
                                    <div class="row">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            1 - Slightly heavy breathing
                                        </label>
                                    </div>
                                    <div class="row">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            2 - Heavy breathing
                                        </label>
                                    </div>
                                    <div class="row">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            3 - Very heavy breathing
                                        </label>
                                    </div>
                                    <div class="row">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            4 - Very slight snoring
                                        </label>
                                    </div>
                                    <div class="row">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            5 - Slight Snoring
                                        </label>
                                    </div>
                                    <div class="row">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            6 - Moderate snoring
                                        </label>
                                    </div>
                                    <div class="row">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            7 - Loud Snoring 
                                        </label>
                                    </div>
                                    <div class="row">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            8 - Very loud Snoring
                                        </label>
                                    </div>
                                    <div class="row">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            9 - Unbearable snoring
                                        </label>
                                    </div>
                                    <div class="row">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            10 - Unbearable
                                        </label>
                                    </div>
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

