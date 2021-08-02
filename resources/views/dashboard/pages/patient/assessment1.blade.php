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
                                    <h5>Obstructive sleep apnea symptoms</h5>
                                    
                                    <div class="form-check-inline">
                                        <label for="snorting">Snorting: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Apnea: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Shortness of breath while sleeping: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Average Step Duration: </label>
                                        <input type="text" name="average" id="" class="form-control">
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
                                        <label for="snorting">Nocturia: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Tired during the day: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label for="snorting">Headache in the morning: </label>
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Yes
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optradio">No
                                          </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Do you nap? </label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        </select>
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


