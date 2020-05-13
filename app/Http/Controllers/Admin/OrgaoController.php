<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orgao;
use App\Models\User;
use App\Models\Ata;
use App\Models\Lote;
use App\Models\Item;


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
        $users = User::all();
    	
        return view('admin.pages.orgaos.create', compact('itens', 'users', 'lotes', 'atas'));
    }

    public function store(Request $request, $idAta, $idLote, $idItem)
    {
        $itens = Item::find($idItem);
        $atas = Ata::find($idAta);
        $lotes = Lote::find($idLote);

        $orgaos = $this->repository->create($request->all());

        $itens = Item::find($idItem);
        $itens->orgao = $itens->orgao - $orgaos->saldo;
        $itens->save();

        return redirect()->route('orgao.create', [$atas->id, $lotes->id, $itens->id]);
    }
}
