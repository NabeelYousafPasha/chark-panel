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
                                    <h5 class="text-center">Habits</h5>
                                    
                                    <div class="form-check-inline">
                                        <label for="snorting">Smoker: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Drinks alcoholic beaverges with dinner or before bed: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <h5 class="text-center">Medical History</h5>
                                    <div class="form-check-inline">
                                        <label for="snorting">High Blood Pressure: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Myocardical Infraction: </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">Yes
                                          </label>
                                          <label class="form-check-label">
                                              <input type="radio" class="form-check-input" name="optradio">No
                                            </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Fragmented Sleep: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Coronary artery disease: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Arrthymia: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Heart Failure: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Diabetes: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Depression: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Demintia: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Stroke: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Lung disease: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Hypothyroidism: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Other Diseases:</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Anxiolytics:</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Antidepresents:</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Other medication to help induce sleep:</label>
                                        <input type="text" class="form-control" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Other medication:</label>
                                        <input type="text" class="form-control" id="">
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


