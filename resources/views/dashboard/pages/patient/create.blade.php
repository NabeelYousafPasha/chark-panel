@extends('dashboard.layout.app')

@section('stylesheets')
<style>
    /*custom font*/
@import url(https://fonts.googleapis.com/css?family=Montserrat);

/*basic reset*/

/*form styles*/
#msform {
    text-align: center;
    position: relative;
    margin-top: 30px;
    width: 1000px;
    margin-left: -277px;
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0px;
    box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
    padding: 20px 30px;
    box-sizing: border-box;
    width: 80%;
    margin: 0 10%;

    /*stacking fieldsets above each other*/
    position: relative;
}

/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
    display: none;
}

/*inputs*/
#msform input, #msform textarea {
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 10px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    font-size: 13px;
}

#msform input:focus, #msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #1ab394;
    outline-width: 0;
    transition: All 0.5s ease-in;
    -webkit-transition: All 0.5s ease-in;
    -moz-transition: All 0.5s ease-in;
    -o-transition: All 0.5s ease-in;
}

/*buttons*/
#msform .action-button {
    width: 100px;
    background: #1ab394;0979;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 25px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
}

#msform .action-button:hover, #msform .action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #1ab394;
}

#msform .action-button-previous {
    width: 100px;
    background: #C5C5F1;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 25px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
}

#msform .action-button-previous:hover, #msform .action-button-previous:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #C5C5F1;
}

/*headings*/
.fs-title {
    font-size: 18px;
    text-transform: uppercase;
    color: #2C3E50;
    margin-bottom: 10px;
    letter-spacing: 2px;
    font-weight: bold;
}

.fs-subtitle {
    font-weight: normal;
    font-size: 13px;
    color: #666;
    margin-bottom: 20px;
}

/*progressbar*/
#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    /*CSS counters to number the steps*/
    counter-reset: step;
}

#progressbar li {
    list-style-type: none;
    color: #000;
    text-transform: uppercase;
    font-size: 9px;
    width: 24.33%;
    float: left;
    position: relative;
    letter-spacing: 1px;
}

#progressbar li:before {
    content: counter(step);
    counter-increment: step;
    width: 24px;
    height: 24px;
    line-height: 26px;
    display: block;
    font-size: 12px;
    color: #333;
    background: white;
    border-radius: 25px;
    margin: 0 auto 10px auto;
}

/*progressbar connectors*/
#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: white;
    position: absolute;
    left: -50%;
    top: 9px;
    z-index: -1; /*put it behind the numbers*/
}

#progressbar li:first-child:after {
    /*connector not needed before the first step*/
    content: none;
}

/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before, #progressbar li.active:after {
    background: #1ab394;
    color: white;
}


/* Not relevant to this form */
.dme_link {
    margin-top: 30px;
    text-align: center;
}
.dme_link a {
    background: #FFF;
    font-weight: bold;
    color: #1ab394;
    border: 0 none;
    border-radius: 25px;
    cursor: pointer;
    padding: 5px 25px;
    font-size: 12px;
}

.dme_link a:hover, .dme_link a:focus {
    background: #C5C5F1;
    text-decoration: none;
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
                        <h5>New {{ $page }}</h5>
                    </div>
                    <div class="ibox-content">
                        <!-- MultiStep Form -->
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <form id="msform">
                                    <!-- progressbar -->
                                    <ul id="progressbar">
                                        <li class="active">Symptoms</li>
                                        <li>Medical History</li>
                                        <li>Clinical Eploration</li>
                                        <li>Diagnostic Tests</li>
                                    </ul>
                                    <!-- fieldsets -->
                                    <fieldset>
                                        <h3 class="fs-subtitle">Obstructive Sleep Apnea symptoms</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-check-inline">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="snorting">Snorting: </label>
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

                                                    <div class="form-check-inline">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="snorting">Apnea: </label>
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
                                                                <label for="snorting">Shortness of breath while sleeping: </label>
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
                                                                <label for="snorting">Average Step Duration: </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" name="average" id="" class="form-control">
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                    </div>

                                                    <div class="form-check-inline">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="snorting">Fragmented Sleep: </label>
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
                                                                <label for="snorting">Nocturia: </label>
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
                                                                <label for="snorting">Tired during the day: </label>
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
                                                                <label for="snorting">Headache in the morning: </label>
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

                                                     <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="exampleFormControlSelect1">Do you nap? </label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <select class="form-control" id="exampleFormControlSelect1">
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                     </div>

                                                     <div class="form-check-inline">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="snorting">Sleepiness during the day: </label>
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
                                                                <label for="snorting">Loss of concentration: </label>
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
                                                    </div></div>
                                            <div class="col-md-6">
                                                <p>Epworth test</p>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                Take Epworth test
                                                </button>
                                                <p>Snorting experiencing during night</p>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
                                                Take Snorting Scale Test
                                                </button>

                                            </div>
                                        </div>
                                        <input type="button" name="next" class="next action-button" value="Next"/>
                                    </fieldset>
                                    <fieldset>
                                        
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
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                        <input type="button" name="next" class="next action-button" value="Next"/>
                                    </fieldset>
                                    <fieldset>
                                        <h3 class="fs-title">Previous Treatments:</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-check-inline">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="snorting">CPAP: </label>
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
                                                            <label for="snorting">Mundibular Advancement: </label>
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
                                                            <label for="snorting">Positional Therapy: </label>
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
                                                            <label for="snorting">Upper Airway surgery: </label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                                    <label class="form-check-label" for="exampleCheck1">Nasal</label>
                                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                                    <label class="form-check-label" for="exampleCheck1">Palatal</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                                    <label class="form-check-label" for="exampleCheck1">Lingual</label>
                                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                                    <label class="form-check-label" for="exampleCheck1">Muscular advancement</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-check-inline">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="snorting">Other upper airway surgery: </label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" name="" id="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-check-inline">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="snorting">Bariatric surgery (weightloss surgery): </label>
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
                                                            <label for="snorting">Other treatments for sleep apnea or snorting: </label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" name="" id="">
                                                        </div>
                                                    </div>
                                                </div>




                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Height(cm)</label>
                                                    <input type="text" name="" id="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Weight(kg)</label>
                                                    <input type="text" name="" id="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Body Mass Index(BMI)</label>
                                                    <input type="text" name="" id="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Neck Circumference(cm)</label>
                                                    <input type="text" name="" id="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Beats per minute</label>
                                                    <input type="text" name="" id="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Systolic Blood Pressure</label>
                                                    <input type="text" name="" id="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">diasystolic Blood Pressure</label>
                                                    <input type="text" name="" id="">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class="fs-subtitle"></h3>
                                                <div class="form-check-inline">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="snorting">Signs of Bruxism: </label>
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
                                                            <label for="snorting">Pointed hard palate: </label>
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
                                                            <label for="snorting">Noise when moving the TMJ: </label>
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
                                                            <label for="snorting">TMJ pain when mouth is open for one minute: </label>
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
                                                            <label for="snorting">Bilateral crossbite: </label>
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
                                                            <label for="snorting">Lateral Crossbite: </label>
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


                                            </div>


                                            <div class="col-md-6">
                                                <h3 class="fs-subheading"> Mondular Morphology according to facial Profile</h3>
                                                <div class="form-check-inline">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="snorting">Normognathic: </label>
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
                                                            <label for="snorting">Retrognathico: </label>
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
                                                            <label for="snorting">Prognathic: </label>
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

                                                <h3 class="fs-subheading">Type of bite</h3>

                                                <div class="form-check-inline">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="snorting">Edge to edge bite: </label>
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
                                                            <label for="snorting">Anterior crossbite: </label>
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
                                                            <label for="snorting">Overbite: </label>
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
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="col-md-4">
                                                        <div class="form-check-inline">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="snorting">I Total visibilty of tonsils, uvula, and soft palate: </label>
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
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check-inline">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="snorting">II Total visibilty of hard and soft palate, upper portion of tonsils and uvula: </label>
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
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check-inline">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="snorting">III Total visibilty of hard palate and part of soft palate above the uvula: </label>
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
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check-inline">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="snorting">IV Viibility of only hard palate: </label>
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
                                                    </div>
                                                </div>



                                                <div class="col-md-6">
                                                    <label for="">Assessment</label>
                                                    <textarea name="" id="" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                        <input type="button" name="next" class="next action-button" value="Next"/>
                                    </fieldset>
                                    <fieldset>
                                        <h2 class="fs-title">Upload document here</h2>
                                        <div class="row">
                                            <div class="col-md-6 shadow">
                                               <div class="row">
                                                <label for="">Polygraph</label>
                                                <input type="file" name="" id="">
                                                <label for="">Polychemography</label>
                                                <input type="file" name="" id="">
                                               </div>
                                               <div class="row">
                                                <label for="">IAH</label>
                                                <input type="text" name="" id="">
                                                <label for="">IA</label>
                                                <input type="text" name="" id="">
                                                <label for="">IH</label>
                                                <input type="text" name="" id="">
                                               </div>
                                               <div class="row">
                                                <label for="">SAT 02min (%)</label>
                                                <input type="text" name="" id="">
                                                <label for="">CT 90 (%)</label>
                                                <input type="text" name="" id="">
                                               </div>

                                               <label for="">Average duration of apnea(sec):</label>
                                                <input type="text" name="" id="">
                                                <label for="">Maximum duration of apnea(sec):</label>
                                                <input type="text" name="" id="">
                                                <label for="">Assessment Observation:</label>
                                                <textarea name="" id="" cols="30" rows="10"></textarea>
                                            </div>


                                            <div class="col-md-6 shadow">
                                               <h2>I do not have previous assessment</h2>
                                            </div>
                                        </div>
                                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                        <input type="submit" name="submit" class="submit action-button" value="Submit"/>
                                    </fieldset>
                                </form>
                                <!-- link to designify.me code snippets -->
                                <div class="dme_link">
                                    <p><a href="http://designify.me/code-snippets-js/" target="_blank">More Code Snippets</a></p>
                                </div>
                                <!-- /.link to designify.me code snippets -->
                            </div>
                        </div>
                        <!-- /.MultiStep Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title" id="exampleModalLabel"> Epworth Sleepiness scale</h1>
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
      <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    

//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})
</script>
@endsection



