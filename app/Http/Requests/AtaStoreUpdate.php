<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtaStoreUpdate extends FormRequest
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
            'departamento' => 'required',
            'descricao' => 'required|min:3|max:500',
            'nata' => "required|min:3|max:15|unique:atas,nata,{$id},id",
            'nprocesso' => "required|min:3|max:15|unique:atas,nprocesso,{$id},id",
            'npregao' => "required|min:3|max:15|unique:atas,npregao,{$id},id",
            'vigencia' => 'required',
            'tipo' => 'required',
            'comissao' => 'required',
            'status' => 'required',
            'orgao' => 'required',
            'arquivo' => 'required',
        ];
    }

    /**
     * Custon messages error
     * 
     */

    public function messages()
        {
            return [
                'departamento.required' => 'Escolha o departamento',
                'descricao.required' => 'A descrição é obrigatória',
                'descricao.max' => 'A descrição não pode ser maior que 500 caracteres.',
                'nata.required' => 'O número da ata é obrigatório',
                'nata.unique' => 'Esse número da ata já existe no sistema',
                'nprocesso.required' => 'O número do processo é obrigatório',
                'nprocesso.unique' => 'O número do processo já existe no sistema',
                'npregao.required' => 'O número do pregão é obrigatório',
                'npregao.unique' => 'O número do pregão já existe no sistema',
                'vigencia.required' => 'A vigencia é obrigadoria',
                'tipo.required' => 'Selecione o tipo da ata',
                'comissao.required' => 'Selecione a comissão da ata',
                'orgao.required' => 'Selecione o campo Orgão',
                'arquivo.required' => 'O arquivo é obrigatório',

            ];
        }
}
