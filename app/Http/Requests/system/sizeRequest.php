<?php

namespace App\Http\Requests\system;

use Illuminate\Foundation\Http\FormRequest;

class sizeRequest extends FormRequest
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
<<<<<<< HEAD
            'title' => 'required',
=======
            'name' => 'required',
>>>>>>> 056d438f8dd74b2d5f5eec06b60f96ecd6fba377
        ];
    }
}
