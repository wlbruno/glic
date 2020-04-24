<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model

{
    protected $table = 'itens';

    protected $fillable = ['objetos_id', 'fornecedores_id', 'medida', 'quantidade', 'teto', 'vunitario', 'vtotal', 'marca'];



    public function lotes()
    {
    	return $this->belongsToMany(Lote::class);
    }
}
