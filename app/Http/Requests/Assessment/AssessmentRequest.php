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
        $project = $this->route('patient');
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
