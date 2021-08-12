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

                                <form
                                    action="{{ route('dashboard.assessment.store.step', [
                                        'patient' => $patient, 'step' => 'step4',
                                        ]) }}"
                                    method="POST"
                                    id="step4"
                                    name="step4"
                                    class="step4"
                                >
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h2>Upload document here</h2>
                                            <br>

                                            <div class="row form-group @error('polygraph') has-error @enderror">
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
                                                        id="polygraph"
                                                        name="polygraph"
                                                        class="form-control"
                                                        value="{{ old('polygraph') }}"
                                                    >
                                                    @error('polygraph')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('polychemography') has-error @enderror">
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
                                                        id="polychemography"
                                                        name="polychemography"
                                                        class="form-control"
                                                        value="{{ old('polychemography') }}"
                                                    >
                                                    @error('polychemography')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('iah') has-error @enderror">
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
                                                        id="iah"
                                                        name="iah"
                                                        class="form-control"
                                                        required=""
                                                        value="{{ $diagnosticTest->iah ?? old('iah') }}"
                                                    >
                                                    @error('iah')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('ia') has-error @enderror">
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
                                                        id="ia"
                                                        name="ia"
                                                        class="form-control"
                                                        required=""
                                                        value="{{ $diagnosticTest->iah ?? old('ia') }}"
                                                    >
                                                    @error('ia')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('ih') has-error @enderror">
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
                                                        id="ih"
                                                        name="ih"
                                                        class="form-control"
                                                        required=""
                                                        value="{{ $diagnosticTest->iah ?? old('ih') }}"
                                                    >
                                                    @error('ih')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('sat_2_min') has-error @enderror">
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
                                                        id="sat_2_min"
                                                        name="sat_2_min"
                                                        class="form-control"
                                                        required=""
                                                        value="{{ $diagnosticTest->sat_2_min ?? old('sat_2_min') }}"
                                                    >
                                                    @error('sat_2_min')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('ct90') has-error @enderror">
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
                                                        required=""
                                                        value="{{ $diagnosticTest->ct90 ?? old('ct90') }}"
                                                    >
                                                    @error('ct90')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('avg_duration_of_apnea') has-error @enderror">
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
                                                        id="avg_duration_of_apnea"
                                                        name="avg_duration_of_apnea"
                                                        class="form-control"
                                                        min="0"
                                                        required=""
                                                        value="{{ $diagnosticTest->avg_duration_of_apnea ?? old('avg_duration_of_apnea') }}"
                                                    >
                                                    @error('avg_duration_of_apnea')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('max_duration_of_apnea') has-error @enderror">
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
                                                        id="max_duration_of_apnea"
                                                        name="max_duration_of_apnea"
                                                        class="form-control"
                                                        min="0"
                                                        required=""
                                                        value="{{ $diagnosticTest->max_duration_of_apnea ?? old('max_duration_of_apnea') }}"
                                                    >
                                                    @error('max_duration_of_apnea')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('assessments_observation') has-error @enderror">
                                                <div class="col-md-12">
                                                    <label
                                                        for="assessments_observation"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Assessment Observation
                                                    </label>
                                                    <textarea
                                                        id="assessments_observation"
                                                        name="assessments_observation"
                                                        class="form-control"
                                                        rows="10"
                                                        required=""
                                                    >{{ $diagnosticTest->assessments_observation ?? old('assessments_observation') }}</textarea>
                                                    @error('assessments_observation')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
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
                                        <button
                                            id="button_step4"
                                            type="submit"
                                            class="btn btn-primary m-r"
                                        >
                                            Save
                                        </button>
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



