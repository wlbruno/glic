<?php

namespace App\Http\Controllers\Site\Licita;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ata;
use App\Models\Carona;
use App\Models\Carona_item;
use App\Models\Item;
use App\Models\Token;
use Illuminate\Support\Str;
use Auth;

class LicitaController extends Controller
{
    public function index($id)
   	{ 
     $atas = Ata::find($id);
        $caronas = Carona::select('id')->where('atas_id', $atas->id)->where('users_id', Auth::user()->id)->get()->toArray();
           if(count($caronas) > 0){
                $itens_solicitados = Carona_item::whereIn('caronas_id', $caronas)->get();
            }else { 
                $itens_solicitados = array();
            }if(isset($atas)) {
                return view('site.pages.atas.licita.index', compact('atas', 'itens_solicitados'));
            }
                return redirect('/');
   	}

    public function carona(Request $request)
    {
        $caronas = new Carona();
        $caronas->atas_id = $request->input('atas');
        $caronas->users_id = Auth::user()->id;
        $caronas->save();
            for($i=0; $i<count($request->itens); $i++) {
                if($request->qtd_itens[$i] > 0){
                    $caronaitens = new Carona_item();
                    $caronaitens->caronas_id = $caronas->id;
                    $caronaitens->itens_id = $request->itens[$i];
                    $caronaitens->quantidade = $request->qtd_itens[$i];
                    $caronaitens->save();
                    $itens = Item::find($request->itens[$i]);
                    $itens->max = $itens->max - $request->qtd_itens[$i]; 
                if($itens->max < $itens->quantidade){
                    $itens->quantidade = $itens->max;
                }
                $itens->save();  
            }
        }
          $token = new Token();
                $token->token = Str::random(30);
                $token->caronas_id = $caronas->id;               
                $token->save();   
          
            return redirect()->route('licita.pdf', $caronas->id);
    }

    

    public function gerarPDF($id)
    {
        $caronas = Carona::find($id);

        $pdf = \PDF::LoadView('site.pages.atas.licita.pdf', compact('caronas'));
        return $pdf->stream();
    }
}
