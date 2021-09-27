<?php

namespace App\Http\Controllers;

use App\Http\Requests\Assessment\AssessmentRequest;
use App\Http\Requests\Upload\FileUploadRequest;
use App\Models\{
    Assessment,
    ClinicalExploration,
    DiagnosticTest,
    MedicalHistory,
    Patient,
    SleepinessScale,
    Symptom
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        if (auth()->user()->cannot('create_assessment'))
            return $this->permissionDenied('dashboard.index');

        abort_if((! in_array($step, ['step1', 'step2', 'step3', 'step4'])
            ||
            ! view()->exists('dashboard.pages.assessment.form.'.$step))
            , 404);

        if (! in_array($step, ['step1', 'step2', 'step3', 'step4'])) {
            $this->message('errorMessage', 'Error: Invalid Step');

            return redirect()->route('dashboard.assessment.create.step', ['patient' => $patient, 'step' => 'step1']);
        }

        $error = false;
        if ($step != 'step1') {
            // only occur first time
            $assessment = Assessment::where('patient_id', '=', $patient->id)->latest()->firstOrFail();

            switch ($step) {
                case 'step2': {
                    $symptom = Symptom::where('assessment_id', '=', $assessment->id)->first();
                    $sleepinessScale = SleepinessScale::where('assessment_id', '=', $assessment->id)->first();

                    if (is_null($symptom) || is_null($sleepinessScale)) {
                        $error = true;
                        $this->message('errorMessage', 'Error: Please fill Previous Step.');
                    }
                    break;
                }
                case 'step3': {
                    $medicalHistory = MedicalHistory::where('assessment_id', '=', $assessment->id)->first();

                    if (is_null($medicalHistory)) {
                        $error = true;
                        $this->message('errorMessage', 'Error: Please fill Previous Step.');
                    }
                    break;
                }
                case 'step4': {
                    $clinicalExploration = ClinicalExploration::where('assessment_id', '=', $assessment->id)->first();

                    if (is_null($clinicalExploration)) {
                        $error = true;
                        $this->message('errorMessage', 'Error: Please fill Previous Step.');
                    }
                    break;
                }
            }

            // error
            if ($error) {
                $step = 'step'.((int) str_replace('step', '', $step)  - 1);
                if (! in_array($step, ['step1', 'step2', 'step3', 'step4',])) {
                    $step = 'step1';
                }

                return redirect()->route('dashboard.assessment.create.step', [
                    'patient' => $patient,
                    'step' => $step,
                ]);
            }
        }

        return $this->renderView('dashboard.pages.assessment.form.'.$step, [
            'patient' => $patient,

            'form' => 'create',
            '_method' => 'POST',
            'route' => route('dashboard.assessment.store.step', [
                'patient' => $patient, 'step' => $step,
            ]),
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

        if (! in_array($step, ['step1', 'step2', 'step3', 'step4'])) {
            $this->message('errorMessage', 'Error: Invalid Step');

            return redirect()->route('dashboard.assessment.create.step', ['patient' => $patient, 'step' => 'step1']);
        }

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

                $upperAirwaySurgeryValue = implode(config('constants.upper_airway_surgery_separator'), $request->input('upper_airway_surgery_value') ?? []);

                $data['clinicalExploration'] = $clinicalExploration = ClinicalExploration::create(array_merge($request->validated(), [
                        'assessment_id' => $assessment->id,
                    ], [
                        'upper_airway_surgery_value' => ! empty($upperAirwaySurgeryValue) ? $upperAirwaySurgeryValue : NULL,
                ]));

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

                $errorMessages = [];

                if ($request->hasfile('cbct')) {
                    $uploadViaHelper = uploadFile($assessment, 'cbct', 's3');

                    // if not uploaded, set error message
                    if (!$uploadViaHelper['success'] ?? true) {
                        $errorMessages[] = 'CBCT: Error uploading CBCT.';
                    }
                }

                if ($request->hasFile('photos')) {
                    $uploadViaHelper = uploadFile($assessment, 'photos', 's3');

                    // if not uploaded, set error message
                    if (!$uploadViaHelper['success'] ?? true) {
                        $errorMessages[] = 'Photos: Error uploading Photos.';
                        break;
                    }
                }

                if ($request->hasFile('xray')) {
                    $uploadViaHelper = uploadFile($assessment, 'xray', 's3');

                    // if not uploaded, set error message
                    if (!$uploadViaHelper['success'] ?? true) {
                        $errorMessages[] = 'X-Ray: Error uploading xray.';
                        break;
                    }
                }

                if ($request->hasfile('sleep_study')) {
                    $uploadViaHelper = uploadFile($assessment, 'sleep_study', 's3');

                    // if not uploaded, set error message
                    if (!$uploadViaHelper['success'] ?? true) {
                        $errorMessages[] = 'Sleep Study: Error uploading Sleep Study.';
                    }
                }

                if (! empty($errorMessages)) {
                    $this->message('errorMessage', 'Data was saved but errors in uploading files. Details: '.implode('.', $errorMessages));
                    return redirect()->route('dashboard.assessment.show', ['assessment' => $assessment]);
                }

                (!$diagnosticTest)
                    ? $this->message('errorMessage', 'Error: Something went wrong while saving Step 4')
                    : $this->message('successMessage', 'Success: Step 4 saved');

                return redirect()->route('dashboard.assessment.show', ['assessment' => $assessment]);
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(Assessment $assessment)
    {
        if (auth()->user()->cannot('view_assessment'))
            return $this->permissionDenied('dashboard.index');

        $symptom = Symptom::where('assessment_id', '=', $assessment->id)
                    ->latest()
                    ->first();
        $sleepinessScale = SleepinessScale::where('assessment_id', '=', $assessment->id)
                    ->latest()
                    ->first();
        $medicalHistory = MedicalHistory::where('assessment_id', '=', $assessment->id)
                    ->latest()
                    ->first();
        $diagnosticTest = DiagnosticTest::where('assessment_id', '=', $assessment->id)
                    ->latest()
                    ->first();
        $clinicalExploration = ClinicalExploration::where('assessment_id', '=', $assessment->id)
                    ->latest()
                    ->first();

        $assessment = $assessment->with('media')->where('id', '=', $assessment->id)->first();

        return $this->renderView('dashboard.pages.assessment.show', [
            'assessment' => $assessment,

            'symptom' => $symptom,
            'sleepinessScale' => $sleepinessScale,
            'medicalHistory' => $medicalHistory,
            'diagnosticTest' => $diagnosticTest,
            'clinicalExploration' => $clinicalExploration,

            'patient' => Patient::where('id', '=', $assessment->patient_id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assessment  $assessment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Assessment $assessment, $step = 'step1')
    {
        if (auth()->user()->cannot('update_assessment'))
            return $this->permissionDenied('dashboard.index');

        abort_if((! in_array($step, ['step1', 'step2', 'step3', 'step4'])
            ||
            ! view()->exists('dashboard.pages.assessment.form.'.$step))
            , 404);

        $patient = Patient::where('id', '=', $assessment->patient_id)->first();

        if (! in_array($step, ['step1', 'step2', 'step3', 'step4'])) {
            $this->message('errorMessage', 'Error: Invalid Step');

            return redirect()->route('dashboard.assessment.create.step', ['patient' => $patient, 'step' => 'step1']);
        }

        $symptom = Symptom::where('assessment_id', '=', $assessment->id)->latest()
                    ->first();
        $sleepinessScale = SleepinessScale::where('assessment_id', '=', $assessment->id)->latest()
                    ->first();
        $medicalHistory = MedicalHistory::where('assessment_id', '=', $assessment->id)->latest()
                    ->first();
        $diagnosticTest = DiagnosticTest::where('assessment_id', '=', $assessment->id)->latest()
                    ->first();
        $clinicalExploration = ClinicalExploration::where('assessment_id', '=', $assessment->id)->latest()
                    ->first();

        return $this->renderView('dashboard.pages.assessment.form.'.$step, [
            'assessment' => $assessment,
            'step' => $step,

            'symptom' => $symptom,
            'sleepinessScale' => $sleepinessScale,
            'medicalHistory' => $medicalHistory,
            'diagnosticTest' => $diagnosticTest,
            'clinicalExploration' => $clinicalExploration,

            'patient' => $patient,

            'form' => 'create',
            '_method' => 'PATCH',
            'route' => route('dashboard.assessment.update.step', [
                'assessment' => $assessment,
                'step' => $step,
                'patient' => $patient,
            ]),
        ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param AssessmentRequest $request
     * @param \App\Models\Assessment $assessment
     * @param string $step
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AssessmentRequest $request, Assessment $assessment, $step = 'step1')
    {
        if (auth()->user()->cannot('update_assessment'))
            return $this->permissionDenied('dashboard.index');

        abort_if((! in_array($step, ['step1', 'step2', 'step3', 'step4'])
            ||
            ! view()->exists('dashboard.pages.assessment.form.'.$step))
            , 404);

        $patient = Patient::where('id', '=', $assessment->patient_id)->first();

        if (! in_array($step, ['step1', 'step2', 'step3', 'step4'])) {
            $this->message('errorMessage', 'Error: Invalid Step');

            return redirect()->route('dashboard.assessment.edit.step', ['assessment' => $assessment, 'step' => 'step1', 'patient' => $patient,]);
        }

        switch ($step) {
            case 'step1': {
                $data['symptom'] = $symptom = Symptom::updateOrcreate([
                        'assessment_id' => $assessment->id,
                    ], $request->validated());

                $data['sleepinessScale'] = $sleepinessScale = SleepinessScale::updateOrcreate([
                        'assessment_id' => $assessment->id,
                    ], $request->validated());

                (!$symptom || !$sleepinessScale)
                    ? $this->message('errorMessage', 'Error: Something went wrong while saving Step 1')
                    : $this->message('successMessage', 'Success: Step 1 saved');

                $step = 'step2';
                break;
            }
            case 'step2': {
                $data['medicalHistory'] = $medicalHistory = MedicalHistory::updateOrcreate([
                        'assessment_id' => $assessment->id,
                    ], $request->validated());

                (!$medicalHistory)
                    ? $this->message('errorMessage', 'Error: Something went wrong while saving Step 2')
                    : $this->message('successMessage', 'Success: Step 2 saved');

                $step = 'step3';
                break;
            }
            case 'step3': {

                $upperAirwaySurgeryValue = implode(config('constants.upper_airway_surgery_separator'), $request->input('upper_airway_surgery_value') ?? []);

                $data['clinicalExploration'] = $clinicalExploration = ClinicalExploration::updateOrcreate([
                        'assessment_id' => $assessment->id,
                    ], array_merge($request->validated(), [
                        'upper_airway_surgery_value' => ! empty($upperAirwaySurgeryValue) ? $upperAirwaySurgeryValue : NULL,
                    ])
                );

                (!$clinicalExploration)
                    ? $this->message('errorMessage', 'Error: Something went wrong while saving Step 3')
                    : $this->message('successMessage', 'Success: Step 3 saved');

                $step = 'step4';
                break;
            }
            case 'step4': {
                $data['diagnosticTest'] = $diagnosticTest = DiagnosticTest::updateOrcreate([
                    'assessment_id' => $assessment->id,
                ], $request->validated());

                (!$diagnosticTest)
                    ? $this->message('errorMessage', 'Error: Something went wrong while saving Step 4')
                    : $this->message('successMessage', 'Success: Step 4 saved');

                return redirect()->route('dashboard.assessment.show', ['assessment' => $assessment]);
            }
            default : {
                $this->message('errorMessage', 'Error: Invalid Step');
                return redirect()->route('dashboard.assessment.edit.step', ['assessment' => $assessment, 'step' => 'step1', 'patient' => $patient,]);
            }
        }

        return redirect()->route('dashboard.assessment.edit.step', ['assessment' => $assessment, 'step' => $step, 'patient' => $patient,]);
    }


    public function storeMedia(FileUploadRequest $request, Assessment $assessment, $mediaType)
    {
        dd($request->all(), $assessment, $mediaType);
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
