<?php

namespace App\Http\Requests\Assessment;

use Illuminate\Foundation\Http\FormRequest;

class AssessmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $patient = $this->route('patient');
        $step = $this->route('step');

        $rules = [
            'step1' => [
                // symptoms
                "snore" => ['required', 'boolean',],
                "apnea" => ['required', 'boolean',],
                "breathing_shortness" => ['required', 'boolean',],
                "average_sleep" => ['required', 'numeric',],
                "fragmented_sleep" => ['required', 'boolean',],
                "nocturia" => ['required', 'boolean',],
                "tired_during_day" => ['required', 'boolean',],
                "morning_headache" => ['required', 'boolean',],
                "nap" => ['required', 'boolean',],
                "sleepiness_during_day" => ['required', 'boolean',],
                "loss_of_concentration" => ['required', 'boolean',],

                // symptoms via modal
                "night_snoring_experience" => ['required', 'numeric', 'in:'.implode(",", array_keys(config('constants.night_snoring_experience'))),],

                // symptoms via modal for epworth test sleepiness scale
                "while_sitting_and_reading" => ['required', 'string', 'in:'.implode(",", array_keys(config('constants.sleepiness_scale_options'))),],
                "while_watching_television" => ['required', 'string', 'in:'.implode(",", array_keys(config('constants.sleepiness_scale_options'))),],
                "while_inactive_in_public_place" => ['required', 'string', 'in:'.implode(",", array_keys(config('constants.sleepiness_scale_options'))),],
                "while_travelling" => ['required', 'string', 'in:'.implode(",", array_keys(config('constants.sleepiness_scale_options'))),],
                "while_laying_down_in_afternoon" => ['required', 'string', 'in:'.implode(",", array_keys(config('constants.sleepiness_scale_options'))),],
                "while_talking" => ['required', 'string', 'in:'.implode(",", array_keys(config('constants.sleepiness_scale_options'))),],
                "while_sitting_after_lunch" => ['required', 'string', 'in:'.implode(",", array_keys(config('constants.sleepiness_scale_options'))),],
                "while_driving" => ['required', 'string', 'in:'.implode(",", array_keys(config('constants.sleepiness_scale_options'))),],
            ],

            'step2' => [
                "smoker" => ['required', 'boolean',],
                "alcohol_with_dinner" => ['required', 'boolean',],
                "high_blood_pressure" => ['required', 'boolean',],
                "myocardial_infarction" => ['required', 'boolean',],
                "coronary_artery_disease" => ['required', 'boolean',],
                "arrhythmia" => ['required', 'boolean',],
                "heart_failure" => ['required', 'boolean',],
                "diabetes" => ['required', 'boolean',],
                "depression" => ['required', 'boolean',],
                "dementia" => ['required', 'boolean',],
                "stroke" => ['required', 'boolean',],
                "lung_disease" => ['required', 'boolean',],
                "hypothyroidism" => ['required', 'boolean',],
                "other_medical_history" => ['required', 'string', 'max:255',],
                "anxiolytics" => ['required', 'string', 'max:255',],
                "antidepressants" => ['required', 'string', 'max:255',],
                "induce_sleep_medication" => ['required', 'string', 'max:255',],
                "other_medications" => ['required', 'string', 'max:255',],
            ],
        ];

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                $rules = [];
                break;
            }
            case 'PATCH':
            case 'PUT':
            case 'POST':
            {
                $rules = $rules[$step];
            }
            default:break;
        }

        return $rules;
    }
}
