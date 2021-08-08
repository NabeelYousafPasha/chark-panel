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

                        @include('dashboard.pages.assessment.form.progress', ['step' => 'step4',])

                        <div class="row">
                            <div class="col-md-12">

                                <form action="">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h2>Upload document here</h2>
                                            <br>

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
                                                    <input
                                                        type="file"
                                                        name="polygraph"
                                                        id="polygraph"
                                                        class="form-control"
                                                    >
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
                                                    <input
                                                        type="file"
                                                        name="polychemography"
                                                        id="polychemography"
                                                        class="form-control"
                                                    >
                                                </div>
                                            </div>

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
                                                    <input
                                                        type="text"
                                                        name="iah"
                                                        id="iah"
                                                        class="form-control"
                                                        required
                                                    >
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
                                                    <input
                                                        type="text"
                                                        name="ia"
                                                        id="ia"
                                                        class="form-control"
                                                        required
                                                    >
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
                                                    <input
                                                        type="text"
                                                        name="ih"
                                                        id="ih"
                                                        class="form-control"
                                                        required
                                                    >
                                                </div>
                                            </div>

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
                                                    <input
                                                        type="text"
                                                        name="sat_2_min"
                                                        id="sat_2_min"
                                                        class="form-control"
                                                        required
                                                    >
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
                                                    <input
                                                        type="text"
                                                        name="ct90"
                                                        id="ct90"
                                                        class="form-control"
                                                        required
                                                    >
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
                                                    <input
                                                        type="number"
                                                        name="avg_duration_of_apnea"
                                                        id="avg_duration_of_apnea"
                                                        class="form-control"
                                                        min="0"
                                                        required
                                                    >
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
                                                    <input
                                                        type="number"
                                                        name="max_duration_of_apnea"
                                                        id="max_duration_of_apnea"
                                                        class="form-control"
                                                        min="0"
                                                        required
                                                    >
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <label
                                                        for="assessments_observation"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Assessment Observation
                                                    </label>
                                                    <textarea
                                                        name="assessments_observation"
                                                        id="assessments_observation"
                                                        rows="10"
                                                        class="form-control"
                                                    ></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <button
                                                type="button"
                                                class="btn btn-primary"
                                            >
                                                I do not have previous assessment
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row form-group text-right">
                                        <a
                                            href="{{ route('dashboard.assessment.create.step', ['patient' => $patient, 'step' => 'step3']) }}"
                                            class="btn btn-default m-r"
                                        >
                                            Back
                                        </a>
                                        <a
                                            href="{{ route('dashboard.assessment.create.step', ['patient' => $patient, 'step' => 'step4']) }}"
                                            class="btn btn-primary m-r"
                                        >
                                            Save
                                        </a>
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



