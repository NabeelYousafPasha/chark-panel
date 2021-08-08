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

                        @include('dashboard.pages.assessment.form.progress', ['step' => 'step1',])

                        <div class="row">
                            <div class="col-md-12">

                                <form
                                    action="{{ route('dashboard.assessment.store.step', [
                                        'patient' => $patient, 'step' => 'step1',
                                        ]) }}"
                                    method="POST"
                                    id="step1"
                                    name="step1"
                                    class="step1"
                                >
                                    @csrf

                                    <div class="row">

                                        <div class="col-md-6">

                                            <h2>Obstructive Sleep Apnea Symptoms</h2>
                                            <br>

                                            <div class="row form-group @error('snore') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label for="snore" class="control-label">
                                                        Snoring:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="snore_yes" name="snore" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="snore_no" name="snore" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>

                                                    @error('snore')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('apnea') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label for="apnea" class="control-label">
                                                        Apnea:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="apnea_yes" name="apnea" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="apnea_no" name="apnea" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>

                                                    @error('apnea')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('breathing_shortness') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label for="breathing_shortness" class="control-label">
                                                        Shortness of Breath while sleeping:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="breathing_shortness_yes" name="breathing_shortness" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="breathing_shortness_no" name="breathing_shortness" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>

                                                    @error('breathing_shortness')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('average_sleep') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label for="average_sleep" class="control-label">
                                                        Average sleep duration (hours):
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input id="average_sleep" name="average_sleep" type="number" class="form-control" min="0" max="24" value="" required="">

                                                    @error('average_sleep')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('fragmented_sleep') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label for="fragmented_sleep" class="control-label">
                                                        Fragmented Sleep:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="fragmented_sleep_yes" name="fragmented_sleep" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="fragmented_sleep_no" name="fragmented_sleep" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>

                                                    @error('fragmented_sleep')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('nocturia') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label for="nocturia" class="control-label">
                                                        Nocturia:
                                                        <span class="badge badge-light" title="a condition in which you wake up during the night because you have to urinate.">?</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="nocturia_yes" name="nocturia" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="nocturia_no" name="nocturia" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>

                                                    @error('nocturia')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('tired_during_day') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label for="tired_during_day" class="control-label">
                                                        Tired during the day:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="tired_during_day_yes" name="tired_during_day" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="tired_during_day_no" name="tired_during_day" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>

                                                    @error('tired_during_day')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('morning_headache') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label for="morning_headache" class="control-label">
                                                        Headache in the mornings:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="morning_headache_yes" name="morning_headache" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="morning_headache_no" name="morning_headache" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>

                                                    @error('morning_headache')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('nap') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label for="nap" class="control-label">
                                                        Do you nap?:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="nap_yes" name="nap" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="nap_no" name="nap" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>

                                                    @error('nap')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('sleepiness_during_day') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label for="sleepiness_during_day" class="control-label">
                                                        Sleepiness during the day:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="sleepiness_during_day_yes" name="sleepiness_during_day" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="sleepiness_during_day_no" name="sleepiness_during_day" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>

                                                    @error('sleepiness_during_day')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row form-group @error('loss_of_concentration') has-error @enderror">
                                                <div class="col-md-6">
                                                    <label for="loss_of_concentration" class="control-label">
                                                        Loss of concentration:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="m-r">
                                                        <input id="loss_of_concentration_yes" name="loss_of_concentration" type="radio" class="" value="1" required="">
                                                        <span>Yes</span>
                                                    </label>
                                                    <label class="m-r">
                                                        <input id="loss_of_concentration_no" name="loss_of_concentration" type="radio" class="" value="0" required="">
                                                        <span>No</span>
                                                    </label>

                                                    @error('loss_of_concentration')
                                                        <span class="help-block has-error">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <h2>
                                                Epworth Test
                                            </h2>
                                            <button
                                                id="button__epworth_test"
                                                type="button"
                                                class="btn btn-primary"
                                                data-toggle="modal"
                                                data-target="#modal__epworth_test"
                                            >
                                                Take Epworth Test
                                            </button>

                                            <br>
                                            <br>
                                            <br>

                                            <h2>
                                                Snoring experienced during the night
                                            </h2>
                                            <button
                                                id="button__snoring_scale_test"
                                                type="button"
                                                class="btn btn-primary"
                                                data-toggle="modal"
                                                data-target="#modal__snoring_scale_test"
                                            >
                                                Take Snoring Scale Test
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row form-group text-right">
                                        <button
                                            id="button_step1"
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


    <div
        class="modal inmodal "
        id="modal__epworth_test"
        tabindex="-1"
        role="dialog"
        aria-labelledby="modal__epworth_test_Label"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-lg" role="dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h2 class="modal-title" id="modal__epworth_test_Label">
                        Epworth Sleepiness scale
                    </h2>
                </div>

                <div class="modal-body table-responsive">
                    <div class="row">
                        <div class="col-md-12">

                            <h3>Select the chance of you dozing or falling asleep in these situations:</h3>

                            <table class="table" width="100%">
                                <thead>
                                    <tr>
                                        <th width="40%"></th>
                                        @foreach(config('constants.sleepiness_scale_options') as $option)
                                            <th class="text-center">{{ ucfirst($option) }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group @error('while_sitting_and_reading') has-error @enderror">
                                                <label for="while_sitting_and_reading" class="control-label">
                                                    Sitting and Reading
                                                </label>

                                                @error('while_sitting_and_reading')
                                                    <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </td>
                                        @foreach(config('constants.sleepiness_scale_options') as $option)
                                            <th class="text-center">
                                                <input
                                                    id="while_sitting_and_reading_{{ $option }}"
                                                    name="while_sitting_and_reading"
                                                    type="radio"
                                                    class=""
                                                    value="{{ $option }}"
                                                    required
                                                    form="step1"
                                                >
                                            </th>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group @error('while_watching_television') has-error @enderror">
                                                <label for="while_watching_television" class="control-label">
                                                    Watching the Television
                                                </label>

                                                @error('while_watching_television')
                                                <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </td>
                                        @foreach(config('constants.sleepiness_scale_options') as $option)
                                            <th class="text-center">
                                                <input
                                                    id="while_watching_television_{{ $option }}"
                                                    name="while_watching_television"
                                                    type="radio"
                                                    class=""
                                                    value="{{ $option }}"
                                                    required
                                                    form="step1"
                                                >
                                            </th>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group @error('while_inactive_in_public_place') has-error @enderror">
                                                <label for="while_inactive_in_public_place" class="control-label">
                                                    Sitting inactive in a public place (cinema, theatre, ...)
                                                </label>

                                                @error('while_inactive_in_public_place')
                                                <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </td>
                                        @foreach(config('constants.sleepiness_scale_options') as $option)
                                            <th class="text-center">
                                                <input
                                                    id="while_inactive_in_public_place_{{ $option }}"
                                                    name="while_inactive_in_public_place"
                                                    type="radio"
                                                    class=""
                                                    value="{{ $option }}"
                                                    required
                                                    form="step1"
                                                >
                                            </th>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group @error('while_travelling') has-error @enderror">
                                                <label for="while_travelling" class="control-label">
                                                    Being a passenger in a vehicle for an hour or more
                                                </label>

                                                @error('while_travelling')
                                                <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </td>
                                        @foreach(config('constants.sleepiness_scale_options') as $option)
                                            <th class="text-center">
                                                <input
                                                    id="while_travelling_{{ $option }}"
                                                    name="while_travelling"
                                                    type="radio"
                                                    class=""
                                                    value="{{ $option }}"
                                                    required
                                                    form="step1"
                                                >
                                            </th>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group @error('while_laying_down_in_afternoon') has-error @enderror">
                                                <label for="while_laying_down_in_afternoon" class="control-label">
                                                    Laying down in the afternoon
                                                </label>

                                                @error('while_laying_down_in_afternoon')
                                                <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </td>
                                        @foreach(config('constants.sleepiness_scale_options') as $option)
                                            <th class="text-center">
                                                <input
                                                    id="while_laying_down_in_afternoon_{{ $option }}"
                                                    name="while_laying_down_in_afternoon"
                                                    type="radio"
                                                    class=""
                                                    value="{{ $option }}"
                                                    required
                                                    form="step1"
                                                >
                                            </th>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group @error('while_talking') has-error @enderror">
                                                <label for="while_talking" class="control-label">
                                                    Sitting and talking to someone
                                                </label>

                                                @error('while_talking')
                                                <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </td>
                                        @foreach(config('constants.sleepiness_scale_options') as $option)
                                            <th class="text-center">
                                                <input
                                                    id="while_talking_{{ $option }}"
                                                    name="while_talking"
                                                    type="radio"
                                                    class=""
                                                    value="{{ $option }}"
                                                    required
                                                    form="step1"
                                                >
                                            </th>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group @error('while_sitting_after_lunch') has-error @enderror">
                                                <label for="while_sitting_after_lunch" class="control-label">
                                                    Sitting quietly after lunch (no alcohol)
                                                </label>

                                                @error('while_sitting_after_lunch')
                                                <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </td>
                                        @foreach(config('constants.sleepiness_scale_options') as $option)
                                            <th class="text-center">
                                                <input
                                                    id="while_sitting_after_lunch_{{ $option }}"
                                                    name="while_sitting_after_lunch"
                                                    type="radio"
                                                    class=""
                                                    value="{{ $option }}"
                                                    required
                                                    form="step1"
                                                >
                                            </th>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group @error('while_driving') has-error @enderror">
                                                <label for="while_driving" class="control-label">
                                                    Stopped for a few minutes in traffic while driving
                                                </label>

                                                @error('while_driving')
                                                <span class="help-block has-error">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </td>
                                        @foreach(config('constants.sleepiness_scale_options') as $option)
                                            <th class="text-center">
                                                <input
                                                    id="while_driving_{{ $option }}"
                                                    name="while_driving"
                                                    type="radio"
                                                    class=""
                                                    value="{{ $option }}"
                                                    required
                                                    form="step1"
                                                >
                                            </th>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>

                            <h4 class="help-block">
                                Select the chance of dozing or falling asleep in all of the situations.
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>


    <div
        class="modal inmodal "
        id="modal__snoring_scale_test"
        tabindex="-1"
        role="dialog"
        aria-labelledby="modal__snoring_scale_test_Label"
        aria-hidden="true"
    >
        <div class="modal-dialog" role="dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h2 class="modal-title" id="modal__snoring_scale_test_Label">
                        Snorting Scale text
                    </h2>
                </div>

                <div class="modal-body table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Snorting experienced during the night</h3>

                            <div class="form-group @error('night_snoring_experience') has-error @enderror">
                                @error('night_snoring_experience')
                                <span class="help-block has-error">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <table class="table" width="100%">
                                <tbody>
                                    @foreach(config('constants.night_snoring_experience') as $nightSnoreKey => $nightSnore)
                                        <tr>
                                            <td>
                                                <label
                                                    for="night_snoring_experience_{{ $nightSnoreKey }}"
                                                    class="control-label"
                                                >
                                                <input
                                                    id="night_snoring_experience_{{ $nightSnoreKey }}"
                                                    name="night_snoring_experience"
                                                    type="radio"
                                                    class=""
                                                    value="{{ $nightSnoreKey }}"
                                                    required
                                                    form="step1"
                                                >
                                                    {{ $nightSnore }}
                                                </label>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $('#button_step1').on("click", function (event) {

                event.preventDefault();

                // form
                let $form = $("#step1");

                // modal2
                let modal2radio = $('input[name="night_snoring_experience"]:checked').val();

                if ([undefined, "", null,].includes(modal2radio)) {
                    $('#modal__snoring_scale_test').modal('show');

                    return;
                }

                // Whatever other form processing stuff goes here.
                $form.submit();
            });


            // Modal 1
            let error_epworthTest = false;
            @error('while_sitting_and_reading') error_epworthTest = true; @enderror
            @error('while_watching_television') error_epworthTest = true; @enderror
            @error('while_inactive_in_public_place') error_epworthTest = true; @enderror
            @error('while_travelling') error_epworthTest = true; @enderror
            @error('while_laying_down_in_afternoon') error_epworthTest = true; @enderror
            @error('while_talking') error_epworthTest = true; @enderror
            @error('while_sitting_after_lunch') error_epworthTest = true; @enderror
            @error('while_driving') error_epworthTest = true; @enderror

            if (["true", true, 1].includes(error_epworthTest)) {
                $('#button__epworth_test').addClass("btn-danger");

                $('#modal__epworth_test').modal('show');
            }


            // Modal 2
            let error_nightSnoringExperience = false;
            @error('night_snoring_experience') error_nightSnoringExperience = true; @enderror

            if (["true", true, 1].includes(error_nightSnoringExperience)) {
                $('#button__snoring_scale_test').addClass("btn-danger");

                $('#modal__snoring_scale_test').modal('show');
            }
        });
    </script>
@endsection


