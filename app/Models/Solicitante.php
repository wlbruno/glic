<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    protected $fillable = [
    'orgao', 'ramal', 'user_id', 'cnpj', 'estado',
    ];

    public function users()
    {
    	return $this->belongsTo("App\Models\User", "user_id");
    }
}
