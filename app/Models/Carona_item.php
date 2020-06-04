<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Carona_item extends Model
{
    public function Carona(){
        return $this->belongsTo("App\Models\Carona");
    }

    public function Itens(){
        return $this->belongsToMany('App\Models\Item', 'itens_id');
    }

     public function getQTD($item){
         return $this->where('itens_id', $item)->first();
    }

    public function  getquant(){
    	return $this->join('caronas', "carona_items.caronas_id", '=',"caronas_id")->select('carona_items.quantidade')->get();

    }
    

   
}

   