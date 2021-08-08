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

                        @include('dashboard.pages.patient.form.progress', ['step' => 'step2',])

                        <div class="row">
                            <div class="col-md-12">

                                <form action="">
                                    <div class="row">

                                        <div class="col-md-6">

                                            <h2>Habits</h2>
                                            <br>

                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label
                                                        for="smoker"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Smoker:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="smoker_yes" name="smoker" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="smoker_no" name="smoker" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label
                                                        for="alcohol_with_dinner"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Drinks alcohol with dinner or before:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="alcohol_with_dinner_yes" name="alcohol_with_dinner" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="alcohol_with_dinner_no" name="alcohol_with_dinner" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <br>
                                            <h2>Medical History</h2>
                                            <br>

                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label
                                                        for="high_blood_pressure"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        High Blood Pressure:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="high_blood_pressure_yes" name="high_blood_pressure" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="high_blood_pressure_no" name="high_blood_pressure" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label
                                                        for="myocardial_infarction"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Myocardical Infraction:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="myocardial_infarction_yes" name="myocardial_infarction" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="myocardial_infarction_no" name="myocardial_infarction" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label
                                                        for="coronary_artery_disease"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Coronary Artery Disease:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="coronary_artery_disease_yes" name="coronary_artery_disease" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="coronary_artery_disease_no" name="coronary_artery_disease" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label
                                                        for="arrhythmia"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Arrythmia:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="arrhythmia_yes" name="arrhythmia" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="arrhythmia_no" name="arrhythmia" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label
                                                        for="heart_failure"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Heart Failure:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="heart_failure_yes" name="heart_failure" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="heart_failure_no" name="heart_failure" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label
                                                        for="diabetes"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Diabetes:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="diabetes_yes" name="diabetes" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="diabetes_no" name="diabetes" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label
                                                        for="depression"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Depression:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="depression_yes" name="depression" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="depression_no" name="depression" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label
                                                        for="dementia"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Dementia:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="dementia_yes" name="dementia" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="dementia_no" name="dementia" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label
                                                        for="stroke"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Stroke:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="stroke_yes" name="stroke" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="stroke_no" name="stroke" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label
                                                        for="lung_disease"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Lung Disease:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="lung_disease_yes" name="lung_disease" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="lung_disease_no" name="lung_disease" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label
                                                        for="hypothyroidism"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Hypothroidism:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="hypothyroidism_yes" name="hypothyroidism" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="hypothyroidism_no" name="hypothyroidism" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label
                                                        for="other_medical_history"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Other Diseases:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="text"
                                                        name="other_medical_history"
                                                        id="other_medical_history"
                                                        class="form-control"
                                                        required
                                                    >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <label
                                                            for="anxiolytics"
                                                            class="col-form-label text-md-left"
                                                        >
                                                            Anxiolytics:
                                                        </label>
                                                        <input
                                                            type="text"
                                                            name="anxiolytics"
                                                            id="anxiolytics"
                                                            class="form-control"
                                                            required
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <label
                                                            for="antidepressants"
                                                            class="col-form-label text-md-left"
                                                        >
                                                            Antidepressants:
                                                        </label>
                                                        <input
                                                            type="text"
                                                            name="antidepressants"
                                                            id="antidepressants"
                                                            class="form-control"
                                                            required
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <label
                                                            for="induce_sleep_medication"
                                                            class="col-form-label text-md-left"
                                                        >
                                                        Other medication to help induce sleep:
                                                        </label>
                                                        <input
                                                            type="text"
                                                            name="induce_sleep_medication"
                                                            id="induce_sleep_medication"
                                                            class="form-control"
                                                            required
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <label
                                                            for="other_medications"
                                                            class="col-form-label text-md-left"
                                                        >
                                                        Other medications:
                                                        </label>
                                                        <input
                                                            type="text"
                                                            name="other_medications"
                                                            id="other_medications"
                                                            class="form-control"
                                                            required
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group text-right">
                                        <a
                                            href="{{route('dashboard.patients.create.step', ['step' => 'step1'])}}"
                                            class="btn btn-default m-r"
                                        >
                                            Back
                                        </a>
                                        <a
                                            href="{{route('dashboard.patients.create.step', ['step' => 'step3'])}}"
                                            class="btn btn-primary m-r"
                                        >
                                            Next
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



