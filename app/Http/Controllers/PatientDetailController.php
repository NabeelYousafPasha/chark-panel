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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create(Patient $patient)
    {
        if (auth()->user()->cannot('view_patient'))
            return $this->permissionDenied('dashboard.index');

        $patientDetail = PatientDetail::where('patient_id', '=', $patient->id)
            ->latest()
            ->first();

        $form = $this->setForm(route('dashboard.patient-details.store', ['patient' => $patient]), 'POST', 'dashboard.pages.patient_detail._form', [
            'form_id' => 'create_form__patient_detail',
            'form_name' => 'create_form__patient_detail',
        ]);

        return $this->renderView('dashboard.pages.patient_detail.form', [
            'patient' => $patient,
            'form' => $form,
            'patientDetail' => $patientDetail,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PatientDetailRequest $patientDetailRequest
     * @param $patient
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PatientDetailRequest $patientDetailRequest, Patient $patient)
    {
        $patient_detail = PatientDetail::updateOrCreate([
             'patient_id' => $patient->id,
        ], $patientDetailRequest->validated());

        (! $patient_detail) ? $this->message('errorMessage') : $this->message('successMessage');

        return redirect()->route('dashboard.patients.show', ['patient' => $patient]);
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
            'page' => 'Patient Details',
            'resource' => 'Patient Details',
            'translationFromKey' => 'lang.models.patient_details.fillable',
            'crud' => [
                'CREATE_PATIENT_DETAIL' => [
                    'route' => 'javascript:void(0)',
                    'can' => ! auth()->user()->cannot('create_patient'),
                ],
                'EDIT_PATIENT_DETAIL' => [
                    'can' => ! auth()->user()->cannot('update_patient'),
                ],
                'DELETE_PATIENT_DETAIL' => [
                    'can' => ! auth()->user()->cannot('delete_patient'),
                ],
            ],
            'breadcrumbs' => array(
                [
                    'name' => 'Patients',
                    'route' => route('dashboard.patients.index'),
                    'active' => false,
                ],
                [
                    'name' => 'Patient Details',
                    'route' => 'javascript:void(0)',
                    'active' => true,
                ],
            ),
        ];
        return parent::renderView($view, array_merge($withParams, $params));
    }
}
