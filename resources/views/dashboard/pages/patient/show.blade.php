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
                                <h3>Patient Details</h3>
                                <table class="table table-condensed">
                                    <tbody>
                                        <tr>
                                            <td>Full Name</td>
                                            <td class="text-right">{{ $patientInformation->alias }}</td>
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
                                            <td>Clinic</td>
                                            <td class="text-right">{{ $patientInformation->clinic->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Country</td>
                                            <td class="text-right">{{ $patientInformation->country_name }}</td>
                                        </tr>
                                        @if ($patientDetail)
                                        <tr>
                                            <td>Profession</td>
                                            <td class="text-right">{{ $patientDetail->profession }}</td>
                                        </tr>
                                        <tr>
                                            <td>Contact</td>
                                            <td class="text-right">{{ $patientDetail->contact }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td class="text-right">{{ $patientDetail->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Postal Code</td>
                                            <td class="text-right">{{ $patientDetail->postal_code }}</td>
                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td class="text-right">{{ $patientDetail->city }}</td>
                                        </tr>
                                        <tr>
                                            <td>Province</td>
                                            <td class="text-right">{{ $patientDetail->province }}</td>
                                        </tr>
                                        @endif
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
