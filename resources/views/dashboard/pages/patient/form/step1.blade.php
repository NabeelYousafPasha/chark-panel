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

                        @include('dashboard.pages.patient.form.progress', ['step' => 'step1',])

                        <div class="row">
                            <div class="col-md-12">

                                <form action="" method="POST">

                                    <div class="row">

                                        <div class="col-md-6">

                                            <h3 class="">Obstructive Sleep Apnea Symptoms</h3>

                                            <br>

                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label
                                                        for="snore"
                                                        class="col-form-label text-md-left"
                                                    >
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
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label for="apnea" class="col-form-label text-md-left">
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
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label for="breathing_shortness" class="col-form-label text-md-left">
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
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label for="average_sleep" class="col-form-label text-md-left">
                                                        Average sleep duration (hours):
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input id="average_sleep" name="average_sleep" type="number" class="form-control" min="0" value="" required="">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label for="fragmented_sleep" class="col-form-label text-md-left">
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
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label for="nocturia" class="col-form-label text-md-left">
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
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label for="tired_during_day" class="col-form-label text-md-left">
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
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label for="morning_headache" class="col-form-label text-md-left">
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
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label for="nap" class="col-form-label text-md-left">
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
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label for="sleepiness_during_day" class="col-form-label text-md-left">
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
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-md-6">
                                                    <label for="loss_of_concentration" class="col-form-label text-md-left">
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
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <h3>
                                                Epworth Test
                                            </h3>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal__epworth_test">
                                                Take Epworth Test
                                            </button>

                                            <br>
                                            <br>
                                            <br>

                                            <h3>
                                                Snoring experienced during the night
                                            </h3>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal__snoring_scale_test">
                                                Take Snoring Scale Test
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row form-group text-right">
                                        <a
                                            href="{{route('dashboard.patients.create.step', ['step' => 'step2'])}}"
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
                                    Sitting and Reading
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
                                        >
                                    </th>
                                @endforeach
                            </tr>
                            <tr>
                                <td>
                                    Watching the Television
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
                                        >
                                    </th>
                                @endforeach
                            </tr>
                            <tr>
                                <td>
                                    Sitting inactive in a public place (cinema, theatre, ...)
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
                                        >
                                    </th>
                                @endforeach
                            </tr>
                            <tr>
                                <td>
                                    Being a passenger in a vehicle for an hour or more
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
                                        >
                                    </th>
                                @endforeach
                            </tr>
                            <tr>
                                <td>
                                    Laying down in the afternoon
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
                                        >
                                    </th>
                                @endforeach
                            </tr>
                            <tr>
                                <td>
                                    Sitting and talking to someone
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
                                        >
                                    </th>
                                @endforeach
                            </tr>
                            <tr>
                                <td>
                                    Sitting quietly after lunch (no alcohol)
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
                                        >
                                    </th>
                                @endforeach
                            </tr>
                            <tr>
                                <td>
                                    Stopped for a few minutes in traffic while driving
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
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

                            <table class="table" width="100%">
                                <tbody>
                                    @foreach(config('constants.night_snoring_experience') as $nightSnoreKey => $nightSnore)
                                        <tr>
                                            <td>
                                                <label
                                                    for="night_snoring_experience_{{ $nightSnoreKey }}"
                                                >
                                                <input
                                                    id="night_snoring_experience_{{ $nightSnoreKey }}"
                                                    name="night_snoring_experience"
                                                    type="radio"
                                                    class=""
                                                    value="{{ $nightSnoreKey }}"
                                                    required
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection



