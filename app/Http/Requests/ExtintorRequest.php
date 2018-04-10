<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtintorRequest extends FormRequest
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
            'codigo'    => 'required | string | min:1 | max:5',
            'clasificacion'  => 'required | numeric',
            'capacidad'   => 'required | numeric',
            'altura' => 'required | string | min:1 | max:10',
        ];
    }
}
