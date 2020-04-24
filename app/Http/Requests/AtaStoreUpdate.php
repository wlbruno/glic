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
            'descricao' => 'required|min:3|max:255',
            'nata' => "required|min:3|max:7|unique:atas,nata,{$id},id",
            'nprocesso' => "required|min:3|max:7|unique:atas,nprocesso,{$id},id",
            'npregao' => "required|min:3|max:7|unique:atas,npregao,{$id},id",
            'vigencia' => 'required|date',
            'tipo' => 'required',
            'comissao' => 'required',
            'status' => 'required',
            'orgao' => 'required',
            'arquivo' => 'required',
        ];
    }
}
