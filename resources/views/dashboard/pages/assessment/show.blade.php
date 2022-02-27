@extends('dashboard.layout.app')

@section('stylesheets')
    <style>
        .report-table {
            width: 100%;
        }

        .report-table-td {
            width: 50%;
        }

        .no-data {
            padding: 10vh;
        }
    </style>
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
                        <h5>{{ $page }}</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">

                                <h2 class="text-center">Symptoms</h2>

                                @if(is_null($symptom ?? null))
                                    <div class="no-data text-center">
                                        <i class="fa fa-ban fa-5x fa-fw"></i>
                                    </div>
                                @else
                                    <div class="table-responsive">
                                        <table class="table-condensed" width="100%">
                                            <tbody>
                                            <tr>
                                                <td width="60">
                                                    <b>
                                                        Snoring:
                                                    </b>
                                                </td>
                                                <td width="40" class="text-right">
                                                    {{ config('constants.bool.'.$symptom->snore, 'null') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        Apnea:
                                                    </b>
                                                </td>
                                                <td class="text-right">
                                                    {{ config('constants.bool.'.$symptom->apnea, 'null') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        Shortness of Breath while sleeping:
                                                    </b>
                                                </td>
                                                <td class="text-right">
                                                    {{ config('constants.bool.'.$symptom->breathing_shortness, 'null') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        Average sleep duration (hours):
                                                    </b>
                                                </td>
                                                <td class="text-right">
                                                    {{ $symptom->average_sleep }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        Fragmented Sleep:
                                                    </b>
                                                </td>
                                                <td class="text-right">
                                                    {{ config('constants.bool.'.$symptom->fragmented_sleep, 'null') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        Nocturia:
                                                    </b>
                                                </td>
                                                <td class="text-right">
                                                    {{ config('constants.bool.'.$symptom->nocturia, 'null') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        Tired during the day:
                                                    </b>
                                                </td>
                                                <td class="text-right">
                                                    {{ config('constants.bool.'.$symptom->tired_during_day, 'null') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        Headache in the mornings:
                                                    </b>
                                                </td>
                                                <td class="text-right">{{ config('constants.bool.'.$symptom->morning_headache, 'null') }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        Do you nap?
                                                    </b>
                                                </td>
                                                <td class="text-right">
                                                    {{ config('constants.bool.'.$symptom->nap, 'null') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        Sleepiness during the day:
                                                    </b>
                                                </td>
                                                <td class="text-right">
                                                    {{ config('constants.bool.'.$symptom->sleepiness_during_day, 'null') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        Loss of concentration:
                                                    </b>
                                                </td>
                                                <td class="text-right">
                                                    {{ config('constants.bool.'.$symptom->loss_of_concentration, 'null') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        Snoring experienced during the night:
                                                    </b>
                                                </td>
                                                <td class="text-right">
                                                    {{ $symptom->night_snoring_experience }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>While Sitting and Reading:</b></td>
                                                <td class="text-right">{{ ucfirst($sleepinessScale->while_sitting_and_reading) }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        While Watching Television:
                                                    </b>
                                                </td>
                                                <td class="text-right">
                                                    {{ ucfirst($sleepinessScale->while_watching_television) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        While Inactive in Public Place:
                                                    </b>
                                                </td>
                                                <td class="text-right">
                                                    {{ ucfirst($sleepinessScale->while_inactive_in_public_place) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        While Travelling:
                                                    </b>
                                                </td>
                                                <td class="text-right">
                                                    {{ ucfirst($sleepinessScale->while_travelling) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        While Laying Down in Afternoon:
                                                    </b>
                                                </td>
                                                <td class="text-right">
                                                    {{ ucfirst($sleepinessScale->while_laying_down_in_afternoon) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        While Talking:
                                                    </b>
                                                </td>
                                                <td class="text-right">
                                                    {{ ucfirst($sleepinessScale->while_talking) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        While Sitting After Lunch:
                                                    </b>
                                                </td>
                                                <td class="text-right">
                                                    {{ ucfirst($sleepinessScale->while_sitting_after_lunch) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <b>
                                                        While Driving:
                                                    </b>
                                                </td>
                                                <td class="text-right">
                                                    {{ ucfirst($sleepinessScale->while_driving) }}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{ $page }}</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">

                                <h2 class="text-center">Medical History</h2>

                                @if(is_null($medicalHistory ?? null))
                                    <div class="no-data text-center">
                                        <i class="fa fa-ban fa-5x fa-fw"></i>
                                    </div>
                                @else
                                    <div class="table-responsive">
                                        <table class="table-condensed" width="100%">
                                            <tbody>
                                                <tr>
                                                    <th width="60">
                                                        Smoker:
                                                    </th>
                                                    <td width="40" class="text-right">
                                                        {{ config('constants.bool.'.$medicalHistory->smoker, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Drinks alcohol with dinner or before:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$medicalHistory->alcohol_with_dinner, 'null') }}
                                                    </td>
                                                </tr>
                                                @if($medicalHistory->alcohol_with_dinner)
                                                <tr>
                                                    <td>
                                                        <b>
                                                            How many days/week do you have 1 drink or more?
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $medicalHistory->alcohol_with_dinner_quantity }}
                                                    </td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td>
                                                        <b>
                                                            High Blood Pressure:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$medicalHistory->high_blood_pressure, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Myocardical Infraction:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$medicalHistory->myocardial_infarction, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Coronary Artery Disease:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$medicalHistory->coronary_artery_disease, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Arrythmia:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$medicalHistory->arrhythmia, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Heart Failure:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$medicalHistory->heart_failure, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Diabetes:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$medicalHistory->diabetes, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Depression:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$medicalHistory->depression, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Dementia:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$medicalHistory->dementia, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Stroke:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$medicalHistory->stroke, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Lung Disease:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$medicalHistory->lung_disease, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Hypothroidism:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$medicalHistory->hypothyroidism, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Other Diseases:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $medicalHistory->other_medical_history }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Anxiolytics:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$medicalHistory->anxiolytics, 'null') }}
                                                    </td>
                                                </tr>
                                                @if($medicalHistory->anxiolytics)
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Anxiolytics:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $medicalHistory->anxiolytics_value }}
                                                    </td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Antidepressants:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$medicalHistory->antidepressants, 'null') }}
                                                    </td>
                                                </tr>
                                                @if($medicalHistory->antidepressants)
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Antidepressants:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $medicalHistory->antidepressants_value }}
                                                    </td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Other medication to help induce sleep:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$medicalHistory->induce_sleep_medication, 'null') }}
                                                    </td>
                                                </tr>
                                                @if($medicalHistory->induce_sleep_medication)
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Other medication to help induce sleep:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $medicalHistory->induce_sleep_medication_value }}
                                                    </td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Other medications:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$medicalHistory->other_medications, 'null') }}
                                                    </td>
                                                </tr>
                                                @if($medicalHistory->other_medications)
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Other medications:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $medicalHistory->other_medications_value }}
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{ $page }}</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">

                                <h2 class="text-center">Clinical Eploration</h2>

                                @if(is_null($clinicalExploration ?? null))
                                    <div class="no-data text-center">
                                        <i class="fa fa-ban fa-5x fa-fw"></i>
                                    </div>
                                @else
                                    <div class="table-responsive">
                                        <table class="table-condensed" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td width="60">
                                                        <b>
                                                            CPAP:
                                                        </b>
                                                    </td>
                                                    <td width="40" class="text-right">
                                                        {{ config('constants.bool.'.$clinicalExploration->cpap, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Mundibular Advancement device:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$clinicalExploration->mandibular_advancement_device, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Positional Therapy:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$clinicalExploration->positional_therapy, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Upper Airway surgery:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$clinicalExploration->upper_airway_surgery, 'null') }}
                                                    </td>
                                                </tr>
                                                @if($clinicalExploration->upper_airway_surgery)
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Upper Airway surgery:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $clinicalExploration->upper_airway_surgery_value }}
                                                    </td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Other upper airway surgery:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $clinicalExploration->other_upper_airway_surgery }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Bariatric surgery (Weight-loss surgery)
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$clinicalExploration->bariatric_surgery, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Other treatments for sleep apnea or snorting:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                       {{ $clinicalExploration->other_treatments_for_sleep_apnea }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Bariatric surgery (Weight-loss surgery)
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$clinicalExploration->bariatric_surgery, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Signs of Bruxism:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$clinicalExploration->bruxism, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Pointed hard palate:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$clinicalExploration->pointed_hard_palade, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Noise when moving the TMJ:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$clinicalExploration->tmj_noise, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            TMJ pain when mouth is open for one minute:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$clinicalExploration->tmj_pain, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Bilateral Crossbite:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$clinicalExploration->bilateral_crossbite, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Lateral Crossbite:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ config('constants.bool.'.$clinicalExploration->lateral_crossbite, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Height ({{ $clinicalExploration->height_unit }}):
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $clinicalExploration->height }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Weight ({{ $clinicalExploration->weight_unit }}):
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $clinicalExploration->weight }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Body Mass Index (BMI):
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $clinicalExploration->bmi }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Neck circumference (cm):
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $clinicalExploration->neck_circumference }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Mallampati Classification:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $clinicalExploration->mallampati_classification }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Tonsil Classification:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $clinicalExploration->tonsil_classification }}
                                                    </td>
                                                </tr>
                                                {{--<tr>
                                                    <td>
                                                        <b>
                                                            Normognathic:
                                                        </b>
                                                    </td>
                                                    <td>
                                                        {{ config('constants.bool.'.$clinicalExploration->normognathic, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Retrognathic:
                                                        </b>
                                                    </td>
                                                    <td>
                                                        {{ config('constants.bool.'.$clinicalExploration->retrognathic, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Prognathic:
                                                        </b>
                                                    </td>
                                                    <td>
                                                        {{ config('constants.bool.'.$clinicalExploration->prognathic, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Edge to edge bite:
                                                        </b>
                                                    </td>
                                                    <td>
                                                        {{ config('constants.bool.'.$clinicalExploration->edge_to_edge_bite, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Anterior crossbite:
                                                        </b>
                                                    </td>
                                                    <td>
                                                        {{ config('constants.bool.'.$clinicalExploration->anterior_crossbite, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Overbite:
                                                        </b>
                                                    </td>
                                                    <td>
                                                        {{ config('constants.bool.'.$clinicalExploration->overbite, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Total visibility of tonsils, uvula and soft palate:
                                                        </b>
                                                    </td>
                                                    <td>
                                                        {{ config('constants.bool.'.$clinicalExploration->total_visibility_of_tonsils_uvula_soft_palate, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Visibility of hard and soft palate, upper portionof tonsils and uvula:
                                                        </b>
                                                    </td>
                                                    <td>
                                                        {{ config('constants.bool.'.$clinicalExploration->hard_and_soft_palate_visibility, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Visibility of hard palate and part of soft palate above the uvula:
                                                        </b>
                                                    </td>
                                                    <td>
                                                        {{ config('constants.bool.'.$clinicalExploration->hard_and_palate_and_part_of_soft_palate_visibility, 'null') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Visibility only of hard palate:
                                                        </b>
                                                    </td>
                                                    <td>
                                                        {{ config('constants.bool.'.$clinicalExploration->only_hard_palate_visibility, 'null') }}
                                                    </td>
                                                </tr>--}}
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{ $page }}</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">

                                <h2 class="text-center">Diagnostic Tests</h2>

                                @if(is_null($diagnosticTest ?? null))
                                    <div class="no-data text-center">
                                        <i class="fa fa-ban fa-5x fa-fw"></i>
                                    </div>
                                @else
                                    <div class="table-responsive">
                                        <table class="table-condensed" width="100%">
                                            <tbody>
                                                @if(0)
                                                    {{--<tr>
                                                        <td width="60">
                                                            <b>
                                                                AHI:
                                                            </b>
                                                        </td>
                                                        <td width="40" class="text-right">
                                                            {{ $diagnosticTest->ahi }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <b>
                                                                RDI:
                                                            </b>
                                                        </td>
                                                        <td class="text-right">
                                                            {{ $diagnosticTest->rdi }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <b>
                                                                NADIR:
                                                            </b>
                                                        </td>
                                                        <td class="text-right">
                                                            {{ $diagnosticTest->nadir }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <b>
                                                                ODI:
                                                            </b>
                                                        </td>
                                                        <td class="text-right">
                                                            {{ $diagnosticTest->odi }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <b>
                                                                Average duration of apnea (sec):
                                                            </b>
                                                        </td>
                                                        <td class="text-right">
                                                            {{ $diagnosticTest->avg_duration_of_apnea }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <b>
                                                                Maximum duration of apnea(sec):
                                                            </b>
                                                        </td>
                                                        <td class="text-right">
                                                            {{ $diagnosticTest->max_duration_of_apnea }}
                                                        </td>
                                                    </tr>--}}
                                                @endif
                                                <tr>
                                                    <td>
                                                        <b>
                                                            Assessment Observation
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $diagnosticTest->assessments_observation }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{ $page }}</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">

                                <h2 class="text-center">Files / Images / Reports</h2>

                                @if(empty($assessmentLinks ?? []))
                                    <div class="no-data text-center">
                                        <i class="fa fa-ban fa-5x fa-fw"></i>
                                    </div>
                                @else
                                    <div class="table-responsive">
                                        <table class="table-condensed" width="100%">
                                            <tbody>
                                            <tr>
                                                <th width="60">
                                                    CBCT:
                                                </th>
                                                <td width="40" class="text-right">
                                                    @foreach($assessmentLinks ?? [] as $cbct)
                                                        <a
                                                            href="{{ $cbct->link }}"
                                                            target="_blank"
                                                        >
                                                            <i class="fa fa-file fa-fw fa-1x"></i>
                                                        </a>
                                                    @endforeach
                                                </td>
                                            </tr>

                                            <tr>
                                                <th width="60">
                                                    Photos:
                                                </th>
                                                <td width="40" class="text-right">
                                                    @foreach($assessment->media->where('collection_name', '=', 'photo') as $photo)
                                                        <a
                                                            href="{{ $photo->getUrl() }}"
                                                            target="_blank"
                                                        >
                                                            <i class="fa fa-file fa-fw fa-1x"></i>
                                                        </a>
                                                    @endforeach
                                                </td>
                                            </tr>

                                            <tr>
                                                <th width="60">
                                                    X-Ray:
                                                </th>
                                                <td width="40" class="text-right">
                                                    @foreach($assessment->media->where('collection_name', '=', 'xray') as $xray)
                                                        <a
                                                            href="{{ $xray->getUrl() }}"
                                                            target="_blank"
                                                        >
                                                            <i class="fa fa-file fa-fw fa-1x"></i>
                                                        </a>
                                                    @endforeach
                                                </td>
                                            </tr>

                                            <tr>
                                                <th width="60">
                                                    Sleep Study:
                                                </th>
                                                <td width="40" class="text-right">
                                                    @foreach($assessment->media->where('collection_name', '=', 'sleep_study') as $sleepStudy)
                                                        <a
                                                            href="{{ $sleepStudy->getUrl() }}"
                                                            target="_blank"
                                                        >
                                                            <i class="fa fa-file fa-fw fa-1x"></i>
                                                        </a>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
