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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $mediaType = [
            "cbct",
            "photo",
            "xray",
            "sleep_study",
        ];

        $rules = [
            "cbct" => ['required', 'file',],
            "photo" => ['required', 'file', 'image',],
            "xray" => ['required', 'file', 'image',],
            "sleep_study" => ['required', 'file',],
        ];

        dd($this);

        return $rules;
    }
}
