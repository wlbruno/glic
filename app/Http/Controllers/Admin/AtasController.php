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
        $ata = $this->repository->create($request->all());

        return redirect()->route('lotes.create', $ata->id);
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

        if (!$ata)
            return redirect()->back();

        if ($ata->lotes->count() > 0) {
            return redirect()
                        ->back()
                        ->with('error', 'Existem lotes vinculados a essa ata, portanto para remover a ata é necessario deletar os lotes');
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
}
