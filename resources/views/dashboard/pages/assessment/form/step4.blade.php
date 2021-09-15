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
                                    action="{{ $route }}"
                                    method="POST"
                                    id="step4"
                                    name="step4"
                                    class="step4"
                                >
                                    @csrf
                                    @method($_method)

                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2>Uploads:</h2>
                                            <br>

                                        </div>

                                        <div class="col-md-12">

                                            <div class="row form-group @error('cbct') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="cbct"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        CBCT:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="file"
                                                        id="cbct"
                                                        name="cbct"
                                                        class="form-control"
                                                    >
                                                    @error('cbct')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('photos') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="photos"
                                                        class="col-form-label text-md-left"
                                                    >
                                                    Photos:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="file"
                                                        id="photos"
                                                        name="photos"
                                                        class="form-control"
                                                    >
                                                    @error('photos')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('xray') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="xray"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        X-Ray:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="file"
                                                        id="xray"
                                                        name="xray"
                                                        class="form-control"
                                                    >
                                                    @error('xray')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('sleep_study') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="sleep_study"
                                                        class="col-form-label text-md-left"
                                                    >
                                                    Sleep Study:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="file"
                                                        id="sleep_study"
                                                        name="sleep_study"
                                                        class="form-control"
                                                    >
                                                    @error('sleep_study')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-12">
                                            <div class="row form-group @error('ahi') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="ahi"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        AHI:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="text"
                                                        id="ahi"
                                                        name="ahi"
                                                        class="form-control"
                                                        required=""
                                                        value="{{ $diagnosticTest->ahi ?? old('ahi') }}"
                                                    >
                                                    @error('ahi')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('rdi') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="rdi"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        RDI:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="text"
                                                        id="rdi"
                                                        name="rdi"
                                                        class="form-control"
                                                        required=""
                                                        value="{{ $diagnosticTest->rdi ?? old('rdi') }}"
                                                    >
                                                    @error('rdi')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('nadir') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="nadir"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        NADIR:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="text"
                                                        id="nadir"
                                                        name="nadir"
                                                        class="form-control"
                                                        required=""
                                                        value="{{ $diagnosticTest->nadir ?? old('nadir') }}"
                                                    >
                                                    @error('nadir')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('odi') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="odi"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        ODI:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="text"
                                                        id="odi"
                                                        name="odi"
                                                        class="form-control"
                                                        required=""
                                                        value="{{ $diagnosticTest->odi ?? old('odi') }}"
                                                    >
                                                    @error('odi')
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



