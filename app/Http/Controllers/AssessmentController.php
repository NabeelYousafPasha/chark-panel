<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Patient;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Patient $patient)
    {
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create(Request $request, Patient $patient, $step = 'step1')
    {
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
