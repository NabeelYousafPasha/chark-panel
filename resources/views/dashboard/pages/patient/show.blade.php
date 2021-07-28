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
                                <a
                                    title="{{ 'View PDF' }}"
                                    class="btn btn-info btn-xs"
                                    href="{{ is_null($pdfReport->id ?? null) ? 'javascript:void(0)' : asset('reports/pdf/'.$pdfReport->file_name) }}"
                                    {{ is_null($pdfReport->id ?? null) ? '' : 'target="_blank"' }}
                                    {{ is_null($pdfReport->id ?? null) ? 'disabled' : '' }}
                                >
                                    <i class="fa fa-file-pdf-o fa-fw" aria-hidden="true"></i>
                                    View PDF
                                </a>
                                <a
                                    title="{{ 'Sync / Generate PDF' }}"
                                    class="btn btn-success btn-xs"
                                    href="{{ route('dashboard.patients.report', $patientInformation) }}"
                                >
                                    <i class="fa fa-refresh fa-fw" aria-hidden="true"></i>
                                    Sync / Generate PDF
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h3>Patient Information</h3>
                                <table class="table table-condensed">
                                    <tbody>
                                        <tr>
                                            <td>Full Name</td>
                                            <td class="text-right">{{ $patientInformation->full_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Birthdate</td>
                                            <td class="text-right">{{ $patientInformation->dob }}</td>
                                        </tr>
                                        <tr>
                                            <td>Age</td>
                                            <td class="text-right">{{ $patientInformation->age_via_dob->format('%y years, %m months and %d days') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td class="text-right">{{ ucfirst($patientInformation->gender) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Height</td>
                                            <td class="text-right">{{ $patientInformation->height }}</td>
                                        </tr>
                                        <tr>
                                            <td>Weight</td>
                                            <td class="text-right">{{ $patientInformation->weight }}</td>
                                        </tr>
                                        <tr>
                                            <td>BMI</td>
                                            <td class="text-right">{{ round($patientInformation->bmi, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Neck Size</td>
                                            <td class="text-right">{{ round($patientInformation->neck_size, 2) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-12">
                                <h3>Sleep Exam</h3>
                                <table class="table table-condensed">
                                    <tbody>
                                    <tr>
                                        <td>Snore?</td>
                                        <td class="text-right">{{ humanDiffBoolen($patientInformation->sleep_exam->snore) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Feel Tired, Fatigued or Sleepy during the daytime?</td>
                                        <td class="text-right">{{ humanDiffBoolen($patientInformation->sleep_exam->tired) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Anyone observed Stop Breathing during sleep?</td>
                                        <td class="text-right">{{ humanDiffBoolen($patientInformation->sleep_exam->stop_breathing) }}</td>
                                    </tr>
                                    <tr>
                                        <td>High Blood Pressure?</td>
                                        <td class="text-right">{{ humanDiffBoolen($patientInformation->sleep_exam->high_blood_pressure) }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-12">
                                <h3>Medical History</h3>
                                <table class="table table-condensed">
                                    <tbody>
                                    <tr>
                                        <td>Insomnia?</td>
                                        <td class="text-right">{{ humanDiffBoolen($patientInformation->medical_history->insomnia) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Blood Pressure?</td>
                                        <td class="text-right">{{ humanDiffBoolen($patientInformation->medical_history->blood_pressure) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Stroke?</td>
                                        <td class="text-right">{{ humanDiffBoolen($patientInformation->medical_history->stroke) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Heart Attack?</td>
                                        <td class="text-right">{{ humanDiffBoolen($patientInformation->medical_history->heart_attack) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Atrial Fibrillation?</td>
                                        <td class="text-right">{{ humanDiffBoolen($patientInformation->medical_history->atrial_fibrillation) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Diabetes?</td>
                                        <td class="text-right">{{ humanDiffBoolen($patientInformation->medical_history->diabetes) }}</td>
                                    </tr>
                                    <tr>
                                        <td>GERD (Gastric Reflux)?</td>
                                        <td class="text-right">{{ humanDiffBoolen($patientInformation->medical_history->gerd) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Depression / Anxiety?</td>
                                        <td class="text-right">{{ humanDiffBoolen($patientInformation->medical_history->anxiety) }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>


                            <div class="col-md-12">
                                <h3>Dental Exam</h3>
                                <table class="table table-condensed">
                                    <tbody>
                                    <tr>
                                        <td>Scalloped Tongue?</td>
                                        <td class="text-right">{{ humanDiffBoolen($patientInformation->dental_exam->scalloped_tongue) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bruxism?</td>
                                        <td class="text-right">{{ humanDiffBoolen($patientInformation->dental_exam->bruxism) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tooth Wear?</td>
                                        <td class="text-right">{{ humanDiffBoolen($patientInformation->dental_exam->tooth_wear) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Mallampati Classification?</td>
                                        <td class="text-right">
                                            <img
                                                src="{{ asset('frontend-assets/images/'.$patientInformation->dental_exam->mallampati_classification.'.png') }}"
                                                alt="{{ $patientInformation->dental_exam->mallampati_classification }}"
                                                class="img-fluid"
                                                width="100px"
                                            >
                                            {{ $patientInformation->dental_exam->mallampati_classification }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tonsil Classification?</td>
                                        <td class="text-right">
                                            <img
                                                src="{{ asset('frontend-assets/images/'.$patientInformation->dental_exam->tonsil_classification.'.png') }}"
                                                alt="{{ $patientInformation->dental_exam->tonsil_classification }}"
                                                class="img-fluid"
                                                width="100px"
                                            >
                                            {{ $patientInformation->dental_exam->tonsil_classification }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
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
