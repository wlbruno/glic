<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lote;
use App\Models\Ata;
use DB;

class LotesController extends Controller
{
    private $repository;

    public function __construct(Lote $lotes)
    {
        $this->repository = $lotes;
    }

    public function create($id)
    {
        $atas = Ata::find($id);
        
        //$ata = $atas->$this->repository->where('atas_id', $atas->id)->select('descricao', 'id')->orderBy('decricao', 'ASC')->paginate();
        //$lotes = $this->repository->where('atas_id', $atas->id)->select('descricao')->orderBy('descricao', 'ASC')->paginate();
        
            return view('admin.pages.lotes.index', compact('atas', 'lotes'));
    }

    public function store(Request $request, $id)
    {
    	$atas = Ata::find($id);

    	$lotes = new Lote();
    	$lotes->descricao = $request->input('descricao');
    	$lotes->atas_id = $atas->id;
    	$lotes->save();

    	return redirect()->route('lotes.create', $atas->id);
    }

    public function edit($idAta, $idLote)
    {
    	$ata = Ata::find($idAta);
        $lote = $this->repository->where('id', $idLote)->first();   

        if (!$lote)
            return redirect()->back();
        

        return view('admin.pages.lotes.edit', [
            'ata' => $ata,
            'lote' => $lote,
        ]);
    }


    public function update(Request $request, $idAta, $idLote)
    {
    	$ata = Ata::find($idAta);
    
        $lote = $this->repository->where('id', $idLote)->first();   

        if (!$lote)
            return redirect()->back();

        $lote->update($request->all());

        return redirect()->route('lotes.create', $ata->id);
    }

     public function destroy($idAta, $idLote)
    {
    	$ata = Ata::find($idAta);
        $lote = $this->repository->where('id', $idLote)->first();   
        
        if (!$lote)
            return redirect()->back();
        
        $lote->delete();

        return redirect()->route('lotes.create', $ata->id);
    }
}
