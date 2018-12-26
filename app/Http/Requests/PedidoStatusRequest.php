<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoStatusRequest extends FormRequest
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
            'situacao' => 'required',
            'pedido_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'situacao.required' => 'Escolha uma das alternativas abaixo.',
            'pedido.required' => 'Não foi possível identificar o seu pedido.',

        ];
    }
}
