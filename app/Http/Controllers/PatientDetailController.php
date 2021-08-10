<?php

namespace App\Http\Controllers;

use App\Models\{
    PatientDetail,
    Patient
};
use Illuminate\Http\Request;
use App\Http\Requests\PatientDetail\PatientDetailRequest;

class PatientDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Patient $patient)
    {
        if (auth()->user()->cannot('view_patient'))
            return $this->permissionDenied('dashboard.index');

        $form = $this->setForm(route('dashboard.patient-details.store', ['patient' => $patient]), 'POST', 'dashboard.pages.patient_detail._form', [
            'form_id' => 'create_form__patient_detail',
            'form_name' => 'create_form__patient_detail',
        ]);
        
        return $this->renderView('dashboard.pages.patient_detail.form', [
            'patient' => $patient, 
            'form' => $form,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientDetailRequest $request, $patient)
    {
        $patient_detail = PatientDetail::create($request->validated() + [
             'patient_id' => $patient,
            'created_by' => auth()->id(),
        ]);

        (! $patient_detail) ? $this->message('errorMessage') : $this->message('successMessage');

        return redirect()->route('dashboard.patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientDetail  $patientDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PatientDetail $patientDetail)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientDetail  $patientDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientDetail $patientDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PatientDetail  $patientDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatientDetail $patientDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientDetail  $patientDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientDetail $patientDetail)
    {
        //
    }

    protected function renderView($view, array $withParams = [])
    {
        $params = [
            'page' => 'Patients',
            'resource' => 'Patient',
            'translationFromKey' => 'lang.models.patient.fillable',
            'crud' => [
                'CREATE_PATIENT' => [
                    'route' => route('/'),
                    'can' => ! auth()->user()->cannot('create_patient'),
                ],
                'EDIT_PATIENT' => [
                    'can' => ! auth()->user()->cannot('update_patient'),
                ],
                'DELETE_PATIENT' => [
                    'can' => ! auth()->user()->cannot('delete_patient'),
                ],
            ],
            'breadcrumbs' => array(
                [
                    'name' => 'Patients',
                    'route' => route('dashboard.patients.index'),
                    'active' => true,
                ],
            ),
        ];
        return parent::renderView($view, array_merge($withParams, $params));
    }
}
