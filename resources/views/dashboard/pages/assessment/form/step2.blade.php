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

                        @include('dashboard.pages.assessment.form.progress', ['step' => 'step2',])

                        <div class="row">
                            <div class="col-md-12">

                                <form
                                    action="{{ $route }}"
                                    method="POST"
                                    id="step2"
                                    name="step2"
                                    class="step2"
                                >
                                    @csrf
                                    @method($_method)

                                    <div class="row">

                                        <div class="col-md-6">

                                            <h2>Habits</h2>
                                            <br>

                                            <div class="row form-group @error('smoker') has-error @enderror">
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
                                                        <input
                                                            id="smoker_yes"
                                                            name="smoker"
                                                            type="radio"
                                                            class=""
                                                            value="1"
                                                            required=""
                                                            {{ old('smoker') == '1' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->smoker ?? null) == '1' ? 'checked' : '' }}
                                                        >
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input
                                                            id="smoker_no"
                                                            name="smoker"
                                                            type="radio"
                                                            class=""
                                                            value="0"
                                                            required=""
                                                            {{ old('smoker') == '0' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->smoker ?? null) == '0' ? 'checked' : '' }}
                                                        >
                                                        <span>No</span>
                                                    </label>
                                                    @error('smoker')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="row form-group @error('alcohol_with_dinner') has-error @enderror">

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
                                                        <input
                                                            id="alcohol_with_dinner_yes"
                                                            name="alcohol_with_dinner"
                                                            type="radio"
                                                            class=""
                                                            value="1"
                                                            required=""
                                                            {{ old('alcohol_with_dinner') == '1' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->alcohol_with_dinner ?? null) == '1' ? 'checked' : '' }}
                                                        >
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input
                                                            id="alcohol_with_dinner_no"
                                                            name="alcohol_with_dinner"
                                                            type="radio"
                                                            class=""
                                                            value="0"
                                                            required=""
                                                            {{ old('alcohol_with_dinner') == '0' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->alcohol_with_dinner ?? null) == '0' ? 'checked' : '' }}
                                                        >
                                                        <span>No</span>
                                                    </label>


                                                    @error('alcohol_with_dinner')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('alcohol_with_dinner_quantity') has-error @enderror" id="alcohol_with_dinner_quantity__div">
                                                <div class="col-md-6">
                                                    <label
                                                        for="alcohol_with_dinner_quantity"
                                                        class="col-form-label text-md-left"
                                                    >
                                                    How many days/week do you have 1 drink or more?
                                                    </label>

                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="number"
                                                        name="alcohol_with_dinner_quantity"
                                                        id="alcohol_with_dinner_quantity"
                                                        class="form-control"
                                                        min="0"
                                                        value="{{ $medicalHistory->alcohol_with_dinner_quantity ?? old('alcohol_with_dinner_quantity') }}"
                                                    >
                                                </div>
                                                @error('alcohol_with_dinner_quantity')
                                                    <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <br>
                                            <h2>Medical History</h2>
                                            <br>

                                            <div class="row form-group @error('high_blood_pressure') has-error @enderror">
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
                                                        <input
                                                            id="high_blood_pressure_yes"
                                                            name="high_blood_pressure"
                                                            type="radio"
                                                            class=""
                                                            value="1"
                                                            required=""
                                                            {{ old('high_blood_pressure') == '1' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->high_blood_pressure ?? null) == '1' ? 'checked' : '' }}
                                                        >
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input
                                                            id="high_blood_pressure_no"
                                                            name="high_blood_pressure"
                                                            type="radio"
                                                            class=""
                                                            value="0"
                                                            required=""
                                                            {{ old('high_blood_pressure') == '0' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->high_blood_pressure ?? null) == '0' ? 'checked' : '' }}
                                                        >
                                                        <span>No</span>
                                                    </label>
                                                    @error('high_blood_pressure')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('myocardial_infarction') has-error @enderror">
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
                                                        <input
                                                            id="myocardial_infarction_yes"
                                                            name="myocardial_infarction"
                                                            type="radio"
                                                            class=""
                                                            value="1"
                                                            required=""
                                                            {{ old('myocardial_infarction') == '1' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->myocardial_infarction ?? null) == '1' ? 'checked' : '' }}
                                                        >
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input
                                                            id="myocardial_infarction_no"
                                                            name="myocardial_infarction"
                                                            type="radio"
                                                            class=""
                                                            value="0"
                                                            required=""
                                                            {{ old('myocardial_infarction') == '0' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->myocardial_infarction ?? null) == '0' ? 'checked' : '' }}
                                                        >
                                                        <span>No</span>
                                                    </label>
                                                    @error('myocardial_infarction')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('coronary_artery_disease') has-error @enderror">
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
                                                        <input
                                                            id="coronary_artery_disease_yes"
                                                            name="coronary_artery_disease"
                                                            type="radio"
                                                            class=""
                                                            value="1"
                                                            required=""
                                                            {{ old('coronary_artery_disease') == '1' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->coronary_artery_disease ?? null) == '1' ? 'checked' : '' }}
                                                        >
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input
                                                            id="coronary_artery_disease_no"
                                                            name="coronary_artery_disease"
                                                            type="radio"
                                                            class=""
                                                            value="0"
                                                            required=""
                                                            {{ old('coronary_artery_disease') == '0' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->coronary_artery_disease ?? null) == '0' ? 'checked' : '' }}
                                                        >
                                                        <span>No</span>
                                                    </label>
                                                    @error('coronary_artery_disease')
                                                    <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group @error('arrhythmia') has-error @enderror">
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
                                                        <input
                                                            id="arrhythmia_yes"
                                                            name="arrhythmia"
                                                            type="radio"
                                                            class=""
                                                            value="1"
                                                            required=""
                                                            {{ old('arrhythmia') == '1' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->arrhythmia ?? null) == '1' ? 'checked' : '' }}
                                                        >
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input
                                                            id="arrhythmia_no"
                                                            name="arrhythmia"
                                                            type="radio"
                                                            class=""
                                                            value="0"
                                                            required=""
                                                            {{ old('arrhythmia') == '0' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->arrhythmia ?? null) == '0' ? 'checked' : '' }}
                                                        >
                                                        <span>No</span>
                                                    </label>
                                                    @error('arrhythmia')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group @error('heart_failure') has-error @enderror">
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
                                                        <input
                                                            id="heart_failure_yes"
                                                            name="heart_failure"
                                                            type="radio"
                                                            class=""
                                                            value="1"
                                                            required=""
                                                            {{ old('heart_failure') == '1' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->heart_failure ?? null) == '1' ? 'checked' : '' }}
                                                        >
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input
                                                            id="heart_failure_no"
                                                            name="heart_failure"
                                                            type="radio"
                                                            class=""
                                                            value="0"
                                                            required=""
                                                            {{ old('heart_failure') == '0' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->heart_failure ?? null) == '0' ? 'checked' : '' }}
                                                        >
                                                        <span>No</span>
                                                    </label>
                                                    @error('heart_failure')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group @error('diabetes') has-error @enderror">
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
                                                        <input
                                                            id="diabetes_yes"
                                                            name="diabetes"
                                                            type="radio"
                                                            class=""
                                                            value="1"
                                                            required=""
                                                            {{ old('diabetes') == '1' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->diabetes ?? null) == '1' ? 'checked' : '' }}
                                                        >
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input
                                                            id="diabetes_no"
                                                            name="diabetes"
                                                            type="radio"
                                                            class=""
                                                            value="0"
                                                            required=""
                                                            {{ old('diabetes') == '0' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->diabetes ?? null) == '0' ? 'checked' : '' }}
                                                        >
                                                        <span>No</span>
                                                    </label>
                                                    @error('diabetes')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group  @error('depression') has-error @enderror">
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
                                                        <input
                                                            id="depression_yes"
                                                            name="depression"
                                                            type="radio"
                                                            class=""
                                                            value="1"
                                                            required=""
                                                            {{ old('depression') == '1' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->depression ?? null) == '1' ? 'checked' : '' }}
                                                        >
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input
                                                            id="depression_no"
                                                            name="depression"
                                                            type="radio"
                                                            class=""
                                                            value="0"
                                                            required=""
                                                            {{ old('depression') == '0' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->depression ?? null) == '0' ? 'checked' : '' }}
                                                        >
                                                        <span>No</span>
                                                    </label>
                                                    @error('depression')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group @error('dementia') has-error @enderror">
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
                                                        <input
                                                            id="dementia_yes"
                                                            name="dementia"
                                                            type="radio"
                                                            class=""
                                                            value="1"
                                                            required=""
                                                            {{ old('dementia') == '1' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->dementia ?? null) == '1' ? 'checked' : '' }}
                                                        >
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input
                                                            id="dementia_no"
                                                            name="dementia"
                                                            type="radio"
                                                            class=""
                                                            value="0"
                                                            required=""
                                                            {{ old('dementia') == '0' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->dementia ?? null) == '0' ? 'checked' : '' }}
                                                        >
                                                        <span>No</span>
                                                    </label>
                                                    @error('dementia')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group @error('stroke') has-error @enderror">
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
                                                        <input
                                                            id="stroke_yes"
                                                            name="stroke"
                                                            type="radio"
                                                            class=""
                                                            value="1"
                                                            required=""
                                                            {{ old('stroke') == '1' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->stroke ?? null) == '1' ? 'checked' : '' }}
                                                        >
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input
                                                            id="stroke_no"
                                                            name="stroke"
                                                            type="radio"
                                                            class=""
                                                            value="0"
                                                            required=""
                                                            {{ old('stroke') == '0' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->stroke ?? null) == '0' ? 'checked' : '' }}
                                                        >
                                                        <span>No</span>
                                                    </label>
                                                    @error('stroke')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group @error('lung_disease') has-error @enderror">
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
                                                        <input
                                                            id="lung_disease_yes"
                                                            name="lung_disease"
                                                            type="radio"
                                                            class=""
                                                            value="1"
                                                            required=""
                                                            {{ old('lung_disease') == '1' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->lung_disease ?? null) == '1' ? 'checked' : '' }}
                                                        >
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input
                                                            id="lung_disease_no"
                                                            name="lung_disease"
                                                            type="radio"
                                                            class=""
                                                            value="0"
                                                            required=""
                                                            {{ old('lung_disease') == '0' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->lung_disease ?? null) == '0' ? 'checked' : '' }}
                                                        >
                                                        <span>No</span>
                                                    </label>
                                                    @error('lung_disease')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group @error('hypothyroidism') has-error @enderror">
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
                                                        <input
                                                            id="hypothyroidism_yes"
                                                            name="hypothyroidism"
                                                            type="radio"
                                                            class=""
                                                            value="1"
                                                            required=""
                                                            {{ old('hypothyroidism') == '1' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->hypothyroidism ?? null) == '1' ? 'checked' : '' }}
                                                        >
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input
                                                            id="hypothyroidism_no"
                                                            name="hypothyroidism"
                                                            type="radio"
                                                            class=""
                                                            value="0"
                                                            required=""
                                                            {{ old('hypothyroidism') == '0' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->hypothyroidism ?? null) == '0' ? 'checked' : '' }}
                                                        >
                                                        <span>No</span>
                                                    </label>
                                                    @error('hypothyroidism')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group @error('other_medical_history') has-error @enderror">
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
                                                        required=""
                                                        value="{{ $medicalHistory->other_medical_history ?? old('other_medical_history') }}"
                                                    >
                                                </div>
                                                    @error('other_medical_history')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="row form-group @error('anxiolytics') has-error @enderror">

                                                <div class="col-md-6">
                                                    <label
                                                        for="anxiolytics"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Anxiolytics:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r" for="anxiolytics_yes">
                                                        <input
                                                            id="anxiolytics_yes"
                                                            name="anxiolytics"
                                                            type="radio"
                                                            class=""
                                                            value="1"
                                                            required=""
                                                            {{ old('anxiolytics') == '1' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->anxiolytics ?? null) == '1' ? 'checked' : '' }}
                                                        >
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r" for="anxiolytics_no">
                                                        <input
                                                            id="anxiolytics_no"
                                                            name="anxiolytics"
                                                            type="radio"
                                                            class=""
                                                            value="0"
                                                            required=""
                                                            {{ old('anxiolytics') == '0' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->anxiolytics ?? null) == '0' ? 'checked' : '' }}
                                                        >
                                                        <span>No</span>
                                                    </label>


                                                    @error('anxiolytics')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group @error('anxiolytics_value') has-error @enderror" id="anxiolytics_value__div">
                                                <div class="col-md-12">
                                                    <label
                                                        for="anxiolytics_value"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Anxiolytics:
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="anxiolytics_value"
                                                        id="anxiolytics_value"
                                                        class="form-control"
                                                        value="{{ $medicalHistory->anxiolytics_value ?? old('anxiolytics_value') }}"
                                                    >
                                                </div>
                                                @error('anxiolytics_value')
                                                    <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <div class="row form-group @error('antidepressants') has-error @enderror">

                                                <div class="col-md-6">
                                                    <label
                                                        for="antidepressants"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Antidepressants:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r" for="antidepressants_yes">
                                                        <input
                                                            id="antidepressants_yes"
                                                            name="antidepressants"
                                                            type="radio"
                                                            class=""
                                                            value="1"
                                                            required=""
                                                            {{ old('antidepressants') == '1' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->antidepressants ?? null) == '1' ? 'checked' : '' }}
                                                        >
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r" for="antidepressants_no">
                                                        <input
                                                            id="antidepressants_no"
                                                            name="antidepressants"
                                                            type="radio"
                                                            class=""
                                                            value="0"
                                                            required=""
                                                            {{ old('antidepressants') == '0' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->antidepressants ?? null) == '0' ? 'checked' : '' }}
                                                        >
                                                        <span>No</span>
                                                    </label>


                                                    @error('antidepressants')
                                                    <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group @error('antidepressants_value') has-error @enderror" id="antidepressants_value__div">
                                                <div class="col-md-12">
                                                    <label
                                                        for="antidepressants_value"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Antidepressants:
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="antidepressants_value"
                                                        id="antidepressants_value"
                                                        class="form-control"
                                                        value="{{ $medicalHistory->antidepressants_value ?? old('antidepressants_value') }}"
                                                    >
                                                </div>
                                                @error('antidepressants_value')
                                                    <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <div class="row form-group @error('induce_sleep_medication') has-error @enderror">

                                                <div class="col-md-6">
                                                    <label
                                                        for="induce_sleep_medication"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Other medication to help induce sleep:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r" for="induce_sleep_medication_yes">
                                                        <input
                                                            id="induce_sleep_medication_yes"
                                                            name="induce_sleep_medication"
                                                            type="radio"
                                                            class=""
                                                            value="1"
                                                            required=""
                                                            {{ old('induce_sleep_medication') == '1' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->induce_sleep_medication ?? null) == '1' ? 'checked' : '' }}
                                                        >
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r" for="induce_sleep_medication_no">
                                                        <input
                                                            id="induce_sleep_medication_no"
                                                            name="induce_sleep_medication"
                                                            type="radio"
                                                            class=""
                                                            value="0"
                                                            required=""
                                                            {{ old('induce_sleep_medication') == '0' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->induce_sleep_medication ?? null) == '0' ? 'checked' : '' }}
                                                        >
                                                        <span>No</span>
                                                    </label>


                                                    @error('induce_sleep_medication')
                                                    <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group @error('induce_sleep_medication_value') has-error @enderror" id="induce_sleep_medication_value__div">
                                                <div class="col-md-12">
                                                    <label
                                                        for="induce_sleep_medication_value"
                                                        class="col-form-label text-md-left"
                                                    >
                                                    Other medication to help induce sleep:
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="induce_sleep_medication_value"
                                                        id="induce_sleep_medication_value"
                                                        class="form-control"
                                                        value="{{ $medicalHistory->induce_sleep_medication_value ?? old('induce_sleep_medication_value') }}"
                                                    >
                                                </div>
                                                @error('induce_sleep_medication_value')
                                                    <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="row form-group @error('other_medications') has-error @enderror">

                                                <div class="col-md-6">
                                                    <label
                                                        for="other_medications"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Other medications:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r" for="other_medications_yes">
                                                        <input
                                                            id="other_medications_yes"
                                                            name="other_medications"
                                                            type="radio"
                                                            class=""
                                                            value="1"
                                                            required=""
                                                            {{ old('other_medications') == '1' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->other_medications ?? null) == '1' ? 'checked' : '' }}
                                                        >
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r" for="other_medications_no">
                                                        <input
                                                            id="other_medications_no"
                                                            name="other_medications"
                                                            type="radio"
                                                            class=""
                                                            value="0"
                                                            required=""
                                                            {{ old('other_medications') == '0' ? 'checked' : '' }}
                                                            {{ ($medicalHistory->other_medications ?? null) == '0' ? 'checked' : '' }}
                                                        >
                                                        <span>No</span>
                                                    </label>


                                                    @error('other_medications')
                                                    <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group @error('other_medications_value') has-error @enderror" id="other_medications_value__div">
                                                <div class="col-md-12">
                                                    <label
                                                        for="other_medications_value"
                                                        class="col-form-label text-md-left"
                                                    >
                                                    Other medications:
                                                    </label>
                                                    <input
                                                        type="text"
                                                        name="other_medications_value"
                                                        id="other_medications_value"
                                                        class="form-control"
                                                        value="{{ $medicalHistory->other_medications_value ?? old('other_medications_value') }}"
                                                    >
                                                </div>
                                                @error('other_medications_value')
                                                    <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group text-right">
                                        <a
                                            href="{{ route('dashboard.assessment.create.step', ['patient' => $patient, 'step' => 'step1']) }}"
                                            class="btn btn-default m-r"
                                        >
                                            Back
                                        </a>
                                        <button
                                            id="button_step2"
                                            type="submit"
                                            class="btn btn-primary m-r"
                                        >
                                            Next
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

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script>
    let alcohol_with_dinner_quantity__div = $('#alcohol_with_dinner_quantity__div').hide();
    let anxiolytics_value__div = $('#anxiolytics_value__div').hide();
    let antidepressants_value__div = $('#antidepressants_value__div').hide();
    let induce_sleep_medication_value__div = $('#induce_sleep_medication_value__div').hide();
    let other_medications_value__div = $('#other_medications_value__div').hide();

    $('input[name="alcohol_with_dinner"]').click(function(e) {
        if(e.target.value === '1') {
            $('#alcohol_with_dinner_quantity').attr('required', true);
            alcohol_with_dinner_quantity__div.show();
        } else {
            $('#alcohol_with_dinner_quantity').attr('required', false);
            alcohol_with_dinner_quantity__div.hide();
        }
    });

    $('input[name="anxiolytics"]').click(function(e) {
        if(e.target.value === '1') {
            $('#anxiolytics_value').attr('required', true);
            anxiolytics_value__div.show();
        } else {
            $('#anxiolytics_value').attr('required', false);
            anxiolytics_value__div.hide();
        }
    });

    $('input[name="antidepressants"]').click(function(e) {
        if(e.target.value === '1') {
            $('#antidepressants_value').attr('required', true);
            antidepressants_value__div.show();
        } else {
            $('#antidepressants_value').attr('required', false);
            antidepressants_value__div.hide();
        }
    });

    $('input[name="induce_sleep_medication"]').click(function(e) {
        if(e.target.value === '1') {
            $('#induce_sleep_medication_value').attr('required', true);
            induce_sleep_medication_value__div.show();
        } else {
            $('#induce_sleep_medication_value').attr('required', false);
            induce_sleep_medication_value__div.hide();
        }
    });

    $('input[name="other_medications"]').click(function(e) {
        if(e.target.value === '1') {
            $('#other_medications_value').attr('required', true);
            other_medications_value__div.show();
        } else {
            $('#other_medications_value').attr('required', false);
            other_medications_value__div.hide();
        }
    });

    // Error handling
    let error_alcohol_with_dinner_quantity = false;
    let error_anxiolytics_value = false;
    let error_antidepressants_value = false;
    let error_induce_sleep_medication_value = false;
    let error_other_medications_value = false;

    @error('alcohol_with_dinner_quantity') error_alcohol_with_dinner_quantity = true; @enderror
    @error('anxiolytics_value') error_anxiolytics_value = true; @enderror
    @error('antidepressants_value') error_antidepressants_value = true; @enderror
    @error('induce_sleep_medication_value') error_induce_sleep_medication_value = true; @enderror
    @error('other_medications_value') error_other_medications_value = true; @enderror

    if (["true", true, 1].includes(error_alcohol_with_dinner_quantity)) {
        alcohol_with_dinner_quantity__div.show();
    }

    if (["true", true, 1].includes(error_anxiolytics_value)) {
        anxiolytics_value__div.show();
    }

    if (["true", true, 1].includes(error_antidepressants_value)) {
        antidepressants_value__div.show();
    }

    if (["true", true, 1].includes(error_induce_sleep_medication_value)) {
        induce_sleep_medication_value__div.show();
    }

    if (["true", true, 1].includes(error_other_medications_value)) {
        other_medications_value__div.show();
    }

</script>
@endsection



