<?php

namespace App\Http\Controllers;

use App\Http\Requests\Assessment\AssessmentRequest;
use App\Http\Requests\Upload\FileUploadRequest;
use App\Jobs\FileUpload;
use App\Models\{Assessment,
    AssessmentLink,
    ClinicalExploration,
    DiagnosticTest,
    LocalMedia,
    MedicalHistory,
    Patient,
    SleepinessScale,
    Symptom,
    TeethJaw};
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\Models\Media;

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
    public function create(Request $request, Patient $patient, $step = 'step1', ?Assessment $assessmentPerformed = null)
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

        $with = [];

        $error = false;
        if ($step != 'step1') {
            // only occur first time
            $assessment = Assessment::where('patient_id', '=', $patient->id);

            if($assessmentPerformed) {
                $assessment = $assessment->where('id', '=', $assessmentPerformed->id);
            }
            $assessment = $assessment->latest()->firstOrFail();

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

                    $jawTeeth = TeethJaw::orderBy('jaw', 'DESC')->orderBy('position', 'DESC')->get();
                    $upperJawTeeth = $jawTeeth->where('jaw', '=', 1);
                    $lowerJawTeeth = $jawTeeth->where('jaw', '=', 0);

                    $with = [
                        'upperJawTeeth' => $upperJawTeeth,
                        'lowerJawTeeth' => $lowerJawTeeth,
                    ];

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

        return $this->renderView('dashboard.pages.assessment.form.'.$step, array_merge([
            'patient' => $patient,

            'assessment' => $assessment ?? null,

            'form' => 'create',
            '_method' => 'POST',
            'route' => route('dashboard.assessment.store.step', [
                'patient' => $patient, 'step' => $step,
            ]),
        ], $with));
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
                $data['symptom'] = $symptom = Symptom::updateOrCreate([
                    'assessment_id' => $assessment->id,
                ], array_merge($request->validated(), [
                    'night_snoring_experience' => $request->input('night_snoring_experience') ?? 0,
                ]));

                $data['sleepinessScale'] = $sleepinessScale = SleepinessScale::updateOrCreate([
                        'assessment_id' => $assessment->id,
                    ], $request->validated());

                (!$symptom || !$sleepinessScale)
                    ? $this->message('errorMessage', 'Error: Something went wrong while saving Step 1')
                    : $this->message('successMessage', 'Success: Step 1 saved');

                $step = 'step2';
                break;
            }
            case 'step2': {
                $data['medicalHistory'] = $medicalHistory = MedicalHistory::updateOrCreate([
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

                $data['clinicalExploration'] = $clinicalExploration = ClinicalExploration::updateOrCreate([
                    'assessment_id' => $assessment->id,
                ], array_merge($request->validated(), [
                        'upper_airway_surgery_value' => ! empty($upperAirwaySurgeryValue) ? $upperAirwaySurgeryValue : NULL,
                ]));

                (!$clinicalExploration)
                    ? $this->message('errorMessage', 'Error: Something went wrong while saving Step 3')
                    : $this->message('successMessage', 'Success: Step 3 saved');

                $step = 'step4';
                break;
            }
            case 'step4': {

                $data['diagnosticTest'] = $diagnosticTest = DiagnosticTest::updateOrCreate([
                    'assessment_id' => $assessment->id,
                ], $request->validated());

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

        return redirect()->route('dashboard.assessment.create.step', [
            'patient' => $patient,
            'step' => $step,
            'assessmentPerformed' => $assessment,
        ]);
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

            'assessmentLinks' => AssessmentLink::where('assessment_id', '=', $assessment->id)->get(),

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

        $jawTeeth = TeethJaw::orderBy('jaw', 'DESC')->orderBy('position', 'DESC')->get();
        $upperJawTeeth = $jawTeeth->where('jaw', '=', 1);
        $lowerJawTeeth = $jawTeeth->where('jaw', '=', 0);

        return $this->renderView('dashboard.pages.assessment.form.'.$step, [
            'assessment' => $assessment,
            'step' => $step,

            'symptom' => $symptom,
            'sleepinessScale' => $sleepinessScale,
            'medicalHistory' => $medicalHistory,
            'diagnosticTest' => $diagnosticTest,
            'clinicalExploration' => $clinicalExploration,

            'patient' => $patient,

            'upperJawTeeth' => $upperJawTeeth,
            'lowerJawTeeth' => $lowerJawTeeth,

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


    public function storeMedia(FileUploadRequest $request, Assessment $assessment, $mediaType, $requestAjaxType = false)
    {
        try {
            $file = $request->file($mediaType);
            $fileName = 'p#'.$assessment->patient_id.'-a#'.$assessment->id.'-'.'by-'.auth()->id().'-'.time().'-'.$file->getClientOriginalName();
            $fileName = strtolower(preg_replace('/\s+/', '-', $fileName));

            $movedFile = $file->storeAs('patient-'.$assessment->patient_id.'/assessment-'.$assessment->id.'/'.$mediaType, $fileName, 'public');

            $localMedia = LocalMedia::create([
                'assessment_id' => $assessment->id,
                'name' => $fileName,
                'media_type' => $mediaType,
                'extension' => $file->getClientOriginalExtension(),
                'folder' => $mediaType,
                'path' => $movedFile,
                'uploaded_by' => auth()->id(),
            ]);

            $this->message('successMessage', 'File is queued to be processed.');

            if ($requestAjaxType) {
                return response()->json([
                    'success' => true,
                    'message' => 'File is queued to be processed.',
                    'file'    => $movedFile,
                    'local_media' => $localMedia,
                ]);
            }

            return redirect()->back();


        } catch (\Exception $exception) {

            $this->message('errorMessage', 'Error: '.$exception->getMessage());

            if ($requestAjaxType) {
                return response()->json([
                    'success' => false,
                    'message' => $exception->getMessage(),
                ]);
            }

            return redirect()->back()->with([
                'errors' => $exception->getCode().' - '.$exception->getMessage(),
            ]);
        }
    }

    public function storeLinks(Request $request, Assessment $assessment, $mediaType)
    {
        $mediaTypes = [
            'cbct',
        ];

        if (! in_array($mediaType, $mediaTypes)) {
            return redirect()->back()->with([
                'errors' => 'Media type not allowed',
            ]);
        }

        $rules = [
            "cbct" => ['required', 'string', 'url', 'max:255',],
        ];

        $this->validate($request, $rules);

        $assessmentLink = AssessmentLink::create([
            'assessment_id' => $assessment->id,
            'type' => $mediaType,
            'link' => $request->input('cbct'),
            'created_by' => auth()->id(),
        ]);

        $assessmentLink
            ? $this->message('successMessage', 'CBCT link attached')
            : $this->message('errorMessage', 'Link could not be attached');

        return redirect()->back();
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

    public function migrateToAWS(LocalMedia $localMedia)
    {
        $movedFile = $localMedia->path;
        $assessment = Assessment::where('id', '=', $localMedia->assessment_id)->first();

        // dispatching job
        FileUpload::dispatch($movedFile, $assessment, $localMedia->media_type, 's3');

        return response()->json([
            'success' => true,
            'message' => 'queue started',
        ], Response::HTTP_OK);
    }

    public function deleteLocalMedia(LocalMedia $localMedia)
    {
        try {
            $deleted = $localMedia->delete();

            return response()->json([
                'success' => true,
                'deleted' => $deleted,
                'message' => 'local file deleted',
            ], Response::HTTP_NO_CONTENT);

        } catch (\Exception $exception) {

            return response()->json([
                'success' => false,
                'deleted' => 0,
                'message' => $exception->getMessage(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);

        }
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
