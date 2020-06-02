<?php

namespace App\Http\Controllers\Site\Licita;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ata;
use App\Models\licita;
use App\Models\Licita_Item;
use App\Models\Item;
use Auth;

class LicitaController extends Controller
{
    public function index($idAta)
   	{
   		  if (!$ata = Ata::find($idAta)) {
            return redirect()->back();
        }
         $caronas = licita::select('id')->where('atas_id', $ata->id)->where('user_id', Auth::user()->id)->get()->toArray();
           if(count($caronas) > 0){
                $itens_solicitados = Licita_Item::whereIn('licitas_id', $caronas)->get();
            }else { 
                $itens_solicitados = array();
            }if(isset($ata)) {
                return view('site.pages.atas.licita.index', compact('ata', 'itens_solicitados'));
            }
                return redirect('/');

   	}

    public function carona(Request $request)
    {
        $caronas = new Licita();
        $caronas->atas_id = $request->input('atas');
        $caronas->user_id = Auth::user()->id;
        $caronas->save();
            for($i=0; $i<count($request->itens); $i++) {
                if($request->qtd_itens[$i] > 0){
                    $caronaitens = new Licita_Item();
                    $caronaitens->licitas_id = $caronas->id;
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

        dd($caronaitens);
          
    }
}
