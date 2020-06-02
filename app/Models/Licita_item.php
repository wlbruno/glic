<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Licita_item extends Model
{
     public function Carona(){
        return $this->belongsTo("App\Models\Licita");
    }

    public function Itens(){
        return $this->belongsToMany('App\Models\Item', 'itens_id');
    }
}
