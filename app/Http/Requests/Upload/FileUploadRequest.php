<?php

namespace App\Http\Requests\Upload;

use Illuminate\Foundation\Http\FormRequest;

class FileUploadRequest extends FormRequest
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

    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['media_type'] = $this->route('mediaType');

        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $media = $this->route('mediaType');

        $mediaType = [
            'cbct', 'photo', 'xray', 'sleep_study',
        ];

        $rules = [
            "media_type" => ['required', 'in:'.implode(',', $mediaType)],
            "cbct" => ['required', 'file', 'max:5000'],
            "photo" => ['required', 'file', 'image', 'max:5000'],
            "xray" => ['required', 'file', 'image', 'max:5000'],
            "sleep_study" => ['required', 'file', 'max:5000'],
        ];

        switch ($media) {
            case 'cbct': {
                unset($rules['photo'], $rules['xray'], $rules['sleep_study']);
                break;
            }
            case 'photo': {
                unset($rules['cbct'], $rules['xray'], $rules['sleep_study']);
                break;
            }
            case 'xray': {
                unset($rules['cbct'], $rules['photo'], $rules['sleep_study']);
                break;
            }
            case 'sleep_study': {
                unset($rules['cbct'], $rules['photo'], $rules['xray']);
                break;
            }
            default:
                break;
        }

        return $rules;
    }
}
