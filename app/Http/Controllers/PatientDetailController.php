<?php

namespace App\Http\Controllers;

use App\Models\PatientDetail;
use Illuminate\Http\Request;

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
    public function create()
    {
        
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
     * @param  \App\Models\PatientDetail  $patientDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PatientDetail $patientDetail)
    {
        //
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
