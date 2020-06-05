<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
     public function Carona()
    {
        return $this->belongsTo("App\Models\Carona", "caronas_id");
    }
}
