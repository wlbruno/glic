<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orgao extends Model
{
    protected $fillable = ['atas_id', 'itens_id', 'users_id', 'saldo', 'quantidade'];

    public function item()
    {
    	return $this->belongsTo("App\Models\Item", "itens_id");
    }

    public function users()
    {
    	return $this->belongsTo("App\Models\User");
    }

     public function atas()
    {
    	return $this->belongsTo("App\Models\Ata");
    }

    
}
