<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item_lote extends Model
{
      protected $fillable = [
   		'lotes_id', 'itens_id'
   ];

   public function item()
	{
		return $this->belongsTo('App\Models\Item', 'itens_id');
	}

	public function lote()
	{
		return $this->belongsTo('App\Models\Lote', 'lotes_id');
	}
}
