<?php

namespace App\Http\Controllers;

use App\Http\Requests\Assessment\AssessmentRequest;
use App\Models\Assessment;
use App\Models\Patient;
use App\Models\SleepinessScale;
use App\Models\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index(Patient $patient)
    {
        if (auth()->user()->cannot('view_assessment'))
            return $this->permissionDenied('dashboard.index');

        $patientAssessments = Assessment::where('patient_id', '=', $patient->id)
            ->latest()
            ->get();

        return $this->renderView('dashboard.pages.assessment.index', [
            'patient' => $patient,
            'patientAssessments' => $patientAssessments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create(Request $request, Patient $patient, $step = 'step1')
    {
        if (auth()->user()->cannot('view_assessment'))
            return $this->permissionDenied('dashboard.index');

        abort_if((! in_array($step, ['step1', 'step2', 'step3', 'step4'])
            ||
            ! view()->exists('dashboard.pages.assessment.form.'.$step))
            , 404);

        return $this->renderView('dashboard.pages.assessment.form.'.$step, [
            'patient' => $patient,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AssessmentRequest $request
     * @param Patient $patient
     * @param $step
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AssessmentRequest $request, Patient $patient, $step)
    {
        if (auth()->user()->cannot('create_assessment'))
            return $this->permissionDenied('dashboard.index');

        $data = [];

        $data['assessment'] = $assessment = Assessment::firstOrCreate([
            'patient_id' => $patient->id,
            'date' => now()->format('Y-m-d'),
            'created_by' => auth()->id(),
        ]);

        switch ($step) {
            case 'step1': {
                $data['symptom'] = $symptom = Symptom::create([
                    'assessment_id' => $assessment->id,
                ] + $request->validated());

                $data['sleepinessScale'] = $sleepinessScale = SleepinessScale::create([
                        'assessment_id' => $assessment->id,
                    ] + $request->validated());

                (!$symptom || !$sleepinessScale)
                    ? $this->message('errorMessage', 'Error: Something went wrong while saving Step 1')
                    : $this->message('successMessage', 'Success: Step 1 saved');

                $step = 'step2';
                break;
            }
        }



        return redirect()->route('dashboard.assessment.create.step', ['patient' => $patient, 'step' => $step]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function show(Assessment $assessment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assessment $assessment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assessment $assessment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assessment $assessment)
    {
        //
    }

    /**
     * @param mixed $view
     * @param array $withParams
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function renderView($view, array $withParams = [])
    {
        $patient = $withParams['patient'];

        $params = [
            'page' => 'Patient Assessment',
            'resource' => 'Assessment',
            'translationFromKey' => 'lang.models.assessment.fillable',
            'crud' => [
                'CREATE_ASSESSMENT' => [
                    'route' => route('dashboard.assessment.create.step', ['patient' => $patient, 'step' => 'step1']),
                    'can' => ! auth()->user()->cannot('create_assessment'),
                ],
                'EDIT_ASSESSMENT' => [
                    'can' => ! auth()->user()->cannot('update_assessment'),
                ],
                'DELETE_ASSESSMENT' => [
                    'can' => ! auth()->user()->cannot('delete_assessment'),
                ],
            ],
            'breadcrumbs' => array(
                [
                    'name' => 'Patients',
                    'route' => route('dashboard.patients.index'),
                    'active' => false,
                ],
                [
                    'name' => 'Assessment',
                    'route' => 'javascript:void(0)',
                    'active' => true,
                ],
            ),
        ];
        return parent::renderView($view, array_merge($withParams, $params));
    }
}
