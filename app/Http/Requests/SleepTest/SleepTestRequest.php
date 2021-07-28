<?php

namespace App\Http\Requests\SleepTest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SleepTestRequest extends FormRequest
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
        $inBoolean = Rule::in(config('constants.validation.boolean'));

        return [
            // step 1
            'first_name' => ['required', 'string', 'max:255',],
            'last_name' => ['required', 'string', 'max:255',],
            'dob' => ['required', 'date',],
            'gender' => ['required', 'string', Rule::in(array_keys(config('constants.gender')))],
            'address' => ['required', 'string', 'max:255',],
            'city' => ['required', 'string', 'max:255',],
            'height' => ['required', 'numeric',],
            'weight' => ['required', 'numeric',],
            'bmi' => ['required', 'numeric',],
            'neck_size' => ['required', 'numeric',],

            // step 2
            'snore' => ['required', 'string', $inBoolean,],
            'tired' => ['required', 'string', $inBoolean,],
            'stop_breathing' => ['required', 'string', $inBoolean,],
            'high_blood_pressure' => ['required', 'string', $inBoolean,],

            // step 3
            'insomnia' => ['required', 'string', $inBoolean,],
            'blood_pressure' => ['required', 'string', $inBoolean,],
            'stroke' => ['required', 'string', $inBoolean,],
            'heart_attack' => ['required', 'string', $inBoolean,],
            'atrial_fibrillation' => ['required', 'string', $inBoolean,],
            'diabetes' => ['required', 'string', $inBoolean,],
            'gerd' => ['required', 'string', $inBoolean,],
            'anxiety' => ['required', 'string', $inBoolean,],

            // step 4
            'scalloped_tongue' => ['required', 'string', $inBoolean,],
            'bruxism' => ['required', 'string', $inBoolean,],
            'tooth_wear' => ['required', 'string', $inBoolean,],
            'mallampati_classification' => ['required', 'string', Rule::in(config('constants.validation.mallampati_classification')),],
            'tonsil_classification' => ['required', 'string', Rule::in(config('constants.validation.tonsil_classification')),],
        ];
    }
}
