<?php

namespace App\Http\Controllers;

use App\Http\Requests\SleepTest\SleepTestRequest;
use App\Models\{
    DentalExam,
    MedicalHistory,
    PatientInformation,
    SleepExam
};
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function storeSleepTest(SleepTestRequest $request)
    {
        $input = $request->validated();

        foreach ($input as $key => $value) {
            // cast yes,no as 1,0

            $input[$key] = $value;

            if (in_array($value, [config('constants.bool.yes'), '1'])) {
                $input[$key] = 1;
            } elseif (in_array($value, [config('constants.bool.no'), '0'])) {
                $input[$key] = 0;
            }
        }

        $patientInformation = [];

        $inserted = DB::transaction(function () use ($input, &$patientInformation) {

            $patientInformation['patientInformation'] = PatientInformation::create(
                $input + [
                    'created_by' => auth()->id(),
                ]
            );

            $patientInformation['sleepExam'] = SleepExam::create(
                $input + [
                    'patient_information_id' => $patientInformation['patientInformation']->id,
                    'created_by' => auth()->id(),
                ]
            );

            $patientInformation['medicalHistory'] = MedicalHistory::create(
                $input + [
                    'patient_information_id' => $patientInformation['patientInformation']->id,
                    'created_by' => auth()->id(),
                ]
            );

            $patientInformation['dentalExam'] = DentalExam::create(
                $input + [
                    'patient_information_id' => $patientInformation['patientInformation']->id,
                    'created_by' => auth()->id(),
                ]
            );

            return $patientInformation;
        });

        if (empty($patientInformation) && empty($inserted)) {
            $this->message('errorMessage');
        }

        $score = 0;
        $scoreRules = config('constants.scoring');

        // age
        if (version_compare($patientInformation['patientInformation']->age_via_dob->y, $scoreRules['age']['matching_value'], $scoreRules['age']['condition'])) {
            ++$score;
        }

        // gender
        if (version_compare($patientInformation['patientInformation']->gender, $scoreRules['gender']['matching_value'], $scoreRules['gender']['condition'])) {
            ++$score;
        }

        // bmi
        if (version_compare($patientInformation['patientInformation']->bmi, $scoreRules['bmi']['matching_value'], $scoreRules['bmi']['condition'])) {
            ++$score;
        }

        // neck size
        if (version_compare($patientInformation['patientInformation']->neck_size, $scoreRules['neck_size']['inches']['matching_value'], $scoreRules['neck_size']['inches']['condition'])) {
            ++$score;
        }

        // Sleep Exam
        if ($patientInformation['sleepExam']->snore) {
            ++$score;
        }

        if ($patientInformation['sleepExam']->tired) {
            ++$score;
        }

        if ($patientInformation['sleepExam']->stop_breathing) {
            ++$score;
        }

        if ($patientInformation['sleepExam']->high_blood_pressure) {
            ++$score;
        }

        // update score
        $patientInformation['patientInformation']->update([
            'score' => $score,
        ]);

        $this->message('successMessage');

        return redirect()->route('home');

    }
}
