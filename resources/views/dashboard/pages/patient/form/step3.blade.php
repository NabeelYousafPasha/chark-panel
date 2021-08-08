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

                        @include('dashboard.pages.patient.form.progress', ['step' => 'step3',])

                        <div class="row">
                            <div class="col-md-12">

                                <form action="">

                                    <div class="row">
                                        <div class="col-md-6">

                                            <h2>Previous Treatments</h2>
                                            <br>

                                            <div class="row form-group">
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
                                                        <input id="cpap_yes" name="cpap" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="cpap_no" name="cpap" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row form-group">
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
                                                        <input id="mandibular_advancement_device_yes" name="mandibular_advancement_device" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="mandibular_advancement_device_no" name="mandibular_advancement_device" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row form-group">
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
                                                        <input id="positional_therapy_yes" name="positional_therapy" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="positional_therapy_no" name="positional_therapy" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row form-group">
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
                                                                name="upper_airway_surgery"
                                                                id="upper_airway_surgery_{{ $upperAirwaySurgeryKey }}"
                                                                class=""
                                                                required
                                                            >
                                                            <span>{{ $upperAirwaySurgery }}</span>
                                                        </label>
                                                        <br>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="row form-group">
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
                                                        required
                                                    >
                                                </div>
                                            </div>

                                            <div class="row form-group">
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
                                                        <input id="bariatric_surgery_yes" name="bariatric_surgery" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="bariatric_surgery_no" name="bariatric_surgery" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row form-group">
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
                                                            required
                                                        >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <h2>Physical Exam</h2>
                                            <br>

                                            <div class="row form-group">
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
                                                        required
                                                    >
                                                </div>
                                            </div>
                                            <div class="row form-group">
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
                                                        required
                                                    >
                                                </div>
                                            </div>
                                            <div class="row form-group">
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
                                                    >
                                                </div>
                                            </div>
                                            <div class="row form-group">
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
                                                        required
                                                    >
                                                </div>
                                            </div>
                                            <div class="row form-group">
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
                                                        required
                                                    >
                                                </div>
                                            </div>
                                            <div class="row form-group">
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
                                                        required
                                                    >
                                                </div>
                                            </div>
                                            <div class="row form-group">
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
                                                        required
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <h2>Oral Exam</h2>
                                            <br>

                                            <div class="row form-group">
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
                                                        <input id="bruxism_yes" name="bruxism" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="bruxism_no" name="bruxism" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row form-group">
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
                                                        <input id="pointed_hard_palade_yes" name="pointed_hard_palade" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="pointed_hard_palade_no" name="pointed_hard_palade" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row form-group">
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
                                                        <input id="tmj_noise_yes" name="tmj_noise" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="tmj_noise_no" name="tmj_noise" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row form-group">
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
                                                        <input id="tmj_pain_yes" name="tmj_pain" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="tmj_pain_no" name="tmj_pain" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row form-group">
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
                                                        <input id="bilateral_crossbite_yes" name="bilateral_crossbite" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="bilateral_crossbite_no" name="bilateral_crossbite" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row form-group">
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
                                                        <input id="lateral_crossbite_yes" name="lateral_crossbite" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="lateral_crossbite_no" name="lateral_crossbite" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <h2>Mondular Morphology according to facial profile</h2>
                                            <br>

                                            <div class="row form-group">
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
                                                            <input id="normognathic_yes" name="normognathic" type="radio" class="" value="1" required="">
                                                            <span>Yes</span>
                                                        </label>
                                                        <label class="m-r">
                                                            <input id="normognathic_no" name="normognathic" type="radio" class="" value="0" required="">
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 text-md-center">
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
                                                            <input id="retrognathic_yes" name="retrognathic" type="radio" class="" value="1" required="">
                                                            <span>Yes</span>
                                                        </label>
                                                        <label class="m-r">
                                                            <input id="retrognathic_no" name="retrognathic" type="radio" class="" value="0" required="">
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 text-md-center">
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
                                                            <input id="prognathic_yes" name="prognathic" type="radio" class="" value="1" required="">
                                                            <span>Yes</span>
                                                        </label>
                                                        <label class="m-r">
                                                            <input id="prognathic_no" name="prognathic" type="radio" class="" value="0" required="">
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <br>
                                            <h2>Type of bite</h2>
                                            <br>

                                            <div class="row form-group">
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
                                                            <input id="edge_to_edge_bite_yes" name="edge_to_edge_bite" type="radio" class="" value="1" required="">
                                                            <span>Yes</span>
                                                        </label>
                                                        <label class="m-r">
                                                            <input id="edge_to_edge_bite_no" name="edge_to_edge_bite" type="radio" class="" value="0" required="">
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 text-md-center">
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
                                                            <input id="anterior_crossbite_yes" name="anterior_crossbite" type="radio" class="" value="1" required="">
                                                            <span>Yes</span>
                                                        </label>
                                                        <label class="m-r">
                                                            <input id="anterior_crossbite_no" name="anterior_crossbite" type="radio" class="" value="0" required="">
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 text-md-center">
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
                                                            <input id="overbite_yes" name="overbite" type="radio" class="" value="1" required="">
                                                            <span>Yes</span>
                                                        </label>
                                                        <label class="m-r">
                                                            <input id="overbite_no" name="overbite" type="radio" class="" value="0" required="">
                                                            <span>No</span>
                                                        </label>
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

                                            <div class="row form-group">
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
                                                            <input id="total_visibility_of_tonsils_uvula_soft_palate_yes" name="total_visibility_of_tonsils_uvula_soft_palate" type="radio" class="" value="1" required="">
                                                            <span>Yes</span>
                                                        </label>
                                                        <label class="m-r">
                                                            <input id="total_visibility_of_tonsils_uvula_soft_palate_no" name="total_visibility_of_tonsils_uvula_soft_palate" type="radio" class="" value="0" required="">
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 text-md-center">
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
                                                            <input id="hard_and_soft_palate_visibility_yes" name="hard_and_soft_palate_visibility" type="radio" class="" value="1" required="">
                                                            <span>Yes</span>
                                                        </label>
                                                        <label class="m-r">
                                                            <input id="hard_and_soft_palate_visibility_no" name="hard_and_soft_palate_visibility" type="radio" class="" value="0" required="">
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <br>
                                                </div>

                                                <div class="col-md-6 text-md-center">
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
                                                            <input id="hard_and_palate_and_part_of_soft_palate_visibility_yes" name="hard_and_palate_and_part_of_soft_palate_visibility" type="radio" class="" value="1" required="">
                                                            <span>Yes</span>
                                                        </label>
                                                        <label class="m-r">
                                                            <input id="hard_and_palate_and_part_of_soft_palate_visibility_no" name="hard_and_palate_and_part_of_soft_palate_visibility" type="radio" class="" value="0" required="">
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 text-md-center">
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
                                                            <input id="only_hard_palate_visibility_yes" name="only_hard_palate_visibility" type="radio" class="" value="1" required="">
                                                            <span>Yes</span>
                                                        </label>
                                                        <label class="m-r">
                                                            <input id="only_hard_palate_visibility_no" name="only_hard_palate_visibility" type="radio" class="" value="0" required="">
                                                            <span>No</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <label
                                                        for="assessment_observation"
                                                        class="col-form-label text-md-left"
                                                    >
                                                        Assessment:
                                                    </label>
                                                    <textarea name="assessment_observation" id="assessment_observation" class="form-control" rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row form-group text-right">
                                        <a
                                            href="{{route('dashboard.patients.create.step', ['step' => 'step2'])}}"
                                            class="btn btn-default m-r"
                                        >
                                            Back
                                        </a>
                                        <a
                                            href="{{route('dashboard.patients.create.step', ['step' => 'step4'])}}"
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




