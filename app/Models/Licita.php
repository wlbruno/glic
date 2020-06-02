<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Licita extends Model
{
    public function Itens(){
   		return $this->belongsToMany('App\Models\Item', 'carona_items', 'caronas_id', 'itens_id')->withTimestamps();
    }

    public function Atas(){
     	return $this->belongsTo("App\Models\Ata", "atas_id");
    }

    public function Carona_itens(){
      return $this->hasOne("App\Models\Licita_item", "licitas_id");
    }
}
