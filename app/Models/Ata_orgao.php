<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ata_orgao extends Model
{
     public function atas()
    {
    	return $this->belongsTo("App\Models\Ata", "atas_id");
    }
}
