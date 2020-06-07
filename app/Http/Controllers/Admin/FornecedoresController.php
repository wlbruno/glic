<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fornecedor;
use App\Models\Ata;
use App\Models\Lote;

class FornecedoresController extends Controller
{
   private $repository;

    public function __construct(Fornecedor $fornecedores)
    {
        $this->repository = $fornecedores;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fornecedores = $this->repository->latest()->paginate();

        return view('admin.pages.fornecedores.index', compact('fornecedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.fornecedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fornecedores = $this->repository->create($request->all());

        return redirect()->route('fornecedores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$fornecedor = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.fornecedores.show', compact('fornecedor'));    
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         if (!$fornecedor = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.fornecedores.edit', compact('fornecedor'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         if (!$fornecedor = $this->repository->find($id)) {
            return redirect()->back();
        }

         $fornecedor->update($request->all());

        return redirect()->route('fornecedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if (!$fornecedor = $this->repository->find($id)) {
            return redirect()->back();
        }


        $fornecedor->delete();

        return redirect()->route('fornecedores.index');   
     }

     /*
     *  Adicionar Forncedor dentro da ata
     *
     */
     public function ata(Request $request, $id)
     {
        $ata = Ata::find($id);
        
        $fornecedores = $this->repository->create($request->all());

         return redirect()->route('item.item', $ata->id);
     }

       /*
     *  Adicionar Forncedor dentro do lote
     *
     */
     public function lote(Request $request, $idAta, $idLote)
     {
        $ata = Ata::find($idAta);   
        $lote = Lote::find($idLote);
        
        $fornecedores = $this->repository->create($request->all());

         return redirect()->route('itens.create', [$ata->id, $lote->id]);
     }
}
