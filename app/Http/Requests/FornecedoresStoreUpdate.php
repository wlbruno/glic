<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FornecedoresStoreUpdate extends FormRequest
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
        $id = $this->segment(3);

        return [
            'fornecedor' => 'required',
            'cnpj' => "required",
        ];
    }

    /**
     * Custon messages error
     */
    public function messages()
        {
            return [
                'fornecedor.required' => 'Digite o nome do objeto',
                'cnpj.required' => 'Digite o número do CNPJ',
                'cnpj.unique' => 'Esse número de CNPJ já está cadastrado',
            ];
        }
}
