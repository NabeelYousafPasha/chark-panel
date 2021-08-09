<?php

namespace App\Http\Requests\Patient;

use App\Models\Clinic;
use App\Models\Patient;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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

        $rules = [
            'clinic_id' => ['required', 'numeric', 'exists:'.Clinic::class.',id',],
            'email' => ['required', 'string', 'max:255', 'email', 'unique:'.Patient::class.',email',],
            'alias' => ['required', 'string', 'max:255',],
            'gender' => ['required', 'string', 'in:'.implode(',', array_keys(config('constants.gender'))),],
            'dob' => ['required', 'date',],
            'country_id' => ['required', 'numeric', 'exists:countries,id',],
        ];

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                $rules = [];
                break;
            }
            case 'POST':
            {
                break;
            }
            case 'PATCH':
            case 'PUT': {
                $rules['email'] = ['required', 'string', 'max:255', 'email', 'unique:'.Patient::class.',email,'.$patient->id,];
            }
            default:break;
        }

        return $rules;
    }
}
