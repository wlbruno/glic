<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Objeto;

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
    public function store(Request $request)
    {
        $objetos = $this->repository->create($request->all());

        return redirect()->route('objetos.index');
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
    public function update(Request $request, $id)
    {
         if (!$objeto = $this->repository->find($id)) {
            return redirect()->back();
        }

         $objeto->update($request->all());

        return redirect()->route('objetos.index');
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
}
