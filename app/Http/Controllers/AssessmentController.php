<?php

namespace App\Http\Controllers;

use App\Http\Requests\Assessment\AssessmentRequest;
use App\Models\Assessment;
use App\Models\ClinicalExploration;
use App\Models\DiagnosticTest;
use App\Models\MedicalHistory;
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

        $patientAssessments = Assessment::addSelect([
                'assessments.*',
                DB::raw('CONCAT(users.first_name, " ", users.last_name) as full_name'),
            ])
            ->createdByUserJoin()
            ->where('patient_id', '=', $patient->id)
            ->latest();

        return $this->renderView('dashboard.pages.assessment.index', [
            'patient' => $patient,
            'patientAssessments' => $patientAssessments->get(),
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
        if (! in_array($step, ['step1', 'step2', 'step3', 'step4'])) {
            $this->message('errorMessage', 'Error: Invalid Step');

            return redirect()->route('dashboard.assessment.create.step', ['patient' => $patient, 'step' => 'step1']);
        }

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
            case 'step2': {
                $data['medicalHistory'] = $medicalHistory = MedicalHistory::create([
                        'assessment_id' => $assessment->id,
                    ] + $request->validated());

                (!$medicalHistory)
                    ? $this->message('errorMessage', 'Error: Something went wrong while saving Step 2')
                    : $this->message('successMessage', 'Success: Step 2 saved');

                $step = 'step3';
                break;
            }
            case 'step3': {
                $data['clinicalExploration'] = $clinicalExploration = ClinicalExploration::create(array_merge($request->validated(), [
                        'assessment_id' => $assessment->id,
                    ], ['upper_airway_surgery' => implode(config('constants.upper_airway_surgery_separator'), $request->input('upper_airway_surgery'))]));

                (!$clinicalExploration)
                    ? $this->message('errorMessage', 'Error: Something went wrong while saving Step 3')
                    : $this->message('successMessage', 'Success: Step 3 saved');

                $step = 'step4';
                break;
            }
            case 'step4': {
                $data['diagnosticTest'] = $diagnosticTest = DiagnosticTest::create(array_merge($request->validated(), [
                        'assessment_id' => $assessment->id,
                    ]));

                (!$diagnosticTest)
                    ? $this->message('errorMessage', 'Error: Something went wrong while saving Step 4')
                    : $this->message('successMessage', 'Success: Step 4 saved');

                return redirect()->route('dashboard.assessment.index', ['patient' => $patient]);
            }
            default : {
                $this->message('errorMessage', 'Error: Invalid Step');
                return redirect()->route('dashboard.assessment.create.step', ['patient' => $patient, 'step' => 'step1']);
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
        $symptom = Symptom::where('assessment_id', '=', $assessment->id)->first();
        $sleepinessScale = SleepinessScale::where('assessment_id', '=', $assessment->id)->first();
        $medicalHistory = MedicalHistory::where('assessment_id', '=', $assessment->id)->first();
        $diagnosticTest = DiagnosticTest::where('assessment_id', '=', $assessment->id)->first();
        $clinicalExploration = ClinicalExploration::where('assessment_id', '=', $assessment->id)->first();

        return $this->renderView('dashboard.pages.assessment.show', [
            'assessment' => $assessment,

            'symptom' => $symptom,
            'sleepinessScale' => $sleepinessScale,
            'medicalHistory' => $medicalHistory,
            'diagnosticTest' => $diagnosticTest,
            'clinicalExploration' => $clinicalExploration,

            'patient' => Patient::where('id', '=', $assessment->patient_id)->firstOrFail(),
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assessment  $assessment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Assessment $assessment, $step = 'step1')
    {
        $symptom = Symptom::where('assessment_id', '=', $assessment->id)->first();
        $sleepinessScale = SleepinessScale::where('assessment_id', '=', $assessment->id)->first();
        $medicalHistory = MedicalHistory::where('assessment_id', '=', $assessment->id)->first();
        $diagnosticTest = DiagnosticTest::where('assessment_id', '=', $assessment->id)->first();
        $clinicalExploration = ClinicalExploration::where('assessment_id', '=', $assessment->id)->first();

        return $this->renderView('dashboard.pages.assessment.form.'.$step, [
            'assessment' => $assessment,
            'step' => $step,

            'symptom' => $symptom,
            'sleepinessScale' => $sleepinessScale,
            'medicalHistory' => $medicalHistory,
            'diagnosticTest' => $diagnosticTest,
            'clinicalExploration' => $clinicalExploration,

            'patient' => Patient::where('id', '=', $assessment->patient_id)->firstOrFail(),
        ]);


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
                    // 'route' => route('dashboard.assessment.edit.step', ['patient' => $patient, 'step' => 'step1']),
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
