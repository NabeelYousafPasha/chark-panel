<?php

namespace App\Http\Requests\Assessment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

        if (! in_array($step, ['step1', 'step2', 'step3', 'step4'])) {
            abort(404, 'Step is Invalid');
        }

        $rules = [
            'step1' => [
                // symptoms
                "snore" => ['nullable', 'boolean',],
                "apnea" => ['nullable', 'boolean',],
                "breathing_shortness" => ['nullable', 'boolean',],
                "average_sleep" => ['nullable', 'numeric',],
                "fragmented_sleep" => ['nullable', 'boolean',],
                "nocturia" => ['nullable', 'boolean',],
                "tired_during_day" => ['nullable', 'boolean',],
                "morning_headache" => ['nullable', 'boolean',],
                "nap" => ['nullable', 'boolean',],
                "sleepiness_during_day" => ['nullable', 'boolean',],
                "loss_of_concentration" => ['nullable', 'boolean',],

                // symptoms via modal
                "night_snoring_experience" => ['nullable', 'numeric', 'in:'.implode(",", array_keys(config('constants.night_snoring_experience'))),],

                // symptoms via modal for epworth test sleepiness scale
                "while_sitting_and_reading" => ['nullable', 'string', 'in:'.implode(",", array_keys(config('constants.sleepiness_scale_options'))),],
                "while_watching_television" => ['nullable', 'string', 'in:'.implode(",", array_keys(config('constants.sleepiness_scale_options'))),],
                "while_inactive_in_public_place" => ['nullable', 'string', 'in:'.implode(",", array_keys(config('constants.sleepiness_scale_options'))),],
                "while_travelling" => ['nullable', 'string', 'in:'.implode(",", array_keys(config('constants.sleepiness_scale_options'))),],
                "while_laying_down_in_afternoon" => ['nullable', 'string', 'in:'.implode(",", array_keys(config('constants.sleepiness_scale_options'))),],
                "while_talking" => ['nullable', 'string', 'in:'.implode(",", array_keys(config('constants.sleepiness_scale_options'))),],
                "while_sitting_after_lunch" => ['nullable', 'string', 'in:'.implode(",", array_keys(config('constants.sleepiness_scale_options'))),],
                "while_driving" => ['nullable', 'string', 'in:'.implode(",", array_keys(config('constants.sleepiness_scale_options'))),],
            ],

            'step2' => [
                "smoker" => ['nullable', 'boolean',],
                "alcohol_with_dinner" => ['nullable', 'boolean',],
                "alcohol_with_dinner_quantity" => ['nullable', 'required_if:alcohol_with_dinner,1', 'numeric',],
                "high_blood_pressure" => ['nullable', 'boolean',],
                "myocardial_infarction" => ['nullable', 'boolean',],
                "coronary_artery_disease" => ['nullable', 'boolean',],
                "arrhythmia" => ['nullable', 'boolean',],
                "heart_failure" => ['nullable', 'boolean',],
                "diabetes" => ['nullable', 'boolean',],
                "depression" => ['nullable', 'boolean',],
                "dementia" => ['nullable', 'boolean',],
                "stroke" => ['nullable', 'boolean',],
                "lung_disease" => ['nullable', 'boolean',],
                "hypothyroidism" => ['nullable', 'boolean',],
                "other_medical_history" => ['nullable', 'string', 'max:255',],
                "anxiolytics" => ['nullable', 'boolean',],
                "anxiolytics_value" => ['nullable', 'required_if:anxiolytics,1', 'string', 'max:255',],
                "antidepressants" => ['nullable', 'boolean',],
                "antidepressants_value" => ['nullable', 'required_if:antidepressants,1', 'string', 'max:255',],
                "induce_sleep_medication" => ['nullable', 'boolean',],
                "induce_sleep_medication_value" => ['nullable', 'required_if:induce_sleep_medication,1', 'string', 'max:255',],
                "other_medications" => ['nullable', 'boolean',],
                "other_medications_value" => ['nullable', 'required_if:other_medications,1', 'string', 'max:255',],
            ],

            'step3' => [
                "cpap" => ['required', 'boolean',],
                "mandibular_advancement_device" => ['required', 'boolean',],
                "positional_therapy" => ['required', 'boolean',],
                "upper_airway_surgery" => ['required', 'boolean',],
                "upper_airway_surgery_value" => ['nullable', 'required_if:upper_airway_surgery,1', 'array',],
                "upper_airway_surgery_value.*" => ['nullable', 'required_if:upper_airway_surgery,1', 'string', 'in:'.implode(",", array_keys(config('constants.upper_airway_surgery')))],
                "other_upper_airway_surgery" => ['nullable', 'string', 'max:255',],
                "bariatric_surgery" => ['required', 'boolean',],
                "other_treatments_for_sleep_apnea" => ['nullable', 'string', 'max:255',],
                "height" => ['required', 'numeric',],
                "weight" => ['required', 'numeric',],
                "bmi" => ['required', 'numeric',],
                "neck_circumference" => ['required', 'numeric',],
                "bruxism" => ['required', 'boolean',],
                "pointed_hard_palade" => ['required', 'boolean',],
                "tmj_noise" => ['required', 'boolean',],
                "tmj_pain" => ['required', 'boolean',],
                "bilateral_crossbite" => ['required', 'boolean',],
                "lateral_crossbite" => ['required', 'boolean',],
//                "normognathic" => ['required', 'boolean',],
//                "retrognathic" => ['required', 'boolean',],
//                "prognathic" => ['required', 'boolean',],
//                "edge_to_edge_bite" => ['required', 'boolean',],
//                "anterior_crossbite" => ['required', 'boolean',],
//                "overbite" => ['required', 'boolean',],
//                "total_visibility_of_tonsils_uvula_soft_palate" => ['required', 'boolean',],
//                "hard_and_soft_palate_visibility" => ['required', 'boolean',],
//                "hard_and_palate_and_part_of_soft_palate_visibility" => ['required', 'boolean',],
//                "only_hard_palate_visibility" => ['required', 'boolean',],
                "mallampati_classification" => ['required', 'string', Rule::in(config('constants.clinical_explorations.mallampati_classification')),],
                "tonsil_classification" => ['required', 'string', Rule::in(config('constants.clinical_explorations.tonsil_classification')),],
            ],

            'step4' => [
                "ahi" => ['required', 'string', 'max:255',],
                "rdi" => ['required', 'string', 'max:255',],
                "nadir" => ['required', 'string', 'max:255',],
                "odi" => ['required', 'string', 'max:255',],
                "avg_duration_of_apnea" => ['required', 'numeric',],
                "max_duration_of_apnea" => ['required', 'numeric',],
                "assessments_observation" => ['required', 'string', 'max:255',],
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
