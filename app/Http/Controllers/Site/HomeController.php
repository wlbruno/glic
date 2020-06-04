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
}
