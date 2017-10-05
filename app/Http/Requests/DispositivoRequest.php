<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DispositivoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ID_TIPO_SERVOMOTOR' => 'required|Numeric',
            'ID_TIPO_BATERIA' => 'required',
            'DESCRIPCION' => 'required',
            'NUMERO_PLACA' => 'required',
            'VIDA_UTIL_MINIMA' => 'required',
            'VIDA_UTIL_MAXIMA' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'ID_TIPO_SERVOMOTOR.required' => 'El codigo es requerido.',
            'ID_TIPO_BATERIA.required' => 'El codigo es requerido.',
            'DESCRIPCION.required' => 'Favor de ingresar la descripción.',
            'NUMERO_PLACA.required' => 'Favor de ingresar el número de placa.',
            'VIDA_UTIL_MINIMA.required' => 'Favor de ingresar vida util minima.',
            'VIDA_UTIL_MAXIMA.required' => 'Favor de ingresar la vida util maxima.',
        ];
    }
}
