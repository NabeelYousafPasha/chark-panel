<?php

namespace App\Http\Controllers;

use App\Http\Requests\Patient\PatientRequest;
use App\Models\Clinic;
use App\Models\Patient;
use App\Models\PatientDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        if (auth()->user()->cannot('view_patient'))
            return $this->permissionDenied('dashboard.index');

        $patients = Patient::addSelect([
                'patients.*',
                'users.username',
                'clinics.name as clinic_name',
                'countries.name as country_name',
            ])
            ->clinicJoin()
            ->createdByUser()
            ->countryJoin();

        return $this->renderView('dashboard.pages.patient.index', [
            'patients' => $patients->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        if (auth()->user()->cannot('view_patient'))
            return $this->permissionDenied('dashboard.index');

        $clinics = Clinic::pluck('name', 'id');
        $countries = DB::table('countries')->pluck('name', 'id');

        $form = $this->setForm(route('dashboard.patients.store'), 'POST', 'dashboard.pages.patient._form', [
            'form_id' => 'create_form__patient',
            'form_name' => 'create_form__patient',
        ]);

        return $this->renderView('dashboard.pages.patient.form', [
            'clinics' => $clinics,
            'countries' => $countries,
            'form' => $form,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PatientRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PatientRequest $request)
    {
        if (auth()->user()->cannot('view_patient'))
            return $this->permissionDenied('dashboard.index');

        $patient = Patient::create($request->validated() + [
            'created_by' => auth()->id(),
        ]);

        (! $patient) ? $this->message('errorMessage') : $this->message('successMessage');

        return redirect()->route('dashboard.patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
{
        
       $patientInformation = $patient->addSelect(['patients.*', 'countries.name as country_name', 
       'clinics.name as clinic_name',])
       ->clinicJoin($patient->clinic_id)->countryJoin($patient->country_id)
       ->where('patients.id', '=', $patient->id)->first();

       $patientDetail = PatientDetail::with('patient')->where('patient_id' ,'=', $patient->id)->get(); 
        return $this->renderView('dashboard.pages.patient.show', [
            'patientInformation' => $patientInformation,
            'patientDetail' => $patientDetail
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Patient $patient)
    {
        if (auth()->user()->cannot('update_patient'))
            return $this->permissionDenied('dashboard.index');

        $clinics = Clinic::pluck('name', 'id');
        $countries = DB::table('countries')->pluck('name', 'id');

        $form = $this->setForm(route('dashboard.patients.update', ['patient' => $patient]), 'POST', 'dashboard.pages.patient._form', [
            'form_id' => 'edit_form__patient',
            'form_name' => 'edit_form__patient',
        ], 'PATCH');

        return $this->renderView('dashboard.pages.patient.form', [
            'clinics' => $clinics,
            'countries' => $countries,
            'patient' => $patient,
            'form' => $form,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PatientRequest $request
     * @param \App\Models\Patient $patient
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        if (auth()->user()->cannot('update_patient'))
            return $this->permissionDenied('dashboard.index');

        $patient = $patient->update($request->validated());

        (! $patient) ? $this->message('errorMessage') : $this->message('successMessage');

        return redirect()->route('dashboard.patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Patient $patient)
    {
        if (auth()->user()->cannot('delete_patient'))
            return $this->permissionDenied('dashboard.index');

        $delete = $patient->delete();
        (! $delete) ? $this->message('errorMessage') : $this->message('successMessage', 'Success: Deleted successfully');

        return redirect()->route('dashboard.patients.index');
    }

    /**
     * @param mixed $view
     * @param array $withParams
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function renderView($view, array $withParams = [])
    {
        $params = [
            'page' => 'Patients',
            'resource' => 'Patient',
            'translationFromKey' => 'lang.models.patient.fillable',
            'crud' => [
                'CREATE_PATIENT' => [
                    'route' => route('dashboard.patients.create'),
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
