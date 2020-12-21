<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ata;


class AtasController extends Controller
{

     public function __construct(Ata $ata)
    {
       $this->ata = $ata;
    }


    public function medicamentos(Ata $atas)
    {
        $atasMedicamento = Ata::Where([
                                ['departamento', 'MEDICAMENTOS'],
                                ['status', "PUBLICADA"],
                                ])->paginate();
               
        	return view('site.pages.atas.medicamentos.index', compact('atasMedicamento'));
    }

    public function produtos()
    {
        $atasProdutos = Ata::Where([
                                ['departamento', 'PRODUTOS MÉDICOS'],
                                ['status', "PUBLICADA"],
                                ])->paginate();

            return view('Site.pages.atas.produtos.index', compact('atasProdutos'));
    }

    public function aquisicao()
    {
         $atasAquisicao = Ata::Where([
                                ['departamento', 'AQUISIÇÕES EM GERAL'],
                                ['status', "PUBLICADA"],
                                ])->paginate();
        
        return view('Site.pages.atas.aquisicao.index', compact('atasAquisicao'));
    }

    public function servicos()
    {
         $atasServico = Ata::Where([
                                ['departamento', 'SERVIÇOS EM GERAL'],
                                ['status', "PUBLICADA"],
                                ])->paginate();

        return view('Site.pages.atas.servicos.index', compact('atasServico'));
    }

}