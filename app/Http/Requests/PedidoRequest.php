<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
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
            'detalhes' => 'required|min:30',
            'categoria_id' => 'required',
            //'servico_id' => 'required',
            'cep' => 'required',
            'nome' => 'required',
            'email' => 'required'
        ];
    }
}
