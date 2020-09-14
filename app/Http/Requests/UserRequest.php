<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required', 'min:10', 'max:150',
            'email' => 'required', 'string', 'email', 'min:10', 'max:150', "unique:users,email,{$id},id",
            'password' => 'required', 'string', 'min:6', 'max:16',
            'confirm_password' => 'required', 'same:password',
            'fone' => 'required', 'min:10', 'max:11',
            'cnpj' => 'required', 'min:14', 'max:14',
            'departamento' => 'required', 'string', 'min:2', 'max:30',
        ];
    }

    public function messages() 
        {
            return [
                'name.required' => 'Digite o nome do objeto',
                'name.min' => 'O nome precisa ter pelo menos 10 caracteres',
                'name.max' => 'O nome não pode ultrapassar 150 caracteres',
                'email.required' => 'required', 'string', 'email', 'min:10', 'max:150', "unique:users,email,{$id},id",
                'email.min' => 'O email precisa ter pelo menos 10 caracteres',
                'email.max' => 'O email não pode ultrapassar 150 caracteres',
                'email.unique' => 'O email informado já está em uso',
                'email.email' => 'Informe um email válido',
                'password.required' => 'required', 'string', 'email', 'min:10', 'max:150', "unique:users,email,{$id},id",
                'password.min' => 'A senha precisa ter pelo menos 6 caracteres',
                'password.max' => 'A senha não pode ultrapassar 16 caracteres',
                'fone.required' => 'Digite o telefone',
                'fone.min' => 'Informe um telefone válido',
                'fone.max' => 'Informe um telefone válido',
                'cnpj.required' => 'Digite o CNPJ',
                'cnpj.min' => 'Informe um CNPJ válido',
                'cnpj.max' => 'Informe um CNPJ válido',
                'departamento.required' => 'Digite o departamento',
                'departamento.min' => 'O departamento deve ter pelo menos 10 caracteres',
                'departamento.max' => 'O departamento não pode ultrapassar 150 caracteres',

            ];
        }
}
