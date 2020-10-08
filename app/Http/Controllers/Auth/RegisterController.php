<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Services\SolicitanteService;
use Illuminate\Foundation\Http\FormRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'name' => 'required|min:10|max:150',
            'email' => 'required|string|email|min:10|max:150|unique:users',
            'password' => 'required|string|min:6|max:16',
            'confirm_password' => 'same:password',
            'ramal' => 'required',
            'cnpj' => 'required|min:18|max:18',
            'orgao' => 'required|string|max:254',
            'ramal' => 'required|min:13|max:15',
           
        ],

        $message = [

                'name.required' => 'Digite o nome do objeto',
                'name.min' => 'O nome precisa ter pelo menos 10 caracteres',
                'name.max' => 'O nome não pode ultrapassar 150 caracteres',
                'email.required' => 'Informe o email',
                'email.min' => 'O email precisa ter pelo menos 10 caracteres',
                'email.max' => 'O email não pode ultrapassar 150 caracteres',
                'email.unique' => 'O email informado já está em uso',
                'email.email' => 'Informe um email válido',
                'password.required' => 'Digite a senha',
                'password.min' => 'A senha precisa ter pelo menos 6 caracteres',
                'password.max' => 'A senha não pode ultrapassar 16 caracteres',
                'ramal.required' => 'Digite o telefone',
                'cnpj.required' => 'Digite o CNPJ',
                'cnpj.min' => 'O CNPJ precisa ter 14 caracteres',
                'cnpj.max' => 'O CNPJ precisa ter 14 caracteres',
                'orgao.required' => 'Digite o departamento',
                'orgao.min' => 'O departamento deve ter pelo menos 10 caracteres',
                'orgao.max' => 'O departamento não pode ultrapassar 150 caracteres',
                'confirm_password.same' => 'A senha e a confirmação de senha precisam ser iguais',
                'ramal.required' => 'Informe o ramal',
                'ramal.min' => 'O telefone deve ter pelo menos 10 dígitos com DDD',
                'ramal.max' => 'O telefone deve ter no máximo 11 dígitos com DDD',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(!$plan = session('plan')) {
            return redirect()->route('home.index');
        }

       $users  = $plan->users()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),

       ]);

       $solicitante = $users->solicitante()->create([
            'orgao' => $data['orgao'],
            'ramal' => $data['ramal'],
            'cnpj' => $data['cnpj'],
            'estado' => $data['estado'],
       ]);

       return $users;
    }
}
