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
            //Extintor
            'codigo'    => 'required | string | min:1 | max:255',
            'clasificacion'  => 'required | numeric ',
            'capacidad'   => 'required | numeric | min:0',
            'altura' => 'required | string | min:1 | max:255',

            //Ubicación
            'edificio' => 'required | string | min:1 | max:255',
            'piso' => 'required | numeric | min:0 | max:10',
            'referencia' => 'required | string | min:1 | max:255',
        ];
    }
}
