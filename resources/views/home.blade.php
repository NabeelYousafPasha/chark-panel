@extends('layouts.portal')

@section('stylesheets')
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />

    <style>
        .portal-container {
            /* Background Image */
            background-image: url("{{ asset('frontend-assets/images/bg-signup.jpg') }}");
            /* Full height */
            height: 60vh;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.7);
        }

        .portal-text-overlay {
            background-color: rgba(255, 255, 255, 0.4);
        }

        .portal-text-p {
            line-height: 3vh;
        }

        .tab-pane {
            width: 100% !important;
            padding: 15px;
        }

        .tab-content {
            height: auto !important;
        }



        @media only screen and (max-width: 768px) {
            .sw {
                position: relative;
                display: inline-block;
                width: 100%;
            }

            .sw > .nav {
                flex-direction: column !important;
                flex: 1 auto;
                width: 30%;
                float: left;
            }

            .sw > .tab-content {
                position: relative;
                overflow: hidden;
                width: 70%;
                float: left;
            }
        }

        .input-hidden {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        label > input[type=radio]:checked + img {
            border: 1px solid #fff;
            box-shadow: 0 0 1px 2px #FF5959;
        }

        .mallampati-image {
            width: 90px;
            height: 80px;
        }

        .tonsil-image {
            width: 100px;
        }

        .sw-theme-dots .toolbar > .btn {
            background-color: #FF5959;
        }

        .sw-theme-dots >.nav .nav-link.active {
            color: #FF5959 !important;
        }

        .sw-theme-dots >.nav .nav-link.active::after {
            background-color: #FF5959 !important;
        }

        .sw-theme-dots>.nav .nav-link.done {
            color: #FF5959;
            opacity: 0.9;
        }

        .sw-theme-dots>.nav .nav-link.done::after {
            background-color: #FF5959;
        }
    </style>
@endsection

@section('content')
<div class="container-fluid portal-container d-flex">
    <div class="row pt-5 align-self-center">
        <div class="col-md-2"></div>
        <div class="col-md-6 text-center portal-text-overlay p-3 m-2">
            <h4 class="portal-text-h4">
                Sleep & Airway Risk Assessment
            </h4>
            <p class="portal-text-p">
                * ADA recommends assessing patient risk for sleep breathing
                disorders as part of a comprehensive medical and dental history.
            </p>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<br>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-sm-12"></div>
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <section>
                        <form
                            id="sleep-test--form"
                            method="POST"
                            action="{{ route('sleep-test.store') }}"
                        >
                            @csrf
                        <div id="smartwizard" class="shadow-lg p-3 mb-5 rounded">
                            <ul class="nav">
                                <li>
                                    <a class="nav-link" href="#step-1">
                                        Step 1
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#step-2">
                                        Step 2
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#step-3">
                                        Step 3
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#step-4">
                                        Step 4
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content" id="">
                                <div id="step-1" class="tab-pane" role="tabpanel">
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <h5>
                                                    Patient Information *
                                                </h5>
                                            </div>

                                            <div class="form-group col-md-6 @error('first_name') text-danger @enderror">
                                                <label for="first_name" class="col-form-label text-md-left">
                                                    {{ __('First Name') }}
                                                </label>
                                                <input
                                                    id="first_name"
                                                    name="first_name"
                                                    type="text"
                                                    class="form-control @error('first_name') is-invalid @enderror"
                                                    value="{{ old('first_name') }}"
                                                    placeholder="{{ __('First Name') }}"
                                                    required
                                                    autofocus
                                                >
                                                @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-6 @error('last_name') text-danger @enderror">
                                                <label for="last_name" class="col-form-label text-md-left">
                                                    {{ __('Last Name') }}
                                                </label>
                                                <input
                                                    id="last_name"
                                                    name="last_name"
                                                    type="text"
                                                    class="form-control @error('last_name') is-invalid @enderror"
                                                    value="{{ old('last_name') }}"
                                                    placeholder="{{ __('Last Name') }}"
                                                    required
                                                >
                                                @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12"><br></div>

                                            <div class="form-group col-md-6 @error('dob') text-danger @enderror">
                                                <label for="dob" class="col-form-label text-md-left">
                                                    {{ __('Date of Birth') }}
                                                </label>
                                                <input
                                                    id="dob"
                                                    name="dob"
                                                    type="date"
                                                    class="form-control @error('dob') is-invalid @enderror"
                                                    value="{{ old('dob') }}"
                                                    placeholder="{{ __('Date of Birth') }}"
                                                    required
                                                >
                                                @error('dob')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-6 @error('age') text-danger @enderror">
                                                <label for="age" class="col-form-label text-md-left">
                                                    {{ __('Age') }}
                                                </label>
                                                <input
                                                    id="age"
                                                    name="age"
                                                    type="number"
                                                    min="0"
                                                    class="form-control @error('age') is-invalid @enderror"
                                                    value="{{ old('age') }}"
                                                    placeholder="{{ __('Age') }}"
                                                    required
                                                    readonly
                                                >
                                                @error('age')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12"><br></div>

                                            <div class="form-group col-md-12 @error('gender') text-danger @enderror">

                                                <label for="gender" class="col-form-label text-md-left">
                                                    {{ __('Gender') }}
                                                </label>
                                                <br>

                                                <label class="mr-3">
                                                <input
                                                    id="gender_male"
                                                    name="gender"
                                                    type="radio"
                                                    class="@error('gender') is-invalid @enderror"
                                                    value="{{ strtolower(config('constants.gender.male')) ?? old('gender') }}"
                                                    {{ old('gender') == strtolower(config('constants.gender.male')) ? 'checked' : '' }}
                                                    required
                                                >
                                                <span>{{ config('constants.gender.male') }}</span>
                                                </label>

                                                <label class="mr-3">
                                                <input
                                                    id="gender_female"
                                                    name="gender"
                                                    type="radio"
                                                    class="@error('gender') is-invalid @enderror"
                                                    value="{{ strtolower(config('constants.gender.female')) ?? old('gender') }}"
                                                    {{ old('gender') == strtolower(config('constants.gender.female')) ? 'checked' : '' }}
                                                    required
                                                >
                                                <span>{{ config('constants.gender.female') }}</span>
                                                </label>

                                                @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12"><br></div>

                                            <div class="form-group col-md-6 @error('address') text-danger @enderror">
                                                <label for="address" class="col-form-label text-md-left">
                                                    {{ __('Address') }}
                                                </label>
                                                <input
                                                    id="address"
                                                    name="address"
                                                    type="text"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    value="{{ old('address') }}"
                                                    placeholder="{{ __('Address') }}"
                                                    required
                                                >
                                                @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-6 @error('city') text-danger @enderror">
                                                <label for="city" class="col-form-label text-md-left">
                                                    {{ __('City') }}
                                                </label>
                                                <input
                                                    id="city"
                                                    name="city"
                                                    type="text"
                                                    class="form-control @error('city') is-invalid @enderror"
                                                    value="{{ old('city') }}"
                                                    placeholder="{{ __('City') }}"
                                                    required
                                                    autocomplete="city"
                                                >
                                                @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12"><br></div>

                                            <div class="form-group col-md-6 @error('height') text-danger @enderror">
                                                <label for="height" class="col-form-label text-md-left">
                                                    {{ __('Height') }} (feet)
                                                </label>
                                                <input
                                                    id="height"
                                                    name="height"
                                                    type="number"
                                                    class="form-control @error('height') is-invalid @enderror"
                                                    value="{{ old('height') }}"
                                                    placeholder="{{ __('Height') }}"
                                                    min="0"
                                                    max="10"
                                                    required
                                                >
                                                @error('height')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-6 @error('weight') text-danger @enderror">
                                                <label for="weight" class="col-form-label text-md-left">
                                                    {{ __('Weight') }} (lbs)
                                                </label>
                                                <input
                                                    id="weight"
                                                    name="weight"
                                                    type="number"
                                                    class="form-control @error('weight') is-invalid @enderror"
                                                    value="{{ old('weight') }}"
                                                    placeholder="{{ __('Weight') }}"
                                                    min="0"
                                                    required
                                                >
                                                @error('weight')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12"><br></div>

                                            <div class="form-group col-md-6 @error('bmi') text-danger @enderror">
                                                <label for="bmi" class="col-form-label text-md-left">
                                                    {{ __('BMI') }}
                                                </label>
                                                <input
                                                    id="bmi"
                                                    name="bmi"
                                                    type="number"
                                                    class="form-control @error('bmi') is-invalid @enderror"
                                                    value="{{ old('bmi') }}"
                                                    placeholder="{{ __('BMI') }}"
                                                    required
                                                    readonly
                                                >
                                                <small class="help" id="bmi-description"></small>
                                                @error('bmi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-6 @error('neck_size') text-danger @enderror">
                                                <label for="neck_size" class="col-form-label text-md-left">
                                                    {{ __('Neck Size') }}
                                                </label>
                                                <input
                                                    id="neck_size"
                                                    name="neck_size"
                                                    type="number"
                                                    class="form-control @error('neck_size') is-invalid @enderror"
                                                    value="{{ old('neck_size') }}"
                                                    placeholder="{{ __('Neck Size') }}"
                                                    required
                                                >
                                                @error('neck_size')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div id="step-2" class="tab-pane" role="tabpanel">
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <h5>
                                                    Sleep *
                                                </h5>
                                            </div>

                                            <div class="form-group col-md-12 @error('snore') text-danger @enderror">
                                                <label for="snore" class="col-form-label text-md-left">
                                                    {{ __('Do You Snore?') }}
                                                </label>
                                                <br>

                                                <label class="mr-3">
                                                    <input
                                                        id="snore_yes"
                                                        name="snore"
                                                        type="radio"
                                                        class="@error('snore') is-invalid @enderror"
                                                        value="{{ config('constants.bool.yes') ?? old('snore') }}"
                                                        {{ old('snore') === config('constants.bool.yes') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>Yes</span>
                                                </label>

                                                <label class="mr-3">
                                                    <input
                                                        id="snore_no"
                                                        name="snore"
                                                        type="radio"
                                                        class="@error('snore') is-invalid @enderror"
                                                        value="{{ config('constants.bool.no') ?? old('snore') }}"
                                                        {{ old('snore') === config('constants.bool.no') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>No</span>
                                                </label>

                                                @error('snore')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12"><br></div>

                                            <div class="form-group col-md-12 @error('tired') text-danger @enderror">
                                                <label for="tired" class="col-form-label text-md-left">
                                                    {{ __('Do you often feel Tired, Fatigued or Sleepy during the daytime?') }}
                                                </label>
                                                <br>

                                                <label class="mr-3">
                                                    <input
                                                        id="tired_yes"
                                                        name="tired"
                                                        type="radio"
                                                        class="@error('tired') is-invalid @enderror"
                                                        value="{{ config('constants.bool.yes') ?? old('tired') }}"
                                                        {{ old('tired') == config('constants.bool.yes') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>Yes</span>
                                                </label>

                                                <label class="mr-3">
                                                    <input
                                                        id="tired_no"
                                                        name="tired"
                                                        type="radio"
                                                        class="@error('tired') is-invalid @enderror"
                                                        value="{{ config('constants.bool.no') ?? old('tired') }}"
                                                        {{ old('tired') == config('constants.bool.no') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>No</span>
                                                </label>

                                                @error('tired')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12"><br></div>

                                            <div class="form-group col-md-12 @error('stop_breathing') text-danger @enderror">
                                                <label for="stop_breathing" class="col-form-label text-md-left">
                                                    {{ __('Has anyone observed you Stop Breathing during your sleep?') }}
                                                </label>
                                                <br>

                                                <label class="mr-3">
                                                    <input
                                                        id="stop_breathing_yes"
                                                        name="stop_breathing"
                                                        type="radio"
                                                        class="@error('stop_breathing') is-invalid @enderror"
                                                        value="{{ config('constants.bool.yes') ?? old('stop_breathing') }}"
                                                        {{ old('stop_breathing') == config('constants.bool.yes') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>Yes</span>
                                                </label>

                                                <label class="mr-3">
                                                    <input
                                                        id="stop_breathing_no"
                                                        name="stop_breathing"
                                                        type="radio"
                                                        class="@error('stop_breathing') is-invalid @enderror"
                                                        value="{{ config('constants.bool.no') ?? old('stop_breathing') }}"
                                                        {{ old('stop_breathing') == config('constants.bool.no') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>No</span>
                                                </label>

                                                @error('stop_breathing')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12"><br></div>

                                            <div class="form-group col-md-12 @error('high_blood_pressure') text-danger @enderror">
                                                <label for="high_blood_pressure" class="col-form-label text-md-left">
                                                    {{ __('Do you have OR are you being treated for High Blood Pressure?') }}
                                                </label>
                                                <br>

                                                <label class="mr-3">
                                                    <input
                                                        id="high_blood_pressure_yes"
                                                        name="high_blood_pressure"
                                                        type="radio"
                                                        class="@error('high_blood_pressure') is-invalid @enderror"
                                                        value="{{ config('constants.bool.yes') ?? old('high_blood_pressure') }}"
                                                        {{ old('high_blood_pressure') == config('constants.bool.yes') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>Yes</span>
                                                </label>

                                                <label class="mr-3">
                                                    <input
                                                        id="high_blood_pressure_no"
                                                        name="high_blood_pressure"
                                                        type="radio"
                                                        class="@error('high_blood_pressure') is-invalid @enderror"
                                                        value="{{ config('constants.bool.no') ?? old('high_blood_pressure') }}"
                                                        {{ old('high_blood_pressure') == config('constants.bool.no') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>No</span>
                                                </label>

                                                @error('high_blood_pressure')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="step-3" class="tab-pane" role="tabpanel">
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <h5>
                                                    Medical History
                                                </h5>
                                            </div>

                                            <div class="form-group col-md-6 @error('insomnia') text-danger @enderror">
                                                <label for="insomnia" class="col-form-label text-md-left">
                                                    {{ __('Insomnia') }}
                                                </label>
                                                <br>

                                                <label class="mr-3">
                                                    <input
                                                        id="insomnia_yes"
                                                        name="insomnia"
                                                        type="radio"
                                                        class="@error('insomnia') is-invalid @enderror"
                                                        value="{{ config('constants.bool.yes') ?? old('insomnia') }}"
                                                        {{ old('insomnia') == config('constants.bool.yes') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>Yes</span>
                                                </label>

                                                <label class="mr-3">
                                                    <input
                                                        id="insomnia_no"
                                                        name="insomnia"
                                                        type="radio"
                                                        class="@error('insomnia') is-invalid @enderror"
                                                        value="{{ config('constants.bool.no') ?? old('insomnia') }}"
                                                        {{ old('insomnia') == config('constants.bool.no') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>No</span>
                                                </label>

                                                @error('insomnia')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-6 @error('blood_pressure') text-danger @enderror">
                                                <label for="blood_pressure" class="col-form-label text-md-left">
                                                    {{ __('High Blood Pressure') }}
                                                </label>
                                                <br>

                                                <label class="mr-3">
                                                    <input
                                                        id="blood_pressure_yes"
                                                        name="blood_pressure"
                                                        type="radio"
                                                        class="@error('blood_pressure') is-invalid @enderror"
                                                        value="{{ config('constants.bool.yes') ?? old('blood_pressure') }}"
                                                        {{ old('blood_pressure') == config('constants.bool.yes') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>Yes</span>
                                                </label>

                                                <label class="mr-3">
                                                    <input
                                                        id="blood_pressure_no"
                                                        name="blood_pressure"
                                                        type="radio"
                                                        class="@error('blood_pressure') is-invalid @enderror"
                                                        value="{{ config('constants.bool.no') ?? old('blood_pressure') }}"
                                                        {{ old('blood_pressure') == config('constants.bool.no') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>No</span>
                                                </label>

                                                @error('blood_pressure')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12"><br></div>

                                            <div class="form-group col-md-6 @error('stroke') text-danger @enderror">
                                                <label for="stroke" class="col-form-label text-md-left">
                                                    {{ __('Stroke') }}
                                                </label>
                                                <br>
                                                <label class="mr-3">
                                                    <input
                                                        id="stroke_yes"
                                                        name="stroke"
                                                        type="radio"
                                                        class="@error('stroke') is-invalid @enderror"
                                                        value="{{ config('constants.bool.yes') ?? old('stroke') }}"
                                                        {{ old('stroke') == config('constants.bool.yes') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>Yes</span>
                                                </label>

                                                <label class="mr-3">
                                                    <input
                                                        id="stroke_no"
                                                        name="stroke"
                                                        type="radio"
                                                        class="@error('stroke') is-invalid @enderror"
                                                        value="{{ config('constants.bool.no') ?? old('stroke') }}"
                                                        {{ old('stroke') == config('constants.bool.no') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>No</span>
                                                </label>

                                                @error('stroke')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-6 @error('heart_attack') text-danger @enderror">
                                                <label for="heart_attack" class="col-form-label text-md-left">
                                                    {{ __('Heart Attack') }}
                                                </label>
                                                <br>

                                                <label class="mr-3">
                                                    <input
                                                        id="heart_attack_yes"
                                                        name="heart_attack"
                                                        type="radio"
                                                        class="@error('heart_attack') is-invalid @enderror"
                                                        value="{{ config('constants.bool.yes') ?? old('heart_attack') }}"
                                                        {{ old('heart_attack') == config('constants.bool.yes') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>Yes</span>
                                                </label>

                                                <label class="mr-3">
                                                    <input
                                                        id="heart_attack_no"
                                                        name="heart_attack"
                                                        type="radio"
                                                        class="@error('heart_attack') is-invalid @enderror"
                                                        value="{{ config('constants.bool.no') ?? old('heart_attack') }}"
                                                        {{ old('heart_attack') == config('constants.bool.no') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>No</span>
                                                </label>

                                                @error('heart_attack')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12"><br></div>

                                            <div class="form-group col-md-6 @error('atrial_fibrillation') text-danger @enderror">
                                                <label for="atrial_fibrillation" class="col-form-label text-md-left">
                                                    {{ __('Atrial Fibrillation') }}
                                                </label>
                                                <br>

                                                <label class="mr-3">
                                                    <input
                                                        id="atrial_fibrillation_yes"
                                                        name="atrial_fibrillation"
                                                        type="radio"
                                                        class="@error('atrial_fibrillation') is-invalid @enderror"
                                                        value="{{ config('constants.bool.yes') ?? old('atrial_fibrillation') }}"
                                                        {{ old('atrial_fibrillation') == config('constants.bool.yes') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>Yes</span>
                                                </label>

                                                <label class="mr-3">
                                                    <input
                                                        id="atrial_fibrillation_no"
                                                        name="atrial_fibrillation"
                                                        type="radio"
                                                        class="@error('atrial_fibrillation') is-invalid @enderror"
                                                        value="{{ config('constants.bool.no') ?? old('atrial_fibrillation') }}"
                                                        {{ old('atrial_fibrillation') == config('constants.bool.no') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>No</span>
                                                </label>

                                                @error('atrial_fibrillation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-6 @error('diabetes') text-danger @enderror">
                                                <label for="diabetes" class="col-form-label text-md-left">
                                                    {{ __('Diabetes') }}
                                                </label>
                                                <br>

                                                <label class="mr-3">
                                                    <input
                                                        id="diabetes_yes"
                                                        name="diabetes"
                                                        type="radio"
                                                        class="@error('diabetes') is-invalid @enderror"
                                                        value="{{ config('constants.bool.yes') ?? old('diabetes') }}"
                                                        {{ old('diabetes') == config('constants.bool.yes') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>Yes</span>
                                                </label>

                                                <label class="mr-3">
                                                    <input
                                                        id="diabetes_no"
                                                        name="diabetes"
                                                        type="radio"
                                                        class="@error('diabetes') is-invalid @enderror"
                                                        value="{{ config('constants.bool.no') ?? old('diabetes') }}"
                                                        {{ old('diabetes') == config('constants.bool.no') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>No</span>
                                                </label>

                                                @error('diabetes')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12"><br></div>

                                            <div class="form-group col-md-6 @error('gerd') text-danger @enderror">
                                                <label for="gerd" class="col-form-label text-md-left">
                                                    {{ __('GERD (Gastric Reflux)') }}
                                                </label>
                                                <br>

                                                <label class="mr-3">
                                                    <input
                                                        id="gerd_yes"
                                                        name="gerd"
                                                        type="radio"
                                                        class="@error('gerd') is-invalid @enderror"
                                                        value="{{ config('constants.bool.yes') ?? old('gerd') }}"
                                                        {{ old('gerd') == config('constants.bool.yes') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>Yes</span>
                                                </label>

                                                <label class="mr-3">
                                                    <input
                                                        id="gerd_no"
                                                        name="gerd"
                                                        type="radio"
                                                        class="@error('gerd') is-invalid @enderror"
                                                        value="{{ config('constants.bool.no') ?? old('gerd') }}"
                                                        {{ old('gerd') == config('constants.bool.no') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>No</span>
                                                </label>

                                                @error('gerd')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-6 @error('anxiety') text-danger @enderror">
                                                <label for="anxiety" class="col-form-label text-md-left">
                                                    {{ __('Depression / Anxiety') }}
                                                </label>
                                                <br>

                                                <label class="mr-3">
                                                    <input
                                                        id="anxiety_yes"
                                                        name="anxiety"
                                                        type="radio"
                                                        class="@error('anxiety') is-invalid @enderror"
                                                        value="{{ config('constants.bool.yes') ?? old('anxiety') }}"
                                                        {{ old('anxiety') == config('constants.bool.yes') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>Yes</span>
                                                </label>

                                                <label class="mr-3">
                                                    <input
                                                        id="anxiety_no"
                                                        name="anxiety"
                                                        type="radio"
                                                        class="@error('anxiety') is-invalid @enderror"
                                                        value="{{ config('constants.bool.no') ?? old('anxiety') }}"
                                                        {{ old('anxiety') == config('constants.bool.no') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>No</span>
                                                </label>

                                                @error('anxiety')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="step-4" class="tab-pane" role="tabpanel">
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <h5>
                                                    Dental Exam
                                                </h5>
                                            </div>

                                            <div class="form-group col-md-4 @error('scalloped_tongue') text-danger @enderror">
                                                <label for="scalloped_tongue" class="col-form-label text-md-left">
                                                    {{ __('Scalloped Tongue') }}
                                                </label>
                                                <br>

                                                <label class="mr-3">
                                                    <input
                                                        id="scalloped_tongue_yes"
                                                        name="scalloped_tongue"
                                                        type="radio"
                                                        class="@error('scalloped_tongue') is-invalid @enderror"
                                                        value="{{ config('constants.bool.yes') ?? old('scalloped_tongue') }}"
                                                        {{ old('scalloped_tongue') == config('constants.bool.yes') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>Yes</span>
                                                </label>

                                                <label class="mr-3">
                                                    <input
                                                        id="scalloped_tongue_no"
                                                        name="scalloped_tongue"
                                                        type="radio"
                                                        class="@error('scalloped_tongue') is-invalid @enderror"
                                                        value="{{ config('constants.bool.no') ?? old('scalloped_tongue') }}"
                                                        {{ old('scalloped_tongue') == config('constants.bool.no') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>No</span>
                                                </label>

                                                @error('scalloped_tongue')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4 @error('bruxism') text-danger @enderror">
                                                <label for="bruxism" class="col-form-label text-md-left">
                                                    {{ __('Bruxism') }}
                                                </label>
                                                <br>

                                                <label class="mr-3">
                                                    <input
                                                        id="bruxism_yes"
                                                        name="bruxism"
                                                        type="radio"
                                                        class="@error('bruxism') is-invalid @enderror"
                                                        value="{{ config('constants.bool.yes') ?? old('bruxism') }}"
                                                        {{ old('bruxism') == config('constants.bool.yes') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>Yes</span>
                                                </label>

                                                <label class="mr-3">
                                                    <input
                                                        id="bruxism_no"
                                                        name="bruxism"
                                                        type="radio"
                                                        class="@error('bruxism') is-invalid @enderror"
                                                        value="{{ config('constants.bool.no') ?? old('bruxism') }}"
                                                        {{ old('bruxism') == config('constants.bool.no') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>No</span>
                                                </label>

                                                @error('bruxism')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4 @error('tooth_wear') text-danger @enderror">
                                                <label for="tooth_wear" class="col-form-label text-md-left">
                                                    {{ __('Tooth Wear') }}
                                                </label>
                                                <br>

                                                <label class="mr-3">
                                                    <input
                                                        id="tooth_wear_yes"
                                                        name="tooth_wear"
                                                        type="radio"
                                                        class="@error('tooth_wear') is-invalid @enderror"
                                                        value="{{ config('constants.bool.yes') ?? old('tooth_wear') }}"
                                                        {{ old('tooth_wear') == config('constants.bool.yes') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>Yes</span>
                                                </label>

                                                <label class="mr-3">
                                                    <input
                                                        id="tooth_wear_no"
                                                        name="tooth_wear"
                                                        type="radio"
                                                        class="@error('tooth_wear') is-invalid @enderror"
                                                        value="{{ config('constants.bool.no') ?? old('tooth_wear') }}"
                                                        {{ old('tooth_wear') == config('constants.bool.no') ? 'checked' : '' }}
                                                        required
                                                    >
                                                    <span>No</span>
                                                </label>

                                                @error('tooth_wear')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12"><br></div>

                                            <div class="form-group col-md-12 @error('mallampati_classification') text-danger @enderror">
                                                <label for="mallampati_classification" class="col-form-label text-md-left">
                                                    {{ __('Mallampati Classification') }}
                                                </label>
                                                <br>

                                                <div class="row">
                                                <div class="col-md-3 col-sm-6 col-6">
                                                    <label class="text-center">
                                                        <input
                                                            type="radio"
                                                            name="mallampati_classification"
                                                            value="class-1"
                                                            class="input-hidden"
                                                            {{ old('mallampati_classification') == 'class-1' ? 'checked' : '' }}
                                                        >
                                                        <img
                                                            src="{{ asset('frontend-assets/images/class-1.png') }}"
                                                            class="img-fluid mallampati-image"
                                                        >
                                                        <p class="">
                                                            Class I
                                                        </p>
                                                    </label>
                                                </div>

                                                <div class="col-md-3 col-sm-6 col-6">
                                                    <label class="text-center">
                                                        <input
                                                            type="radio"
                                                            name="mallampati_classification"
                                                            value="class-2"
                                                            class="input-hidden"
                                                            {{ old('mallampati_classification') == 'class-2' ? 'checked' : '' }}
                                                        >
                                                        <img
                                                            src="{{ asset('frontend-assets/images/class-2.png') }}"
                                                            class="img-fluid mallampati-image"
                                                        >
                                                        <p class="">
                                                            Class II
                                                        </p>
                                                    </label>
                                                </div>

                                                <div class="col-md-3 col-sm-6 col-6">
                                                    <label class="text-center">
                                                        <input
                                                            type="radio"
                                                            name="mallampati_classification"
                                                            value="class-3"
                                                            class="input-hidden"
                                                            {{ old('mallampati_classification') == 'class-3' ? 'checked' : '' }}
                                                        >
                                                        <img
                                                            src="{{ asset('frontend-assets/images/class-3.png') }}"
                                                            class="img-fluid mallampati-image"
                                                        >
                                                        <p class="">
                                                            Class III
                                                        </p>
                                                    </label>
                                                </div>

                                                <div class="col-md-3 col-sm-6 col-6">
                                                    <label class="text-center">
                                                        <input
                                                            type="radio"
                                                            name="mallampati_classification"
                                                            value="class-4"
                                                            class="input-hidden"
                                                            {{ old('mallampati_classification') == 'class-4' ? 'checked' : '' }}
                                                        >
                                                        <img
                                                            src="{{ asset('frontend-assets/images/class-4.png') }}"
                                                            class="img-fluid mallampati-image"
                                                        >
                                                        <p class="">
                                                            Class IV
                                                        </p>
                                                    </label>
                                                </div>
                                                </div>

                                                @error('mallampati_classification')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12"><br></div>

                                            <div class="form-group col-md-12 @error('tonsil_classification') text-danger @enderror">
                                                <label for="tonsil_classification" class="col-form-label text-md-left">
                                                    {{ __('Tonsil Classification') }}
                                                </label>
                                                <br>

                                                <div class="row">
                                                    <div class="col-md-4 col-sm-6 col-12">
                                                        <label class="text-center">
                                                            <input
                                                                type="radio"
                                                                name="tonsil_classification"
                                                                value="tonsil-0"
                                                                class="input-hidden"
                                                                {{ old('tonsil_classification') == 'tonsil-0' ? 'checked' : '' }}
                                                            >
                                                            <img
                                                                src="{{ asset('frontend-assets/images/tonsil-0.png') }}"
                                                                class="img-fluid tonsil-image"
                                                            >
                                                            <p class="">
                                                                0
                                                                <br>
                                                                <small class="help">Surgically removed Tonsils</small>
                                                            </p>
                                                        </label>
                                                    </div>

                                                    <div class="col-md-4 col-sm-6 col-12">
                                                        <label class="text-center">
                                                            <input
                                                                type="radio"
                                                                name="tonsil_classification"
                                                                value="tonsil-1"
                                                                class="input-hidden"
                                                                {{ old('tonsil_classification') == 'tonsil-1' ? 'checked' : '' }}
                                                            >
                                                            <img
                                                                src="{{ asset('frontend-assets/images/tonsil-1.png') }}"
                                                                class="img-fluid tonsil-image"
                                                            >
                                                            <p class="">
                                                                1
                                                                <br>
                                                                <small>Tonsils hidden within tonsil pillars</small>
                                                            </p>
                                                        </label>
                                                    </div>

                                                    <div class="col-md-4 col-sm-6 col-12">
                                                        <label class="text-center">
                                                            <input
                                                                type="radio"
                                                                name="tonsil_classification"
                                                                value="tonsil-2"
                                                                class="input-hidden"
                                                                {{ old('tonsil_classification') == 'tonsil-2' ? 'checked' : '' }}
                                                            >
                                                            <img
                                                                src="{{ asset('frontend-assets/images/tonsil-2.png') }}"
                                                                class="img-fluid tonsil-image"
                                                            >
                                                            <p class="">
                                                                2
                                                                <br>
                                                                <small>Tonsils extending to the pillars</small>
                                                            </p>
                                                        </label>
                                                    </div>

                                                    <div class="col-md-4 col-sm-6 col-12">
                                                        <label class="text-center">
                                                            <input
                                                                type="radio"
                                                                name="tonsil_classification"
                                                                value="tonsil-3"
                                                                class="input-hidden"
                                                                {{ old('tonsil_classification') == 'tonsil-3' ? 'checked' : '' }}
                                                            >
                                                            <img
                                                                src="{{ asset('frontend-assets/images/tonsil-3.png') }}"
                                                                class="img-fluid tonsil-image"
                                                            >
                                                            <p class="">
                                                                3
                                                                <br>
                                                                <small>Tonsils are beyond the pillars</small>
                                                            </p>
                                                        </label>
                                                    </div>

                                                    <div class="col-md-4 col-sm-6 col-12">
                                                        <label class="text-center">
                                                            <input
                                                                type="radio"
                                                                name="tonsil_classification"
                                                                value="tonsil-4"
                                                                class="input-hidden"
                                                                {{ old('tonsil_classification') == 'tonsil-4' ? 'checked' : '' }}
                                                            >
                                                            <img
                                                                src="{{ asset('frontend-assets/images/tonsil-4.png') }}"
                                                                class="img-fluid tonsil-image"
                                                            >
                                                            <h6 class="">
                                                                4
                                                                <br>
                                                                <small>Tonsils extend to midline</small>
                                                            </h6>
                                                        </label>
                                                    </div>
                                                </div>

                                                @error('tonsil_classification')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </section>
                </div>
                <div class="col-lg-3 col-md-2 col-sm-12"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript" defer></script>

    <script>
        $(document).ready(function(){

            let smartWizardForm = $('#smartwizard');

            // SmartWizard initialize
            smartWizardForm.smartWizard({
                selected: 0, // Initial selected step, 0 = first step
                theme: 'dots', // theme for the wizard, related css need to include for other than default theme
                justified: true, // Nav menu justification. true/false
                darkMode:false, // Enable/disable Dark Mode if the theme supports. true/false
                autoAdjustHeight: true, // Automatically adjust content height
                cycleSteps: false, // Allows to cycle the navigation of steps
                backButtonSupport: true, // Enable the back button support
                enableURLhash: false, // Enable selection of the step based on url hash
                transition: {
                    animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
                    speed: '400', // Transion animation speed
                    easing:'' // Transition animation easing. Not supported without a jQuery easing plugin
                },
                toolbarSettings: {
                    toolbarPosition: 'bottom', // none, top, bottom, both
                    toolbarButtonPosition: 'right', // left, right, center
                    showNextButton: true, // show/hide a Next button
                    showPreviousButton: true, // show/hide a Previous button
                    toolbarExtraButtons: [
                        $('<button id="sleep-test--submit" disabled></button>')
                            .text('Finish')
                            .addClass('btn btn-info')
                            .hide()
                            // .on('click', function(){
                            //     // alert('ss');
                            //     // $('#sleep-test--form').submit();
                            // })
                    ] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
                },
                anchorSettings: {
                    anchorClickable: true, // Enable/Disable anchor navigation
                    enableAllAnchors: false, // Activates all anchors clickable all times
                    markDoneStep: true, // Add done state on navigation
                    markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                    removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
                    enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                },
                keyboardSettings: {
                    keyNavigation: false, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
                    keyLeft: [37], // Left key code
                    keyRight: [39] // Right key code
                },
                lang: { // Language variables for button
                    next: 'Next',
                    previous: 'Previous'
                },
                disabledSteps: [], // Array Steps disabled
                errorSteps: [], // Highlight step with errors
                hiddenSteps: [] // Hidden steps
            });

            let testSubmitButton = $('#sleep-test--submit');
            smartWizardForm.on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
                if ($('button.sw-btn-next').hasClass('disabled')) {
                    // show the button extra only in the last page
                    testSubmitButton.show('slow').removeAttr('disabled');
                } else {
                    testSubmitButton.hide().prop('disabled', true);
                }
            });

            testSubmitButton.on('click', function () {
                $('#sleep-test--form').submit();
            });


            let bmi_description = $('#bmi-description')

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


            $('#dob').on('change', function () {
                let age = calculateAge($(this).val())

                $('#age').val(age)
            })
        });

        function calculateBmi(w, h) {
            // calculate bmi
            let height = h;
            let weight = w;

            // feet to meter
            height = parseFloat(height) * parseFloat({{ config('constants.si_units.foot_to_meter') }})

            // lb to kg
            weight = parseFloat(weight) * parseFloat({{ config('constants.si_units.lbs_to_kgs') }})

            return weight / (height * height)
        }

        function calculateAge(dateString) {
            var birthday = +new Date(dateString);
            return ~~((Date.now() - birthday) / (31557600000));
        }
    </script>
@endpush
