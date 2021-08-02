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
                        <div class="row">
                            <div class="">
                                <form action="" method="post">
                                    @csrf
                                    <h5 class="text-center">Previous Treatments</h5>
                                    
                                    <div class="form-check-inline">
                                        <label for="snorting">CPAP: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Mandlbular advancement device: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Positional Therapy: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Upper Airway Surgery: </label>
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Other upper airway surgery: </label>
                                        <input type="text" name="" id="">
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Bariatric Surgery (weightloss surgery): </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Other teatments for sleep apnea or snorting: </label>
                                        <input type="text" name="" id="">
                                    </div>
                                    <hr>
                                    <h5 class="text-center">Oral Exam</h5>
                                    <div class="form-check-inline">
                                        <label for="snorting">Signs of Bruxism: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Pointed hard palate: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Noise when moving TMJ: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">TMJ pain when mouth is open 1cm for 1 minute: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Bilateral Crossbite: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Lateral Crossbite: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <h5 class="text-center">Physical Exam</h5>
                                    <div class="form-check-inline">
                                        <label for="snorting">Height(cm): </label>
                                        <input type="text" name="" id="">
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Weight(kg): </label>
                                        <input type="text" name="" id="">
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Body Mass Index(BMI): </label>
                                        <input type="text" name="" id="">
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Neck circumference(cm): </label>
                                        <input type="text" name="" id="">
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Beats per minute: </label>
                                        <input type="text" name="" id="">
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Systolic blood pressure: </label>
                                        <input type="text" name="" id="">
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Diastolic blood pressure: </label>
                                        <input type="text" name="" id="">
                                    </div>
                                    <h5 class="text-center">Mandibular mophology according to facial profile</h5>
                                    <div class="form-check-inline">
                                        <label for="snorting">Normognathic: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Retrogathico: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Prognathic: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <h5 class="text-center">Type of bite</h5>
                                    <div class="form-check-inline">
                                        <label for="snorting">Edge to edge bite: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Anterior crossbite: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Overbite: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <h5>Lingual Position Classification (Friedman classification)</h5>
                                    <div class="form-check-inline">
                                        <label for="snorting">I Total visibility of tonsils, uvula an dsoft palate: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">II Visibility of hard and soft palate, upper portion of tonsils and uvula: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">II Visibility of hard palate and soft palate above uvula: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Assessment Observation</label>
                                        <textarea name="" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


