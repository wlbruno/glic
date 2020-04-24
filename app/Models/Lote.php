<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
     protected $fillable = ['atas_id', 'descricao'];


    public function ata()
    {
    	return $this->belongsTo('App\Models\Ata', "atas_id");
    }

  public function ItensLote(){
      return $this->belongsTo(Item_lote::class, 'itens_id', 'id');
    }
}

