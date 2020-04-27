<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ata;


class HomeController extends Controller
{
       public function index()
    {
  		     
  $atasmedicamentos = Ata::where([
            ['departamento', "MEDICAMENTOS"],
            ['status', "PUBLICADA"],
        ])->count();

        $atasprodutos =  Ata::where([
            ['departamento', "PRODUTOS MÉDICOS"],
            ['status', "PUBLICADA"],
        ])->count();


        $atasaquisicoes = Ata::where([
            ['departamento', "AQUISIÇÕES EM GERAL"],
            ['status', "PUBLICADA"],
        ])->count();
        

        $atasservicos = Ata::where([
            ['departamento', "SERVIÇOS EM GERAL"],
            ['status', "PUBLICADA"],
        ])->count();

        return view('public.pages.home.index', compact('atasmedicamentos', 'atasprodutos', 'atasaquisicoes', 'atasservicos'));
    }
}
