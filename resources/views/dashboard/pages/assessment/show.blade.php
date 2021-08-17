@extends('dashboard.layout.app')

@section('stylesheets')
    <style>
        .report-table {
            width: 100%;
        }

        .report-table-td {
            width: 50%;
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

                                <div class="row">
                                    <div class="col-md-6">

                                        <h2>Step 1</h2>

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
                                                    <td class="text-right">{{ $sleepinessScale->while_sitting_and_reading }}</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            While Watching Television:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $sleepinessScale->while_watching_television }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            While Inactive in Public Place:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $sleepinessScale->while_inactive_in_public_place }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            While Travelling:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $sleepinessScale->while_travelling }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            While Laying Down in Afternoon:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $sleepinessScale->while_laying_down_in_afternoon }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            While Talking:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $sleepinessScale->while_talking }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            While Sitting After Lunch:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $sleepinessScale->while_sitting_after_lunch }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <b>
                                                            While Driving:
                                                        </b>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $sleepinessScale->while_driving }}
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <h2>Step 2</h2>

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
                                                            {{ $medicalHistory->anxiolytics }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <b>
                                                                Antidepressants:
                                                            </b>
                                                        </td>
                                                        <td class="text-right">
                                                            {{ $medicalHistory->antidepressants }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <b>
                                                                Other medication to help induce sleep:
                                                            </b>
                                                        </td>
                                                        <td class="text-right">
                                                            {{ $medicalHistory->induce_sleep_medication }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <b>
                                                                Other medications:
                                                            </b>
                                                        </td>
                                                        <td class="text-right">
                                                            {{ $medicalHistory->other_medications }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                        <br>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h2>Step 3</h2>
                                    </div>

                                    <div class="col-md-6">
                                        <h2>Step 4</h2>
                                    </div>
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
