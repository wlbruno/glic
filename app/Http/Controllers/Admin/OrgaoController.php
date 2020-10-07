<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Orgao;
use App\Models\User;
use App\Models\Ata;
use App\Models\Lote;
use App\Models\Item;
use App\Models\Solicitante;
use App\Models\Plan;
use App\Models\Ata_orgao;


class OrgaoController extends Controller
{
    private $repository;

    public function __construct(Orgao $orgaos)
    {
        $this->repository = $orgaos;
    }

    public function create($idAta, $idLote, $idItem)
    {
    	$itens = Item::find($idItem);
        $atas = Ata::find($idAta);
        $lotes = Lote::find($idLote);
        $users = User::where('active', 'O')->get();
        
        return view('admin.pages.orgaos.create', compact('itens', 'users', 'lotes', 'atas'));
    }

    public function store(Request $request, $idAta, $idLote, $idItem)
    {
        $itens = Item::find($idItem);
        $atas = Ata::find($idAta);
        $lotes = Lote::find($idLote);

        $orgaos = $this->repository->create($request->all());

        $ataorgao = new Ata_orgao();
        $ataorgao->atas_id = $request->input('atas_id');
        $ataorgao->users_id = $request->input('users_id');
        $ataorgao->save();


        $itens = Item::find($idItem);
        $itens->orgao = $itens->orgao - $orgaos->saldo;
        $itens->save();

        return redirect()->route('orgao.create', [$atas->id, $lotes->id, $itens->id]);
    }

    public function destroy($idItem, $idOrgao)
    {
        $orgao = Orgao::find($idOrgao);


        $item = Item::find($idItem);
        $item->orgao = $item->orgao + $orgao->saldo;
        $item->save();

        $orgao->delete();

        return redirect()->back();
    }
    
    /**
     * Crud orgao
     * 
     */

     public function novoOrgao()
     {
        $perfis = Plan::all();

        return view('admin.pages.users.orgao.create', compact('perfis'));
     }

    public function storeOrgao(Request $request)
    {
        $user = new User();
        $user->plan_id = $request->input('perfil');
        $user->name = $request->input('nameorgao');
        $user->email = $request->input('email');
        $user->active = 'O';
        $user->password =  bcrypt('123456789');
      //  $user->password = bcrypt(Str::random(10));
        $user->save();

        $solicitante = new Solicitante();
        $solicitante->user_id = $user->id;
        $solicitante->orgao = $request->input('name');
        $solicitante->estado = $request->input('estado');
        $solicitante->ramal = $request->input('telefone');
        $solicitante->cnpj = $request->input('cnpj');
        $solicitante->save();


        return redirect()->route('users.index');
    }
}
