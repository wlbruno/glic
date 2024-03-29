<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ata;
use App\Http\Requests\AtaStoreUpdate;

class AtasController extends Controller
{

    private $repository;

    public function __construct(Ata $atas)
    {
        $this->repository = $atas;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atas = $this->repository->latest()->paginate();

        return view('admin.pages.atas.index', compact('atas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.atas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AtaStoreUpdate $request)
    {
        $data = $request->all();

        $data['data_vigencia'] = $data['data_assinatura'];

        $data['data_vigencia'] = date( "Y-m-d", strtotime( "+".$request->vigencia." month" ) );
        
        $name = $request->arquivo->getClientOriginalName();

        $data['arquivo'] = $request->arquivo->storeAs('pdf' , $name);
    
        $ata = $this->repository->create($data);

        if($ata->tipo == 'ITEM'){
            return redirect()->route('item.item', $ata->id)->with('success', 'Ata criada com sucesso, crie pelo menos um item para finalizar!');
        }
        return redirect()->route('lotes.create', $ata->id)->with('success', 'Ata criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$ata = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.atas.show', compact('ata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ata = $this->repository->where('id', $id)->first();   

        if (!$ata)
            return redirect()->back();
        

        return view('admin.pages.atas.edit', [
            'ata' => $ata
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AtaStoreUpdate $request, $id)
    {
        $ata = $this->repository->where('id', $id)->first();   

        if (!$ata)
            return redirect()->back();

        $ata->update($request->all());

        return redirect()->route('atas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $ata = $this->repository
                            ->with('lotes')
                            ->where('id', $id)
                            ->first();   
        if($ata->tipo === 'ITEM'){
            if($ata->lotes[0]->Itenslote->count() > 0){
                return redirect()
                        ->back()
                        ->with('error', 'Existem itens vinculados a essa ata, portanto para remover a ata é necessário  deletar os itens');
            }else{
                $lote = $ata->lotes[0];
                  $lote->delete();
                  $ata->delete();
                
                  return redirect()->route('atas.index');
            }
        }

        if ($ata->lotes->count() > 0) {
            return redirect()
                        ->back()
                        ->with('error', 'Existem lotes vinculados a essa ata, portanto para remover a ata é necessário  deletar os lotes');
        }

        $ata->delete();

        return redirect()->route('atas.index');
    }

      /**
     * Search results 
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $filters = $request->only('filter');

         $atas = $this->repository
                                    ->where(function($query) use ($request) {
                                        if ($request->filter) {
                                            $query->where('nata', $request->filter)
                                                  ->orWhere('nprocesso', 'LIKE', "%{$request->filter}%");
                                        }
                                    })
                                    ->paginate();

        return view('admin.pages.atas.index', compact('atas', 'filters'));
    }

    /**
    *   Finalizar Ata
    *
    */
    public function finish($id)
    {
        $atas = Ata::find($id);

        return view('admin.pages.atas.finish', compact('atas'));
    }

    public function save(Request $request, $id)
    {
        $atas = Ata::find($id);
        $atas->status = $request->input('status');
        $atas->save();

        return redirect()->route('atas.index');
    }

    public function publicar(Request $request, $id)
    {
        $atas = Ata::find($id);
        $atas->status = $request->input('status');
        $atas->save();

        return redirect()->route('atas.index');   
    }

    /**
    *   Baixar PDF da ata
    *
    */
    public function pdf($id)
    {
        $atas = Ata::find($id);

          return response()->download(storage_path()."\app/".$atas->arquivo);

    }

    
    public function updateArquivo(Request $request, $id)
    {

        $atas = Ata::find($id);
        $data = $request->all();
     
        $name = $request->arquivo->getClientOriginalName();
        $data['arquivo'] = $request->arquivo->storeAs('pdf' , $name);
               
        $atas->arquivo =  $data['arquivo'];
        $atas->save();

        return redirect()->back();
    }

}
