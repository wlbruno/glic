<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
	protected $table = 'fornecedores';

    public  function item() 
    {
    	return $this->hasMany("App\Models\Item");
    }
}
