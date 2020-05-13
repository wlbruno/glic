<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
	protected $fillable = ['nome', 'nefisco'];


    public function item()
    {
    	return $this->hasMany("App\Models\Item");
    }
}
