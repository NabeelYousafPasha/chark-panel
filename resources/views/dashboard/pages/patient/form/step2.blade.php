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
                                    <fieldset>
                                        <form action="">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <h3 class="fs-subtitle">Habits</h3>
                                                    <div class="form-check-inline">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="snorting">Smoker: </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="optradio">Yes
                                                                </label>
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="optradio">No
                                                                    </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check-inline">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="snorting">Drinks alcoholic beaverges with dinner or before bed: </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="optradio">Yes
                                                                </label>
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="optradio">No
                                                                    </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h3 class="fs-subtitle">Medical History</h3>
                                                            <div class="form-check-inline">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="snorting">High Blood Pressure: </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">Yes
                                                                        </label>
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">No
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-check-inline">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="snorting">Myocardical Infraction: </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">Yes
                                                                        </label>
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">No
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-check-inline">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="snorting">Coronary Artery Disease: </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">Yes
                                                                        </label>
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">No
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="snorting">Arrythmia: </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">Yes
                                                                        </label>
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">No
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="snorting">Heart Failure: </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">Yes
                                                                        </label>
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">No
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="snorting">Diabetes: </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">Yes
                                                                        </label>
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">No
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="snorting">Depression: </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">Yes
                                                                        </label>
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">No
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="snorting">Dimentia: </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">Yes
                                                                        </label>
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">No
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="snorting">Stroke: </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">Yes
                                                                        </label>
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">No
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="snorting">Lung Disease: </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">Yes
                                                                        </label>
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">No
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="snorting">Hypothyroidism: </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">Yes
                                                                        </label>
                                                                        <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">No
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-check-inline">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="snorting">Other Diseases: </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" name="" id="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                </div>
                                                <div class="col-md-6">
                                                <label for="">Anxiolytics</label>
                                                <input type="text" name="" id="">
                                                <label for="">Antidopressants</label>
                                                <input type="text" name="" id="">
                                                <label for="">Other medication to help induce sleep:</label>
                                                <input type="text" name="" id="">
                                                <label for="">Other medication:</label>
                                                <input type="text" name="" id="">
                                                </div>
                                            </div>
                                            <a href="{{route('dashboard.patients.create.step', ['step' => 'step3'])}}" class="btn btn-primary" type="submit">Step 3</a>
                                        </form>


                                    </fieldset>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



