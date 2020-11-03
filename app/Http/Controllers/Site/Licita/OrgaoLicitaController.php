<?php

namespace App\Http\Controllers\Site\Licita;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ata;
use App\Models\Orgao;
use App\Models\Carona;
use App\Models\Carona_item;
use Auth;
use Illuminate\Support\Str;
use App\Models\Item;

class OrgaoLicitaController extends Controller
{
    

    /**
     * Function show ata orgao
     * 
     */
    public function showAta($id){
        
        $atas = Ata::find($id);

        $orgao = Orgao::where('users_id', auth()->user()->id)->get();

        $caronas = Carona::select('id')->where('atas_id', $atas->id)->where('users_id', Auth::user()->id)->get()->toArray();
        
        if(count($caronas) > 0){
             $itens_solicitados = Carona_item::whereIn('caronas_id', $caronas)->get();
      
         }else { 
             $itens_solicitados = array();
         }


        //dd($orgao[0]->atas->lotes[0]->ItensLote[0]->item);
        
        return view('site.pages.atas.licita.orgao.carona', compact('orgao', 'atas', 'itens_solicitados', 'caronas'));

    }

    /**
     * Fucntion Licita carona orgao
     * 
     */
    public function licita(Request $request)
    {
        $now = date('Y-m-d');
        
        $caronas = new Carona();
        $caronas->atas_id = $request->input('atas');
        $caronas->users_id = Auth::user()->id;
        $caronas->validade = date('Y-m-d', strtotime("+90 days", strtotime($now)));
        $caronas->token = Str::random(10);
        $caronas->save();
            for($i=0; $i<count($request->itens); $i++) {
                if($request->qtd_itens[$i] > 0){
                    $caronaitens = new Carona_item();
                    $caronaitens->caronas_id = $caronas->id;
                    $caronaitens->itens_id = $request->itens[$i];
                    $caronaitens->quantidade = $request->qtd_itens[$i];
                    $caronaitens->save();
                    $itens = Item::find($request->itens[$i]);
                    $itens->saldoOP = $itens->saldoOP - $request->qtd_itens[$i]; 
                if($itens->saldoOP < $itens->quantidadeOP){
                    $itens->quantidadeOP = $itens->saldoOP;
                }
                $itens->save();  
                $orgao = Orgao::find($request->input('orgao_id'));
                $orgao->saldo = $orgao->saldo -  $request->qtd_itens[$i]; 
                $orgao->save();
            }
        }  

        
          
            return redirect()->route('licita.pdf', $caronas->id);
    }

}
