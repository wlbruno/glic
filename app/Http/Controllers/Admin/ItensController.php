<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Lote;
use App\Models\Ata;
use App\Models\Item_lote;
use App\Models\Objeto;
use App\Models\Fornecedor;


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

        $objetos = Objeto::all(); 
        $fornecedores = Fornecedor::all();   
        
        if (!$lote)
            return redirect()->back();

        return view ('admin.pages.itens.create', compact('ata', 'lote', 'objetos', 'fornecedores'));

    }

    public function edit($idAta, $idLote, $idItem)
    {
        $ata = $idAta;
        $lote = $idLote;
        $item = Item::find($idItem);
        $objetos = Objeto::all(); 
        $fornecedores = Fornecedor::all();
        return view('admin.pages.itens.edit', compact('ata', 'lote', 'item', 'objetos', 'fornecedores'));
    }

   public function store(Request $request, $idAta)
    {
        $ata = Ata::find($idAta);  
     
        $itens  = new Item();
        $itens->objetos_id = $request->input('objetos');
        $itens->fornecedores_id = $request->input('fornecedores');
        //QUANTIDDADE E SALDO SOLICITADO
        $itens->quantidadeSES = $request->input('quantidade');
        $itens->BKsaldo = str_replace(',', '.', str_replace('.', '', $request->input('quantidade') )) * 2;
        // ORGAO NAO PARTICIPANTE
        $itens->quantidadeONP = str_replace(',', '.', str_replace('.', '', $request->input('quantidade'))) / 2;
        $itens->saldoONP = $itens->BKsaldo;
        //ORGAO PARTICIPANTE
        $itens->quantidadeOP = $request->input('quantidade');
        $itens->saldoOP = $itens->BKsaldo;
        
        $itens->vunitario = str_replace(',', '.', str_replace('.', '', $request->input('vunitario') ));
        $itens->vtotal =    str_replace(',', '.', str_replace('.', '', $request->input('quantidade'))) 
                            * str_replace(',', '.', str_replace('.', '', $request->input('vunitario') ));

        $itens->medida = $request->input('medida');
        $itens->marca = $request->input('marca');

        $itemDB = $itens->save();

        $item_lote = new Item_lote();
        $item_lote->itens_id = $itens->id;

        if(!isset($request->lotes_id)){
            $lotes = new lote();
            $lotes->atas_id = $ata->id;
            $lotes->descricao = $request->input('descricao');
            $lotes->save();

            $item_lote->lotes_id = $lotes->id;
            $item_lote->save();

        } else{
            $item_lote->lotes_id = $request->lotes_id;
            $item_lote->save();
        }  

        if($ata->tipo === 'ITEM' && isset($ata->lotes[0]->ItensLote[0]->item)){
            return redirect()->route('lotes.create', $ata->id);
            
        }

        return redirect()->back()->with('success', 'Item criado!');

    }

    public function update(Request $request, $idAta, $idLote, $idItem)
    {
        $ata = Ata::find($idAta);  
        $lote = $idLote;
        
        $itens  = Item::find($idItem);
        $itens->objetos_id = $request->input('objetos');
        $itens->fornecedores_id = $request->input('fornecedores');
        //QUANTIDDADE E SALDO SOLICITADO
        $itens->quantidadeSES = $request->input('quantidade');
        $itens->BKsaldo = str_replace(',', '.', str_replace('.', '', $request->input('quantidade') )) * 2;
        // ORGAO NAO PARTICIPANTE
        $itens->quantidadeONP = str_replace(',', '.', str_replace('.', '', $request->input('quantidade'))) / 2;
        $itens->saldoONP = $itens->BKsaldo;
        //ORGAO PARTICIPANTE
        $itens->quantidadeOP = $request->input('quantidade');
        $itens->saldoOP = $itens->BKsaldo;
        
        $itens->vunitario = str_replace(',', '.', str_replace('.', '', $request->input('vunitario') ));
        $itens->vtotal =    str_replace(',', '.', str_replace('.', '', $request->input('quantidade'))) 
                            * str_replace(',', '.', str_replace('.', '', $request->input('vunitario') ));

        $itens->medida = $request->input('medida');
        $itens->marca = $request->input('marca');

        $itemDB = $itens->save();

        
      
        return redirect()->route('lotes.create', $ata->id);
    }

    /**
    *   form ata tipo item
    *
    */
    public function item($idAta)
    {
        $atas = Ata::find($idAta);
        $objetos = Objeto::all(); 
        $fornecedores = Fornecedor::all();   

        return view('admin.pages.itens.item', compact('atas', 'objetos', 'fornecedores'));  
    }

    public function destroy($idAta, $idItem)
    {
    $ata = Ata::find($idAta);
        
        $item = $this->repository->where('id', $idItem)->first();
        
        if (!$item)
        return redirect()->back();

             
        if ($item->orgaos->count() > 0) {
            return redirect()
                        ->back()
                        ->with('error', 'Existem orgãos vinculados a esse item, portanto para remover o item é necessário deletar os orgãos');
        }
        
        $item->delete();

        return redirect()->back();
    }
}
