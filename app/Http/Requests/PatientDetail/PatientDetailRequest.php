<?php

namespace App\Http\Requests\PatientDetail;
use App\Models\{
    PatientDetail,
    Patient
};

use Illuminate\Foundation\Http\FormRequest;

class PatientDetailRequest extends FormRequest
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
            'profession' => ['required', 'string', 'max:255'],
            'personal_id' => ['required', 'numeric'],
            'contact' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
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
