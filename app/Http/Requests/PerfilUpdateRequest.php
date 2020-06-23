<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilUpdateRequest extends FormRequest
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


            'email' => 'string|email|max:255|unique:users',
            'confirmar_email' => 'same:email',
            'senha' => 'string|min:8',
            'confirmar_nova_senha' => 'string|min:8|same:senha',
        ];
    }
}
