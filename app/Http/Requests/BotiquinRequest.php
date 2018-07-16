<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BotiquinRequest extends FormRequest
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
            //Botiquín
            'codigo'    => 'required | string | min:1 | max:10',
            'tipo_botiquin'  => 'required | numeric',

            //Ubicación
            'edificio' => 'required | string | min:1 | max:255',
            'piso' => 'required | numeric | min:0 | max:10',
            'referencia' => 'required | string | min:1 | max:255',
        ];
    }
}
