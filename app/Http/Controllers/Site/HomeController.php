<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ata;


class HomeController extends Controller
{
    public function index()
    {
  		$atasmedicamentos = Ata::where([
            ['departamento', "MEDICAMENTOS"],
            ['status', "PUBLIC"],
        ])->count();

        $atasprodutos =  Ata::where([
            ['departamento', "PRODUTOS MÉDICOS"],
            ['status', "PUBLIC"],
        ])->count();


        $atasaquisicoes = Ata::where([
            ['departamento', "AQUISIÇÕES EM GERAL"],
            ['status', "PUBLIC"],
        ])->count();
        

        $atasservicos = Ata::where([
            ['departamento', "SERVIÇOS EM GERAL"],
            ['status', "PUBLIC"],
        ])->count();

        return view('site.pages.home.index', compact('atasmedicamentos', 'atasprodutos', 'atasaquisicoes', 'atasservicos'));
    }
}
