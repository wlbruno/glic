<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Objeto extends Model
{
     function item() {
    	return $this->hasMany("App\Models\Item");
    }
}
