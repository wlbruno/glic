<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carona_orgao extends Model
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
    	return $this->join('caronas', "carona_orgaos.caronas_id", '=',"caronas_id")->select('carona_orgaos.quantidade')->get();

    }
    
}
