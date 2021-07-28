@extends('layouts.app')

@section('meta')
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
@endsection

@section('stylesheets')
    <style>
        body {
            padding-top: 1cm;
            padding-bottom: 1cm;
        }

        .footer {
            position: fixed;
            bottom: 5%;
            display: block;
            left: 0;
            right: 0;
            text-align: center;
        }

        @page {
            margin-top: 1cm;
            margin-bottom: 1cm;
        }

        ul, li{
            line-height: 14px;
            font-size: 14px;
        }

        .pdf-para {
            line-height: 14px;
        }

        .dont-split {
            page-break-inside: auto;
        }
    </style>
@endsection

@section('content')
    @include('report.pdf.header')

    <main class="pt-2">
        <div class="report">
            <div class="row">
                <div class="col-md-12 text-center mt-3">
                    <h5>
                        Sleep Screening Report for
                        <u>
                            {{ $patientInformation->full_name }}
                        </u>
                    </h5>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 pt-3">
                        <p class="pdf-para">
                            Sleep & Airway Screening is an important part of interdisciplinary treatment
                            planning in dentistry. If left undiagnosed or untreated, it may impact the
                            prognosis & success of many dental treatments and the patient’s overall health
                            & wellbeing.
                        </p>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <h5>
                            Clinical Findings
                        </h5>
                        <p class="pdf-para">
                            According to the provided information, <b>{{ $patientInformation->full_name }}</b>
                            presents with and has history of the following OSA risk factors:
                        </p>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 dont-split">
                        <h5>Sleep</h5>
                        <ul>
                            @forelse(config('constants.report.sleep_exams') as $sleepColumn => $sleep)
                                @if(version_compare($sleepExam->$sleepColumn, $sleep['matching_value'], $sleep['condition']))
                                    <li>
                                        {{ $sleep['replace'] }}
                                    </li>
                                @endif
                            @empty
                                <li>
                                    No Data Found
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 dont-split">
                        <h5>Medical</h5>
                        <ul>
                        @forelse(config('constants.report.medical_histories') as $medicalColumn => $medical)
                            @if(version_compare($medicalHistory->$medicalColumn, $medical['matching_value'], $medical['condition']))
                                <li>
                                    {{ $medical['replace'] }}
                                </li>
                            @endif
                        @empty
                            <li>
                                No Data Found
                            </li>
                        @endforelse
                        </ul>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 dont-split">
                        <h5>Dental</h5>
                        <ul>
                        @forelse(config('constants.report.dental_exams') as $dentalColumn => $dental)
                            @if(version_compare($dentalExam->$dentalColumn, $dental['matching_value'], $dental['condition']))
                                <li>
                                    {{ $dental['replace'] }}
                                    @if ($dental['image'] ?? false)
                                        {{ $dentalExam->$dentalColumn }}
                                    @endif
                                </li>
                            @endif
                        @empty
                            <li>
                                No Data Found
                            </li>
                        @endforelse
                        </ul>

                        @foreach(config('constants.report.dental_exams') as $dentalColumn => $dental)
                            @if($dental['image'] ?? false)
                                @if(version_compare($dentalExam->$dentalColumn, $dental['matching_value'], $dental['condition']))
                                    <div style="float: left; width: 50%" align="center">
                                        <img
                                            src="{{ asset('frontend-assets'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$dentalExam->$dentalColumn.'.png' }}"
                                            alt="{{ $dentalExam->$dentalColumn }}"
                                            class="img-fluid"
                                            width="130px"
                                            height="130px"
                                        >
                                        <p class="text-center">
                                            {{ $dental['replace'] }}
                                            {{ $dentalExam->$dentalColumn }}
                                        </p>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 dont-split">
                        <h5>Clinical Impression</h5>
                        <p class="pdf-para">
                            @if ($patientInformation->score <= 2)
                                Based on the provided information, your patient does not appear to be at high
                                risk of Obstructive Sleep Apnea. However, please make sure proper craniofacial
                                & orthodontic evaluation is being completed. Compromised airway anatomy can
                                put patients at long-term risk of developing Sleep Disordered breathing (SDB).
                            @else
                                Please note based on the provided information, your patient has a moderate
                                to high risk of having Obstructive Sleep Apnea and other airway issues.
                            @endif
                        </p>

                        @if (version_compare($dentalExam->mallampati_classification,
                                config('constants.report.dental_exams.mallampati_classification.matching_value'),
                                config('constants.report.dental_exams.mallampati_classification.condition'))
                        )
                        <p class="pdf-para">
                            * Please note the presence of a high risk mallampati score of
                            {{ $dentalExam->mallampati_classification }} that may impact the patient’s airway & breathing
                            in the future.
                        </p>
                        @endif

                        @if (version_compare($dentalExam->tonsil_classification,
                                config('constants.report.dental_exams.tonsil_classification.matching_value'),
                                config('constants.report.dental_exams.tonsil_classification.condition'))
                        )
                        <p class="pdf-para">
                            * Please note the presence of a high risk tonsil grade of {{ $dentalExam->tonsil_classification }}
                            that may impact the patients airway & breathing in the future.
                        </p>
                        @endif

                        @if ($dentalExam->scalloped_tongue
                            || $dentalExam->bruxism
                            || $dentalExam->tooth_wear
                        )
                        <p class="pdf-para">
                            * Please note the presence of

                            @foreach(config('constants.report.dental_exams') as $dentalColumn => $dental)
                                @if (($dental['image'] ?? false) == false)
                                    @if(version_compare($dentalExam->$dentalColumn, $dental['matching_value'], $dental['condition']))
                                        {{ $dental['replace'] }},
                                    @endif
                                @endif
                            @endforeach

                            may be a sign of
                            compromised airway and possible SDB in the future.
                        </p>
                        @endif

                        <p class="pdf-para">
                            Further investigation is recommended.
                        </p>

                        <p class="pdf-para">
                            According to clinical research, if left untreated Obstructive Sleep Apnea can put
                            patients at higher risk for diabetes, stroke, heart-attack, cardiovascular events,
                            Alzheimer’s, dementia, and many more medical complications.
                            It can also impact a patient’s mental health and overall wellbeing.

                            <br>
                            In addition, untreated OSA can adversely impact the prognosis of many dental
                            treatments, such as restorative & orthodontic treatments and puts the patient at
                            higher risk of developing periodontal disease.
                        </p>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 dont-split">
                        <h5>Recommendations</h5>
                        <ol>
                            <li>
                                Complete the “comprehensive sleep & airway assessment” (including a Sleep test and/or
                                referral to a Sleep clinician for complete evaluation).
                            </li>

                            <li>
                                Discuss the findings with the patient and the impact of untreated OSA on their overall
                                health
                                [
                                Specific Co-morbidities:
                                @php
                                $medicalHistoryList = collect($medicalHistory->getRawOriginal())->except([
                                        'id', 'patient_information_id', 'created_by', 'deleted_at', 'created_at', 'updated_at'
                                    ])->toArray();
                                @endphp
                                @foreach($medicalHistoryList as $medicalKey => $medicalValue)
                                    @if(in_array(($medicalHistoryList[$medicalKey] ?? 0), [1, '1', true]))
                                        {{ str_replace('_', ' ', ucwords($medicalKey)) }},
                                    @endif
                                @endforeach
                                ]
                                and please share your findings with patients’ physician.
                            </li>

                            <li>
                                Consider the adverse impact of untreated OSA on prognosis of the potential dental
                                treatment being recommended and treatment plan accordingly.
                            </li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
    </main>

    @include('report.pdf.footer')
@endsection
