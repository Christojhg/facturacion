<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
    protected $table = 'facturacion';

	protected $guarded = [];

	public function cotizacion(){
        return $this->belongsTo(Cotizacion::class,'id_cotizador');
    // } 
    // public function forma_pago(){
    //     return $this->belongsTo(forma_pago::class,'forma_pago_id');
    // } 
    // public function personal(){
    //     return $this->belongsTo(Personal::class,'personal_id');
    } 
    
}
