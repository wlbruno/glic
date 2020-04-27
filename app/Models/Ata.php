<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ata extends Model
{
    protected $fillable = ['departamento', 'descricao', 'nata', 'npregao', 'nprocesso', 'vigencia', 'tipo', 'comissao', 'status', 'orgao', 'arquivo' ];


    public function lotes()
    {
    	return $this->hasMany("App\Models\Lote", "atas_id");
    }

}
