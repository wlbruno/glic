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

    public function __construct(Ata $atas, Carona $caronas)
    {
        $this->repository = $atas;
        $this->repository = $caronas;
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

         $atas = Ata::where(function($query) use ($request) {
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
        $data = $request->input('key');
         
        $caronas = $this->repository
        ->where(function($query) use ($request) {
            if ($request->key) {
                $query->where('token', $request->key);
            }
       })
        ->get();
        
        return view('site.pages.atas.key', compact('caronas'));
    }

    // public function keyPDF($id)
    // {
    //     $carona = Ata::find($id);

    //     return response()->download(storage_path()."\app/carona/".$carona->token);
    // }

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
