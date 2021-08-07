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

                                            <h4 class="">Obstructive Sleep Apnea Symptoms</h4>

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
                                            <p>Epworth test</p>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal__epworth_test">
                                            Take Epworth test
                                            </button>
                                            <p>Snorting experiencing during night</p>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal__snoring_scale_test">
                                            Take Snorting Scale Test
                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <a
                                            href="{{route('dashboard.patients.create.step', ['step' => 'step2'])}}"
                                            class="btn btn-primary"
                                        >
                                            Step 2
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

    <div class="modal fade" id="modal__epworth_test" tabindex="-1" role="dialog" aria-labelledby="modal__epworth_test_Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title" id="exampleModalLabel">
                      Epworth Sleepiness scale
                  </h1>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <h2>Select the chance of you dozing or falling asleep in these situations:</h2>
                  <div class="row">
                      <div class="col-md-4"></div>
                      <div class="col-md-2"><b>Never</b></div>
                      <div class="col-md-2"><b>Mild</b></div>
                      <div class="col-md-2"><b>Moderate</b></div>
                      <div class="col-md-2"><b>High</b></div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">Sitting and Reading</div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                </div>
                <div class="row">
                    <div class="col-md-4">Watching the Television</div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                </div>
                <div class="row">
                    <div class="col-md-4">Sitting inactive in a public place(cinema,theatre..)</div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                </div>
                <div class="row">
                    <div class="col-md-4">Being a passenger in a vehicle for an hour or more</div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                </div>
                <div class="row">
                    <div class="col-md-4">Lying down in the afternoon</div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                </div>
                <div class="row">
                    <div class="col-md-4">Sitting and talking to someone</div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                </div>
                <div class="row">
                    <div class="col-md-4">Sitting quietly after lunch(no alcohol)</div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                </div>
                <div class="row">
                    <div class="col-md-4">Stopped for a few minutes in traffic while dring</div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                    <div class="col-md-2"><input type="radio" class="form-check-input" name="optradio"></div>
                </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="modal__snoring_scale_test" tabindex="-1" role="dialog" aria-labelledby="modal__snoring_scale_test_Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Snorting Scale text</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <h3>Snorting experienced during the night</h3>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="row text-left">
                            <input class="form-check-input text-left" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                            <label class="form-check-label text-left" for="gridRadios1">
                                0 - Normal Breathing
                            </label>
                        </div>
                        <div class="row text-left">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                1 - Slightly heavy breathing
                            </label>
                        </div>
                        <div class="row text-left">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                2 - Heavy breathing
                            </label>
                        </div>
                        <div class="row text-left">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                3 - Very heavy breathing
                            </label>
                        </div>
                        <div class="row text-left">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                4 - Very slight snoring
                            </label>
                        </div>
                        <div class="row text-left">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                5 - Slight Snoring
                            </label>
                        </div>
                        <div class="row text-left">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                6 - Moderate snoring
                            </label>
                        </div>
                        <div class="row text-left">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                7 - Loud Snoring
                            </label>
                        </div>
                        <div class="row text-left">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                8 - Very loud Snoring
                            </label>
                        </div>
                        <div class="row text-left">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                9 - Unbearable snoring
                            </label>
                        </div>
                        <div class="row text-left">
                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                10 - Unbearable
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection



