<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Lote;
use App\Models\Ata;
use App\Models\Item_lote;


class ItensController extends Controller
{
	private $repository;

    public function __construct(Item $itens)
    {
        $this->repository = $itens;
    }

    public function create($idAta, $idLote)
    {
    	$ata = Ata::find($idAta);
        $lote = Lote::where('id', $idLote)->first();   
        
        if (!$lote)
            return redirect()->back();

        return view ('admin.pages.itens.create', compact('ata', 'lote'));

    }

   public function store($idAta, $idLote)
    {
        $ata = Ata::find($idAta);
        $lote = Lote::where('id', $idLote)->first();   
        
        if (!$lote)
            return redirect()->back();
        

        $itens  = new Item();
        $itens->objetos_id = $request->input('objetoid');
        $itens->empresas_id = $request->input('empresaid');
        $itens->quantidade = $request->input('quantidade') / 2;
        $itens->teto = $request->input('quantidade') * 2;
        $itens->medida = $request->input('medida');
        $itens->vunitario = $request->input('vunitario');
        $itens->marca = $request->input('marca');
        $itens->vtotal =  $request->input('quantidade') * $request->input('vunitario');
        $itemDB = $itens->save();

        $item_lote = new Item_lote();
        $item_lote->itens_id = $itens->id;

        if(!isset($request->lotes_id)){
            $lotes = new lote();
            $lotes->atas_id = $request->input('atas_id');
            $lotes->descricao = $request->input('descricao');
            $lotes->save();

            $item_lote->lotes_id = $lotes->id;
            $item_lote->save();

        } else{
            $item_lote->lotes_id = $request->lotes_id;
            $item_lote->save();
        } 

        return redirect()->route('lotes.create', $ata->id);


    }
}
