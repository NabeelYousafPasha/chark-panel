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

                        <!-- MultiStep Form -->
                        <div class="row">
                            <div class="col-md-12">
                                <form id="msform">
                                    @csrf
                                    <fieldset>
                                        <form action="">
                                            <div class="row">
                                                <div class="col-md-6">
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
                                                                Mundibular Advancement:
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
                                                                Mundibular Advancement:
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
                                                            <label class="m-r">
                                                                <input type="checkbox" class="form-check-input" name="upper_airway_surgery" id="upper_airway_surgery" required>
                                                                <span>Nasal</span>
                                                                <input type="checkbox" class="form-check-input" name="upper_airway_surgery" id="upper_airway_surgery" required>
                                                                <span>Palatal</span>
                                                            </label>
                                                            <label class="m-r">
                                                                <input type="checkbox" class="form-check-input" name="upper_airway_surgery" id="upper_airway_surgery" required>
                                                                <span>Lingual</span>
                                                                <input type="checkbox" class="form-check-input" name="upper_airway_surgery" id="upper_airway_surgery" required>
                                                                <span>Muscular Advancement</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
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
                                                                <label class="m-r">
                                                                    <input type="text" name="other_upper_airway_surgery" id="other_upper_airway_surgery">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <label
                                                                for="bariatric_surgery"
                                                                class="col-form-label text-md-left"
                                                            >
                                                                Bariatric surgery (Weightloss surgery)
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
                                                            <label class="m-r">
                                                                <input type="text" name="other_treatments_for_sleep_apnea" id="other_treatments_for_sleep_apnea">
                                                            </label>
                                                        </div>
                                                    </div>



                                                </div>
                                                <div class="col-md-6">
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
                                                            <label class="m-r">
                                                                <input type="text" name="height" id="height">
                                                            </label>
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
                                                            <label class="m-r">
                                                                <input type="text" name="weight" id="weight">
                                                            </label>
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
                                                            <label class="m-r">
                                                                <input type="text" name="bmi" id="bmi">
                                                            </label>
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
                                                            <label class="m-r">
                                                                <input type="text" name="neck_circumference" id="neck_circumference">
                                                            </label>
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
                                                            <label class="m-r">
                                                                <input type="text" name="beats_per_minute" id="beats_per_minute">
                                                            </label>
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
                                                            <label class="m-r">
                                                                <input type="text" name="systolic_blood_pressure" id="systolic_blood_pressure">
                                                            </label>
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
                                                            <label class="m-r">
                                                                <input type="text" name="diastolic_blood_pressure" id="diastolic_blood_pressure">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h3 class="fs-subtitle"></h3>
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
                                                    <h3 class="fs-subheading"> Mondular Morphology according to facial Profile</h3>
                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <label
                                                                for="normognaithic"
                                                                class="col-form-label text-md-left"
                                                            >
                                                                Normognathic:
                                                            </label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="m-r">
                                                                <input id="normognaithic_yes" name="normognaithic" type="radio" class="" value="1" required="">
                                                                <span>Yes</span>
                                                            </label>
                                                            <label class="m-r">
                                                                <input id="normognaithic_no" name="normognaithic" type="radio" class="" value="0" required="">
                                                                <span>No</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <label
                                                                for="retrognathico"
                                                                class="col-form-label text-md-left"
                                                            >
                                                                Retrognathic:
                                                            </label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="m-r">
                                                                <input id="retrognathico_yes" name="retrognathico" type="radio" class="" value="1" required="">
                                                                <span>Yes</span>
                                                            </label>
                                                            <label class="m-r">
                                                                <input id="retrognathico_no" name="retrognathico" type="radio" class="" value="0" required="">
                                                                <span>No</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <label
                                                                for="prognathic"
                                                                class="col-form-label text-md-left"
                                                            >
                                                                Prognathic:
                                                            </label>
                                                        </div>
                                                        <div class="col-md-6">
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

                                                    <h3 class="fs-subheading">Type of bite</h3>

                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <label
                                                                for="edge_to_edge_bite"
                                                                class="col-form-label text-md-left"
                                                            >
                                                                Edge to edge bite:
                                                            </label>
                                                        </div>
                                                        <div class="col-md-6">
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

                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <label
                                                                for="anterior_crossbite"
                                                                class="col-form-label text-md-left"
                                                            >
                                                                Anterior crossbite:
                                                            </label>
                                                        </div>
                                                        <div class="col-md-6">
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

                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <label
                                                                for="overbite"
                                                                class="col-form-label text-md-left"
                                                            >
                                                                Overbite:
                                                            </label>
                                                        </div>
                                                        <div class="col-md-6">
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
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-6">
                                                                    <label
                                                                        for="total_visibility_of_tonsils_uvula_soft_palate"
                                                                        class="col-form-label text-md-left"
                                                                    >
                                                                    I Total visibilty of tonsils, uvula, and soft palate::
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-6">
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
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-6">
                                                                    <label
                                                                        for="hard_and_soft_palate_visibility"
                                                                        class="col-form-label text-md-left"
                                                                    >
                                                                    II Total visibilty of hard and soft palate, upper portion of tonsils and uvula:
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-6">
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
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-6">
                                                                    <label
                                                                        for="hard_and_palate_and_part_of_soft_palate_visibility"
                                                                        class="col-form-label text-md-left"
                                                                    >
                                                                    III Total visibilty of hard palate and part of soft palate above the uvula:
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-6">
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
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row form-group">
                                                                <div class="col-md-6">
                                                                    <label
                                                                        for="only_hard_palate_visibility"
                                                                        class="col-form-label text-md-left"
                                                                    >
                                                                    IV Viibility of only hard palate:
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-6">
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
                                                            <div class="col-md-6">
                                                                <label
                                                                    for="other_medical_history"
                                                                    class="col-form-label text-md-left"
                                                                >
                                                                    Assessment:
                                                                </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="m-r">
                                                                    <textarea name="assessment_observation" id="assessment_observation" cols="25" rows="10"></textarea>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{route('dashboard.patients.create.step', ['step' => 'step4'])}}" class="btn btn-primary" type="submit">Step 4</a>
                                        </form> 
                                    </fieldset>
                                    
                                </form>
                                
                            </div>
                        </div>
                        <!-- /.MultiStep Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




