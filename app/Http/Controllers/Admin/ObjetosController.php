<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Objeto;
use App\Models\Ata;
use App\Models\Lote;
use App\Http\Requests\ObjetoStoreUpdate;

class ObjetosController extends Controller
{
    private $repository;

    public function __construct(Objeto $objetos)
    {
        $this->repository = $objetos;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objetos = $this->repository->latest()->paginate();

        return view('admin.pages.objetos.index', compact('objetos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.objetos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ObjetoStoreUpdate $request)
    {
        $objetos = $this->repository->create($request->all());

        return redirect()->route('objetos.index')->with('success', 'Sucesso ao criar o Objeto!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$objeto = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.objetos.show', compact('objeto'));    
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         if (!$objeto = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.objetos.edit', compact('objeto'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ObjetoStoreUpdate $request, $id)
    {
         if (!$objeto = $this->repository->find($id)) {
            return redirect()->back();
        }

         $objeto->update($request->all());

        return redirect()->route('objetos.index')->with('success', 'Edição realizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if (!$objeto = $this->repository->find($id)) {
            return redirect()->back();
        }


        $objeto->delete();

        return redirect()->route('objetos.index');   
     }

     /*
     *  Adicionar Forncedor dentro da ata
     *
     */
     public function ata(ObjetoStoreUpdate $request, $id)
     {
        $ata = Ata::find($id);
        
         $objetos = $this->repository->create($request->all());

        return redirect()->route('item.item', $ata->id);
     }

     /*
     *  Adicionar Forncedor dentro do lote
     *
     */
     public function lote(ObjetoStoreUpdate $request, $idAta, $idLote)
     {
        $ata = Ata::find($idAta);   
        $lote = Lote::find($idLote);
        
         $objetos = $this->repository->create($request->all());

         return redirect()->route('itens.create', [$ata->id, $lote->id]);
     }

     /**
      * Pesquisar por número de E-fisco do objeto 
      *
      */
      public function search(Request $request)
      {
        $filters = $request->only('filter');

        $objetos = $this->repository
                                   ->where(function($query) use ($request) {
                                       if ($request->filter) {
                                           $query->where('nefisco', $request->filter)
                                                 ->orWhere('nome', 'LIKE', "%{$request->filter}%");
                                       }
                                   })
                                   ->paginate();

       return view('admin.pages.objetos.index', compact('objetos', 'filters'));
      }


      
      /**
      *     Editar fornecedor na view lotes.index
      *
      */
      public function editViewLotes(ObjetoStoreUpdate $request)
      {  
        if (!$objeto = $this->repository->find($request->id)) {
            return redirect()->back();
        }

         $objeto->update($request->all());

        return redirect()->back();

      }
  

}
