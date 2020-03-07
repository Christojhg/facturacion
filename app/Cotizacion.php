<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = 'cotizacion';

	protected $guarded = [];

	public function cliente(){
        return $this->belongsTo(cliente::class,'cliente_id');
    } 
    public function forma_pago(){
        return $this->belongsTo(forma_pago::class,'forma_pago_id');
    } 
    
}

