<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObjetoStoreUpdate extends FormRequest
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
            'nome' => 'required',
            'nefisco' => "required|unique:objetos,nefisco,{$id},id",
        ];
    }

    /**
     * Custon messages error
     */
    public function messages()
        {
            return [
                'nome.required' => 'Digite o nome do objeto',
                'nefisco.required' => 'Digite o número do E-fisco',
                'nefisco.unique' => 'Esse número de E-fisco já está cadastrado',
            ];
        }

}
