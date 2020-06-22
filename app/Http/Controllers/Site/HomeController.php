<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ata;


class HomeController extends Controller
{

    private $repository;

    public function __construct(Ata $atas)
    {
        $this->repository = $atas;
    }


    public function index()
    {
  		$atasmedicamentos = Ata::where([
            ['departamento', "MEDICAMENTOS"],
            ['status', "PUBLIC"],
             ['orgao', "NAO"],
        ])->count();

        $atasprodutos =  Ata::where([
            ['departamento', "PRODUTOS MÉDICOS"],
            ['status', "PUBLIC"],
            ['orgao', "NAO"],
        ])->count();


        $atasaquisicoes = Ata::where([
            ['departamento', "AQUISIÇÕES EM GERAL"],
            ['status', "PUBLIC"],
             ['orgao', "NAO"],
        ])->count();
        

        $atasservicos = Ata::where([
            ['departamento', "SERVIÇOS EM GERAL"],
            ['status', "PUBLIC"],
             ['orgao', "NAO"],
        ])->count();

        return view('site.pages.home.index', compact('atasmedicamentos', 'atasprodutos', 'atasaquisicoes', 'atasservicos'));
    }
    

      public function searchAta(Request $request)
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

        return view('site.pages.atas.busca', compact('atas', 'filters'));
    }
}
