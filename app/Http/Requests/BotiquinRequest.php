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
            'codigo'    => 'required | string | min:1 | max:5',
            'tipo_botiquin_id'  => 'required | numeric',
        ];
    }
}
