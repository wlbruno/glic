<?php

namespace App\Http\Controllers\Site\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\PerfilUpdateRequest;

class UserController extends Controller
{
    public function perfil()
    {
    	$users = User::all();
    		return view('site.pages.user.perfil', compact('users'));

    }

      public function perfilUpdate(PerfilUpdateRequest $request){
        $data = $request->all();
            if ($data['senha'] != null)
                $data['senha'] = bcrypt($data['senha']);
            else 
                unset($data['senha']);
              	$update = auth()->user()->update($data);
            if($update)
                return redirect()
                    ->route('user.perfil')
                    ->with('success', 'Sucesso ao atualizar!');
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao atualizar o perfil...');            
    }
}
