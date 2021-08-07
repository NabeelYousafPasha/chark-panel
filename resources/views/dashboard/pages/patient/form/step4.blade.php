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
        <div class="row" style="text-align: justify">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>New {{ $page }}</h5>
                    </div>
                    <div class="ibox-content">

                        @include('dashboard.pages.patient.form.progress', ['step' => 'step4',])

                        <!-- MultiStep Form -->
                        <div class="row">
                            <div class="col-md-12">
                                <form id="msform">
                                    <fieldset>
                                        <form action="">
                                            <div class="row">
                                            
                                                    <h2 class="fs-title">Upload document here</h2>
                                                    <div class="row" style="text-align: justify">
                                                        <div class="col-md-6">
                                                        <div class="">
                                                            <div class="row form-group">
                                                                <div class="col-md-6">
                                                                    <label
                                                                        for="polygraph"
                                                                        class="col-form-label text-md-left"
                                                                    >
                                                                        Polygraph:
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="m-r">
                                                                        <input type="file" name="polygraph" id="polygraph">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-6">
                                                                    <label
                                                                        for="polychemography"
                                                                        class="col-form-label text-md-left"
                                                                    >
                                                                        Polychemography:
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="m-r">
                                                                        <input type="file" name="polychemography" id="polychemography">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="row form-group">
                                                                <div class="col-md-6">
                                                                    <label
                                                                        for="iah"
                                                                        class="col-form-label text-md-left"
                                                                    >
                                                                        IAH:
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="m-r">
                                                                        <input type="text" name="iah" id="iah">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-6">
                                                                    <label
                                                                        for="ia"
                                                                        class="col-form-label text-md-left"
                                                                    >
                                                                        IA:
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="m-r">
                                                                        <input type="text" name="ia" id="ia">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-6">
                                                                    <label
                                                                        for="ih"
                                                                        class="col-form-label text-md-left"
                                                                    >
                                                                        IH:
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="m-r">
                                                                        <input type="text" name="ih" id="ih">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="row form-group">
                                                                <div class="col-md-6">
                                                                    <label
                                                                        for="sat_2_min"
                                                                        class="col-form-label text-md-left"
                                                                    >
                                                                        SAT 02min %:
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="m-r">
                                                                        <input type="text" name="sat_2_min" id="sat_2_min">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-6">
                                                                    <label
                                                                        for="ct90"
                                                                        class="col-form-label text-md-left"
                                                                    >
                                                                        CT 90%:
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="m-r">
                                                                        <input type="text" name="ct90" id="ct90">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row form-group">
                                                            <div class="col-md-6">
                                                                <label
                                                                    for="avg_duration_of_apnea"
                                                                    class="col-form-label text-md-left"
                                                                >
                                                                    Average duration of apnea (sec):
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="m-r">
                                                                    <input type="text" name="avg_duration_of_apnea" id="avg_duration_of_apnea">
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-6">
                                                                <label
                                                                    for="max_duration_of_apnea"
                                                                    class="col-form-label text-md-left"
                                                                >
                                                                Maximum duration of apnea(sec):
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="m-r">
                                                                    <input type="text" name="max_duration_of_apnea" id="max_duration_of_apnea">
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-md-6">
                                                                <label
                                                                    for="max_duration_of_apnea"
                                                                    class="col-form-label text-md-left"
                                                                >
                                                                Assessment Observation
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="m-r">
                                                                    <textarea name="assessments_observation" id="assessments_observation" cols="30" rows="10"></textarea>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        </div>

                                                        <div class="col-md-6 shadow">
                                                        <button class="btn btn-primary">I do not have previous assessment</button>
                                                        </div>
                                                    </div>
                                                    <input type="submit" name="submit" class="submit action-button" value="Submit"/>
                                                


                                                    </form>
                                                    
                                                    
                                                </fieldset>
                                            </div>
                                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



