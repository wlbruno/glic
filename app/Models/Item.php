<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model

{
    protected $table = 'itens';

    protected $fillable = ['objetos_id', 'fornecedores_id', 'medida', 'quantidade', 'max', 'vunitario', 'vtotal', 'marca', 'orgao', 'value'];



    public function ItensLote()
    {
      return $this->belongsTo(Item_lote::class, 'itens_id', 'id');
    }

    public function objetos()
    {
    	return $this->belongsTo("App\Models\Objeto");
    }

    public function fornecedores()
    {
    	return $this->belongsTo("App\Models\Fornecedor");
    }

     public function orgaos()
    {
        return $this->hasMany("App\Models\Orgao", "itens_id");
    }

    
}
