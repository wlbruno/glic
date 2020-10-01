<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Token;
use App\Models\Ata;
use App\Models\Carona;


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
            ['status', "PUBLICADA"],
             ['orgao', "NAO"],
        ])->count();

        $atasprodutos =  Ata::where([
            ['departamento', "PRODUTOS MÉDICOS"],
            ['status', "PUBLICADA"],
            ['orgao', "NAO"],
        ])->count();


        $atasaquisicoes = Ata::where([
            ['departamento', "AQUISIÇÕES EM GERAL"],
            ['status', "PUBLICADA"],
             ['orgao', "NAO"],
        ])->count();
        

        $atasservicos = Ata::where([
            ['departamento', "SERVIÇOS EM GERAL"],
            ['status', "PUBLICADA"],
             ['orgao', "NAO"],
        ])->count();

        return view('site.pages.home.index', compact('atasmedicamentos', 'atasprodutos', 'atasaquisicoes', 'atasservicos'));
    }

    /**
    *   Pesquisa por ATA e por KEY
    *
    */    

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

    public function searchKey(Request $request)
    {
        $data = $request->all();
        
        $token = Token::Where('token', $data)->get();

        return view('site.pages.atas.key', compact('token'));
    }

    /**
    *   Historico do User
    *
    */
    public function historico()
    {
        $caronas = Carona::Where('users_id', auth()->user()->id)->get();
            return view('site.pages.user.historico',  compact('caronas'));
    }

    /**
    *   Contato
    *
    */
    public function Contato(){
        return view('site.pages.user.contato');
    }
}
