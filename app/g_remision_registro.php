<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class g_remision_registro extends Model
{
    //
     public function producto(){
        return $this->belongsTo(producto::class,'producto_id');
    } 
}
