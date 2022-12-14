<?php

namespace App\Http\Requests\system;

use Illuminate\Foundation\Http\FormRequest;

class uploadExcel extends FormRequest
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
        return [
            'excel_file' => 'required',
        ];
    }
}
