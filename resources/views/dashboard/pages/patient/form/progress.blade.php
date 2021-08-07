<!-- progressbar -->
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="row text-center">
            <div class="col-md-3 col-sm-3 col-xs-3">
                <h4>
                    <span class="label label-default @if(($step ?? '') == 'step1') label-primary @endif">
                        Step 1
                    </span>
                </h4>
                <p>
                    Symptoms
                </p>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <h4>
                    <span class="label label-default @if(($step ?? '') == 'step2') label-primary @endif">
                        Step 2
                    </span>
                </h4>
                Medical History
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <h4>
                    <span class="label label-default @if(($step ?? '') == 'step3') label-primary @endif">
                        Step 3
                    </span>
                </h4>
                Clinical Eploration
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
                <h4>
                    <span class="label label-default @if(($step ?? '') == 'step4') label-primary @endif">
                        Step 4
                    </span>
                </h4>
                Diagnostic Tests
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
</div>
