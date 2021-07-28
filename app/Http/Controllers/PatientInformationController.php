<?php

namespace App\Http\Controllers;

use App\Models\{DentalExam, MedicalHistory, PatientInformation, PdfReport, SleepExam};
use Barryvdh\DomPDF\Facade as PdfFacade;
use Illuminate\Http\Request;

class PatientInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        if (auth()->user()->cannot('view_patient'))
            return $this->permissionDenied();

        $patients = PatientInformation::addSelect([
                        'patient_information.*',
                        'users.username',
                    ])
                    ->createdByUser()
                    ->get();

        return $this->renderView('dashboard.pages.patient.index', [
            'patients' => $patients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param PatientInformation $patient
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(PatientInformation $patient)
    {
        if (auth()->user()->cannot('view_patient'))
            return $this->permissionDenied();

        $patient['sleep_exam'] = SleepExam::where('patient_information_id', '=', $patient->id)->first();
        $patient['medical_history'] = MedicalHistory::where('patient_information_id', '=', $patient->id)->first();
        $patient['dental_exam'] = DentalExam::where('patient_information_id', '=', $patient->id)->first();

        $pdfReport = PdfReport::where('patient_information_id', '=', $patient->id)->latest();

        return $this->renderView('dashboard.pages.patient.show', [
            'patientInformation' => $patient,
            'pdfReport' => $pdfReport->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientInformation  $patientInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientInformation $patientInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PatientInformation  $patientInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatientInformation $patientInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientInformation  $patientInformation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(PatientInformation $patient)
    {
        if (auth()->user()->cannot('delete_patient'))
            return $this->permissionDenied();

        $delete = $patient->delete();

        (! $delete) ? $this->message('errorMessage') : $this->message('successMessage', 'Success: Deleted successfully');

        return redirect()->route('dashboard.patients.index');
    }

    public function generateReport(Request $request, PatientInformation $patient)
    {
        if (auth()->user()->cannot('view_patient'))
            return $this->permissionDenied();

        $sleepExam = SleepExam::where('patient_information_id', '=', $patient->id)->first();
        $dentalExam = DentalExam::where('patient_information_id', '=', $patient->id)->first();
        $medicalHistory = MedicalHistory::where('patient_information_id', '=', $patient->id)->first();

        $viewData = [
            'patientInformation' => $patient,
            'sleepExam' => $sleepExam,
            'dentalExam' => $dentalExam,
            'medicalHistory' => $medicalHistory,
        ];

        // return view('report.pdf.report-sleep-test')->with($viewData);

        $fileName = $patient->id.'-'.$patient->full_name;

        $file = generatePDF('report.pdf.report-sleep-test',
            $fileName,
            $viewData
        );

        if (($file['success'] ?? false) == false) {

            $this->message('errorMessage', "Error: ".$file['message'].". Try again later.");
        } else {

            PdfReport::create([
                'patient_information_id' => $patient->id,
                'file_name' => $file['file_name'],
                'file_path' => config('constants.pdf_path').$file['file_name'],
                'generated_by' => auth()->id(),
            ]);

            $this->message('successMessage', "Success: ".$file['message']);
        }

        return redirect()->route('dashboard.patients.show', ['patient' => $patient]);
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
            'resource' => 'PatientInformation',
            'translationFromKey' => 'lang.models.user.fillable',
            'crud' => [
                'CREATE_MODULE' => [
                    'route' => route('/'),
                    'can' => ! auth()->user()->cannot('create_patient'),
                ],
                'EDIT_MODULE' => [
                    'can' => ! auth()->user()->cannot('update_patient'),
                ],
                'DELETE_MODULE' => [
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
