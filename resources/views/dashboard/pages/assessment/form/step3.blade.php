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

                        @include('dashboard.pages.assessment.form.progress', ['step' => 'step3',])

                        <div class="row">
                            <div class="col-md-12">

                                <form
                                    action="{{ route('dashboard.assessment.store.step', [
                                        'patient' => $patient, 'step' => 'step3',
                                        ]) }}"
                                    method="POST"
                                    id="step3"
                                    name="step3"
                                    class="step3"
                                >
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">

                                            <h2>Previous Treatments</h2>
                                            <br>

                                            <div class="row form-group @error('cpap') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="cpap"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        CPAP:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="cpap_yes" name="cpap" type="radio" class="" value="1" required="" {{ old('cpap') == '1' ? 'checked' : '' }}>
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="cpap_no" name="cpap" type="radio" class="" value="0" required="" {{ old('cpap') == '0' ? 'checked' : '' }}>
                                                        <span>No</span>
                                                    </label>
                                                    @error('cpap')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group @error('mandibular_advancement_device') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="mandibular_advancement_device"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Mundibular Advancement device:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="mandibular_advancement_device_yes" name="mandibular_advancement_device" type="radio" class="" value="1" required="" {{ old('mandibular_advancement_device') == '1' ? 'checked' : '' }}>
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="mandibular_advancement_device_no" name="mandibular_advancement_device" type="radio" class="" value="0" required="" {{ old('mandibular_advancement_device') == '0' ? 'checked' : '' }}>
                                                        <span>No</span>
                                                    </label>
                                                    @error('mandibular_advancement_device')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group @error('positional_therapy') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="positional_therapy"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Positional Therapy:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="positional_therapy_yes" name="positional_therapy" type="radio" class="" value="1" required="" {{ old('positional_therapy') == '1' ? 'checked' : '' }}>
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="positional_therapy_no" name="positional_therapy" type="radio" class="" value="0" required="" {{ old('positional_therapy') == '0' ? 'checked' : '' }}>
                                                        <span>No</span>
                                                    </label>
                                                    @error('positional_therapy')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group  @error('upper_airway_surgery') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="positional_therapy"
                                                        class="col-form-label text-md-left"
                                                    >
                                                    Upper Airway surgery:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    @foreach(config('constants.upper_airway_surgery') as $upperAirwaySurgeryKey => $upperAirwaySurgery)
                                                        <label class="m-r">
                                                            <input
                                                                type="checkbox"
                                                                name="upper_airway_surgery[]"
                                                                id="upper_airway_surgery_{{ $upperAirwaySurgeryKey }}"
                                                                class=""
                                                                value="{{ $upperAirwaySurgeryKey }}"
                                                                {{ in_array($upperAirwaySurgeryKey, old('upper_airway_surgery') ?? []) ? 'checked' : '' }}
                                                            >
                                                            <span>{{ $upperAirwaySurgery }}</span>
                                                        </label>
                                                        <br>
                                                    @endforeach
                                                    @error('upper_airway_surgery')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('other_upper_airway_surgery') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="other_upper_airway_surgery"
                                                        class="col-form-label text-md-left"
                                                    >
                                                    Other upper airway surgery:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="text"
                                                        name="other_upper_airway_surgery"
                                                        id="other_upper_airway_surgery"
                                                        class="form-control"
                                                        required=""
                                                        value="{{ old('other_upper_airway_surgery')}}"
                                                    >
                                                    @error('other_upper_airway_surgery')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('bariatric_surgery') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="bariatric_surgery"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Bariatric surgery (Weight-loss surgery)
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="bariatric_surgery_yes" name="bariatric_surgery" type="radio" class="" value="1" required="" {{ old('bariatric_surgery') == '1' ? 'checked' : '' }}>
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="bariatric_surgery_no" name="bariatric_surgery" type="radio" class="" value="0" required="" {{ old('bariatric_surgery') == '0' ? 'checked' : '' }}>
                                                        <span>No</span>
                                                    </label>
                                                    @error('bariatric_surgery')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('other_treatments_for_sleep_apnea') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="other_treatments_for_sleep_apnea"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Other treatments for sleep apnea or snorting:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                        <input
                                                            type="text"
                                                            name="other_treatments_for_sleep_apnea"
                                                            id="other_treatments_for_sleep_apnea"
                                                            class="form-control"
                                                            required=""
                                                            value="{{ old('other_treatments_for_sleep_apnea') }}"
                                                        >
                                                </div>
                                                @error('other_treatments_for_sleep_apnea')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <h2>Physical Exam</h2>
                                            <br>

                                            <div class="row form-group @error('height') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="height"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Height (cm):
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="number"
                                                        name="height"
                                                        id="height"
                                                        class="form-control"
                                                        min="0"
                                                        required=""
                                                        value="{{ old('height')}}"
                                                    >
                                                    @error('height')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group @error('weight') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="weight"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Weight (kg):
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="number"
                                                        name="weight"
                                                        id="weight"
                                                        class="form-control"
                                                        min="0"
                                                        required=""
                                                        value="{{ old('weight')}}"
                                                    >
                                                    @error('weight')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group @error('bmi') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="bmi"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Body Mass Index (BMI):
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="number"
                                                        name="bmi"
                                                        id="bmi"
                                                        class="form-control"
                                                        readonly
                                                        value="{{ old('bmi')}}"
                                                    >
                                                    @error('bmi')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group @error('neck_circumference') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="neck_circumference"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Neck circumference (cm):
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="number"
                                                        name="neck_circumference"
                                                        id="neck_circumference"
                                                        class="form-control"
                                                        min="0"
                                                        required=""
                                                        value="{{ old('neck_circumference')}}"
                                                    >
                                                    @error('neck_circumference')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group @error('beats_per_minute') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="beats_per_minute"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Beats per minute:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="number"
                                                        name="beats_per_minute"
                                                        id="beats_per_minute"
                                                        class="form-control"
                                                        min="0"
                                                        required=""
                                                        value="{{ old('beats_per_minute')}}"
                                                    >
                                                    @error('beats_per_minute')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group @error('systolic_blood_pressure') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="systolic_blood_pressure"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Systolic Blood Pressure:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="number"
                                                        name="systolic_blood_pressure"
                                                        id="systolic_blood_pressure"
                                                        class="form-control"
                                                        min="0"
                                                        required=""
                                                        value="{{ old('systolic_blood_pressure')}}"
                                                    >
                                                    @error('systolic_blood_pressure')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row form-group @error('diastolic_blood_pressure') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="diastolic_blood_pressure"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Diastolic Blood Pressure:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input
                                                        type="number"
                                                        name="diastolic_blood_pressure"
                                                        id="diastolic_blood_pressure"
                                                        class="form-control"
                                                        min="0"
                                                        required=""
                                                        value="{{ old('diastolic_blood_pressure')}}"
                                                    >
                                                    @error('diastolic_blood_pressure')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h2>Oral Exam</h2>
                                            <br>

                                            <div class="row form-group @error('bruxism') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="bruxism"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Signs of Bruxism:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="bruxism_yes" name="bruxism" type="radio" class="" value="1" required="" {{ old('bruxism') == '1' ? 'checked' : '' }}>
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="bruxism_no" name="bruxism" type="radio" class="" value="0" required="" {{ old('bruxism') == '0' ? 'checked' : '' }}>
                                                        <span>No</span>
                                                    </label>
                                                    @error('bruxism')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('pointed_hard_palade') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="pointed_hard_palade"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Pointed hard palate:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="pointed_hard_palade_yes" name="pointed_hard_palade" type="radio" class="" value="1" required="" {{ old('pointed_hard_palade') == '1' ? 'checked' : '' }}>
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="pointed_hard_palade_no" name="pointed_hard_palade" type="radio" class="" value="0" required="" {{ old('pointed_hard_palade') == '0' ? 'checked' : '' }}>
                                                        <span>No</span>
                                                    </label>
                                                    @error('pointed_hard_palade')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('tmj_noise') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="tmj_noise"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Noise when moving the TMJ:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="tmj_noise_yes" name="tmj_noise" type="radio" class="" value="1" required="" {{ old('tmj_noise') == '1' ? 'checked' : '' }}>
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="tmj_noise_no" name="tmj_noise" type="radio" class="" value="0" required="" {{ old('tmj_noise') == '0' ? 'checked' : '' }}>
                                                        <span>No</span>
                                                    </label>
                                                    @error('tmj_noise')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('tmj_pain') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="tmj_pain"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        TMJ pain when mouth is open for one minute:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="tmj_pain_yes" name="tmj_pain" type="radio" class="" value="1" required="" {{ old('tmj_pain') == '1' ? 'checked' : '' }}>
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="tmj_pain_no" name="tmj_pain" type="radio" class="" value="0" required="" {{ old('tmj_pain') == '0' ? 'checked' : '' }}>
                                                        <span>No</span>
                                                    </label>
                                                    @error('tmj_pain')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('bilateral_crossbite') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="bilateral_crossbite"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Bilateral Crossbite:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="bilateral_crossbite_yes" name="bilateral_crossbite" type="radio" class="" value="1" required="" {{ old('bilateral_crossbite') == '1' ? 'checked' : '' }}>
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="bilateral_crossbite_no" name="bilateral_crossbite" type="radio" class="" value="0" required="" {{ old('bilateral_crossbite') == '0' ? 'checked' : '' }}>
                                                        <span>No</span>
                                                    </label>
                                                    @error('bilateral_crossbite')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('lateral_crossbite') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label
                                                        for="lateral_crossbite"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Lateral Crossbite:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="lateral_crossbite_yes" name="lateral_crossbite" type="radio" class="" value="1" required="" {{ old('lateral_crossbite') == '1' ? 'checked' : '' }}>
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="lateral_crossbite_no" name="lateral_crossbite" type="radio" class="" value="0" required="" {{ old('lateral_crossbite') == '0' ? 'checked' : '' }}>
                                                        <span>No</span>
                                                    </label>
                                                    @error('lateral_crossbite')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <h2>Mondular Morphology according to facial profile</h2>
                                            <br>

                                            <div class="row form-group @error('normognathic') has-error @enderror">
                                                <div class="col-md-4 text-md-center">
                                                    <img
                                                        src="{{ asset(config('constants.clinical_explorations.normognathic.image')) }}"
                                                        alt="{{ config('constants.clinical_explorations.normognathic.image') }}"
                                                        width="100px"
                                                    >
                                                    <br>
                                                    <label
                                                        for="normognathic"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Normognathic:
                                                    </label>

                                                    <div class="text-md-center">
                                                        <label class="m-r">
                                                            <input id="normognathic_yes" name="normognathic" type="radio" class="" value="1" required="" {{ old('normognathic') == '1' ? 'checked' : '' }}>
                                                            <span>Yes</span>
                                                        </label>
                                                        <label class="m-r">
                                                            <input id="normognathic_no" name="normognathic" type="radio" class="" value="0" required="" {{ old('normognathic') == '0' ? 'checked' : '' }}>
                                                            <span>No</span>
                                                        </label>
                                                        @error('normognathic')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4 text-md-center  @error('retrognathic') has-error @enderror">
                                                    <img
                                                        src="{{ asset(config('constants.clinical_explorations.retrognathic.image')) }}"
                                                        alt="{{ config('constants.clinical_explorations.retrognathic.image') }}"
                                                        width="100px"
                                                    >
                                                    <br>
                                                    <label
                                                        for="retrognathic"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Retrognathic:
                                                    </label>

                                                    <div class="text-md-center">
                                                        <label class="m-r">
                                                            <input id="retrognathic_yes" name="retrognathic" type="radio" class="" value="1" required="" {{ old('retrognathic') == '1' ? 'checked' : '' }}>
                                                            <span>Yes</span>
                                                        </label>
                                                        <label class="m-r">
                                                            <input id="retrognathic_no" name="retrognathic" type="radio" class="" value="0" required="" {{ old('retrognathic') == '0' ? 'checked' : '' }}>
                                                            <span>No</span>
                                                        </label>
                                                        @error('retrognathic')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4 text-md-center @error('prognathic') has-error @enderror">
                                                    <img
                                                        src="{{ asset(config('constants.clinical_explorations.prognathic.image')) }}"
                                                        alt="{{ config('constants.clinical_explorations.prognathic.image') }}"
                                                        width="100px"
                                                    >
                                                    <br>
                                                    <label
                                                        for="prognathic"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Prognathic:
                                                    </label>

                                                    <div class="text-md-center">
                                                        <label class="m-r">
                                                            <input id="prognathic_yes" name="prognathic" type="radio" class="" value="1" required="" {{ old('prognathic') == '1' ? 'checked' : '' }}>
                                                            <span>Yes</span>
                                                        </label>
                                                        <label class="m-r">
                                                            <input id="prognathic_no" name="prognathic" type="radio" class="" value="0" required="" {{ old('prognathic') == '0' ? 'checked' : '' }}>
                                                            <span>No</span>
                                                        </label>
                                                        @error('prognathic')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <br>
                                            <h2>Type of bite</h2>
                                            <br>

                                            <div class="row form-group @error('edge_to_edge_bite') has-error @enderror">
                                                <div class="col-md-4 text-md-center">
                                                    <img
                                                        src="{{ asset(config('constants.clinical_explorations.edge_to_edge_bite.image')) }}"
                                                        alt="{{ config('constants.clinical_explorations.edge_to_edge_bite.image') }}"
                                                        width="100px"
                                                    >
                                                    <br>
                                                    <label
                                                        for="edge_to_edge_bite"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Edge to edge bite:
                                                    </label>

                                                    <div class="text-md-center">
                                                        <label class="m-r">
                                                            <input id="edge_to_edge_bite_yes" name="edge_to_edge_bite" type="radio" class="" value="1" required="" {{ old('edge_to_edge_bite') == '1' ? 'checked' : '' }}>
                                                            <span>Yes</span>
                                                        </label>
                                                        <label class="m-r">
                                                            <input id="edge_to_edge_bite_no" name="edge_to_edge_bite" type="radio" class="" value="0" required="" {{ old('edge_to_edge_bite') == '0' ? 'checked' : '' }}>
                                                            <span>No</span>
                                                        </label>
                                                        @error('edge_to_edge_bite')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4 text-md-center @error('anterior_crossbite') has-error @enderror">
                                                    <img
                                                        src="{{ asset(config('constants.clinical_explorations.anterior_crossbite.image')) }}"
                                                        alt="{{ config('constants.clinical_explorations.anterior_crossbite.image') }}"
                                                        width="100px"
                                                    >
                                                    <br>
                                                    <label
                                                        for="anterior_crossbite"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Anterior crossbite:
                                                    </label>

                                                    <div class="text-md-center">
                                                        <label class="m-r">
                                                            <input id="anterior_crossbite_yes" name="anterior_crossbite" type="radio" class="" value="1" required="" {{ old('anterior_crossbite') == '1' ? 'checked' : '' }}>
                                                            <span>Yes</span>
                                                        </label>
                                                        <label class="m-r">
                                                            <input id="anterior_crossbite_no" name="anterior_crossbite" type="radio" class="" value="0" required="" {{ old('anterior_crossbite') == '0' ? 'checked' : '' }}>
                                                            <span>No</span>
                                                        </label>
                                                        @error('anterior_crossbite')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4 text-md-center @error('overbite') has-error @enderror">
                                                    <img
                                                        src="{{ asset(config('constants.clinical_explorations.overbite.image')) }}"
                                                        alt="{{ config('constants.clinical_explorations.overbite.image') }}"
                                                        width="100px"
                                                    >
                                                    <br>
                                                    <label
                                                        for="overbite"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Overbite:
                                                    </label>

                                                    <div class="text-md-center">
                                                        <label class="m-r">
                                                            <input id="overbite_yes" name="overbite" type="radio" class="" value="1" required="" {{ old('overbite') == '1' ? 'checked' : '' }}>
                                                            <span>Yes</span>
                                                        </label>
                                                        <label class="m-r">
                                                            <input id="overbite_no" name="overbite" type="radio" class="" value="0" required="" {{ old('overbite') == '0' ? 'checked' : '' }}>
                                                            <span>No</span>
                                                        </label>
                                                        @error('overbite')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-6">

                                            <h2>Lingual position classification (Friedman Classification)</h2>
                                            <br>

                                            <div class="row form-group @error('total_visibility_of_tonsils_uvula_soft_palate') has-error @enderror">
                                                <div class="col-md-6 text-md-center">
                                                    <img
                                                        src="{{ asset(config('constants.clinical_explorations.total_visibility_of_tonsils_uvula_soft_palate.image')) }}"
                                                        alt="{{ config('constants.clinical_explorations.total_visibility_of_tonsils_uvula_soft_palate.image') }}"
                                                        width="100px"
                                                    >
                                                    <br>
                                                    <label
                                                        for="total_visibility_of_tonsils_uvula_soft_palate"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Total visibility of tonsils, uvula and soft palate:
                                                    </label>

                                                    <div class="text-md-center">
                                                        <label class="m-r">
                                                            <input id="total_visibility_of_tonsils_uvula_soft_palate_yes" name="total_visibility_of_tonsils_uvula_soft_palate" type="radio" class="" value="1" required="" {{ old('total_visibility_of_tonsils_uvula_soft_palate') == '1' ? 'checked' : '' }}>
                                                            <span>Yes</span>
                                                        </label>
                                                        <label class="m-r">
                                                            <input id="total_visibility_of_tonsils_uvula_soft_palate_no" name="total_visibility_of_tonsils_uvula_soft_palate" type="radio" class="" value="0" required="" {{ old('total_visibility_of_tonsils_uvula_soft_palate') == '0' ? 'checked' : '' }}>
                                                            <span>No</span>
                                                        </label>
                                                        @error('total_visibility_of_tonsils_uvula_soft_palate')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6 text-md-center @error('hard_and_soft_palate_visibility') has-error @enderror">
                                                    <img
                                                        src="{{ asset(config('constants.clinical_explorations.hard_and_soft_palate_visibility.image')) }}"
                                                        alt="{{ config('constants.clinical_explorations.hard_and_soft_palate_visibility.image') }}"
                                                        width="100px"
                                                    >
                                                    <br>
                                                    <label
                                                        for="hard_and_soft_palate_visibility"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Visibility of hard and soft palate, upper portionof tonsils and uvula:
                                                    </label>

                                                    <div class="text-md-center">
                                                        <label class="m-r">
                                                            <input id="hard_and_soft_palate_visibility_yes" name="hard_and_soft_palate_visibility" type="radio" class="" value="1" required="" {{ old('hard_and_soft_palate_visibility') == '1' ? 'checked' : '' }}>
                                                            <span>Yes</span>
                                                        </label>
                                                        <label class="m-r">
                                                            <input id="hard_and_soft_palate_visibility_no" name="hard_and_soft_palate_visibility" type="radio" class="" value="0" required="" {{ old('hard_and_soft_palate_visibility') == '1' ? 'checked' : '' }}>
                                                            <span>No</span>
                                                        </label>
                                                        @error('hard_and_soft_palate_visibility_no')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <br>
                                                </div>

                                                <div class="col-md-6 text-md-center @error('sleepiness_during_day') has-error @enderror">
                                                    <img
                                                        src="{{ asset(config('constants.clinical_explorations.hard_and_palate_and_part_of_soft_palate_visibility.image')) }}"
                                                        alt="{{ config('constants.clinical_explorations.hard_and_palate_and_part_of_soft_palate_visibility.image') }}"
                                                        width="100px"
                                                    >
                                                    <br>
                                                    <label
                                                        for="hard_and_palate_and_part_of_soft_palate_visibility"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Visibility of hard palate and part of soft palate above the uvula:
                                                    </label>

                                                    <div class="text-md-center">
                                                        <label class="m-r">
                                                            <input id="hard_and_palate_and_part_of_soft_palate_visibility_yes" name="hard_and_palate_and_part_of_soft_palate_visibility" type="radio" class="" value="1" required="" {{ old('hard_and_palate_and_part_of_soft_palate_visibility') == '1' ? 'checked' : '' }}>
                                                            <span>Yes</span>
                                                        </label>
                                                        <label class="m-r">
                                                            <input id="hard_and_palate_and_part_of_soft_palate_visibility_no" name="hard_and_palate_and_part_of_soft_palate_visibility" type="radio" class="" value="0" required="" {{ old('hard_and_palate_and_part_of_soft_palate_visibility') == '0' ? 'checked' : '' }}>
                                                            <span>No</span>
                                                        </label>
                                                        @error('hard_and_palate_and_part_of_soft_palate_visibility')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6 text-md-center @error('only_hard_palate_visibility') has-error @enderror">
                                                    <img
                                                        src="{{ asset(config('constants.clinical_explorations.only_hard_palate_visibility.image')) }}"
                                                        alt="{{ config('constants.clinical_explorations.only_hard_palate_visibility.image') }}"
                                                        width="100px"
                                                    >
                                                    <br>
                                                    <label
                                                        for="only_hard_palate_visibility"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Visibility only of hard palate:
                                                    </label>

                                                    <div class="text-md-center">
                                                        <label class="m-r">
                                                            <input id="only_hard_palate_visibility_yes" name="only_hard_palate_visibility" type="radio" class="" value="1" required="" {{ old('only_hard_palate_visibility') == '1' ? 'checked' : '' }}>
                                                            <span>Yes</span>
                                                        </label>
                                                        <label class="m-r">
                                                            <input id="only_hard_palate_visibility_no" name="only_hard_palate_visibility" type="radio" class="" value="0" required="" {{ old('only_hard_palate_visibility') == '0' ? 'checked' : '' }}>
                                                            <span>No</span>
                                                        </label>
                                                        @error('only_hard_palate_visibility')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="row form-group @error('assessment_observation') has-error @enderror">
                                                <div class="col-md-12">
                                                    <label
                                                        for="assessment_observation"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Assessment:
                                                    </label>
                                                    <textarea name="assessment_observation" id="assessment_observation" class="form-control" rows="10" value="{{old('assessment_observation')}}"></textarea>
                                                </div>
                                                @error('assessment_observation')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                 @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row form-group text-right">
                                        <a
                                            href="{{ route('dashboard.assessment.create.step', ['patient' => $patient, 'step' => 'step2']) }}"
                                            class="btn btn-default m-r"
                                        >
                                            Back
                                        </a>
                                        <button
                                            id="button_step3"
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
    <script>
        $(document).ready(function(){
            let bmiInput = $('#bmi')

            let heightInput = $('#height')
            let weightInput = $('#weight')

            heightInput.on('keyup', function () {
                let w = weightInput.val()
                let h = $(this).val()

                let options = ['', 0];

                if (options.includes(h) || options.includes(w)) {
                    bmiInput.val(0);

                    return;
                }

                let bmi = calculateBmi(w, h)

                bmiInput.val(bmi)


            });

            weightInput.on('keyup', function () {
                let h = heightInput.val()
                let w = $(this).val()

                let options = ['', 0];

                if (options.includes(h) || options.includes(w)) {
                    bmiInput.val(0);

                    return;
                }

                let bmi = calculateBmi(w, h)

                bmiInput.val(bmi)
            });
        });

        function calculateBmi(w, h) {
            // calculate bmi
            let height = h;
            let weight = w;

            // feet to meter
            height = parseFloat(height) * parseFloat({{ config('constants.si_units.foot_to_meter') }})

            // lb to kg
            weight = parseFloat(weight) * parseFloat({{ config('constants.si_units.lbs_to_kgs') }})

            let bmi = weight / (height * height)

            return parseFloat(bmi).toFixed(2)
        }
    </script>
@endsection



