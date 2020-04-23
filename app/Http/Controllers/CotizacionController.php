<?php

namespace App\Http\Controllers;

use App\Cotizacion;
use App\Marcas;
use App\Producto;
use App\Cliente;
use App\Forma_pago;
use App\Personal;
use App\Moneda;
use App\Empresa;
use App\Cotizacion_factura_registro;
use App\Cotizacion_boleta_registro;
use App\kardex_entrada_registro;
use App\Facturacion;
use App\Igv;
use App\Ventas_registro;
use App\User;
use App\Personal_venta;

use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $cotizacion=Cotizacion::all();
        return view('transaccion.venta.cotizacion.index',compact('cotizacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_factura()
    {
        $productos=Producto::where('estado_anular',1)->where('estado_id','!=',2)->get();

        foreach ($productos as $index => $producto) {
            $utilidad[]=kardex_entrada_registro::where('producto_id',$producto->id)->where('estado',1)->avg('precio')*($producto->utilidad-$producto->descuento1)/100;
            $array[]=kardex_entrada_registro::where('producto_id',$producto->id)->where('estado',1)->avg('precio')+$utilidad[$index];
            $array_cantidad[]=kardex_entrada_registro::where('producto_id',$producto->id)->where('estado',1)->sum('cantidad');
            $array_promedio[]=kardex_entrada_registro::where('producto_id',$producto->id)->where('estado',1)->avg('precio');
        }

        $forma_pagos=Forma_pago::all();
        $clientes=Cliente::where('documento_identificacion','ruc')->get();
        $moneda=Moneda::all();
        $personales=Personal::all();
        $p_venta=Personal_venta::where('estado','0')->get();
        $igv=Igv::first();

        return view('transaccion.venta.cotizacion.factura.create',compact('productos','forma_pagos','clientes','personales','array','array_cantidad','igv','moneda','p_venta','array_promedio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_factura(Request $request)
    {
        //El input esta activo

         // return $request;

        $print=$request->get('print');
        if($print==1){
            $cliente_id=$request->get('cliente');
            // $atencion=$request->get('atencion');
            $forma_pago_id=$request->get('forma_pago');
            $moneda_id=$request->get('moneda');
            $validez=$request->get('validez');
            $garantia=$request->get('garantia');
            $user_id =auth()->user()->id;
            $observacion=$request->get('observacion');

            $articulo = $request->input('articulo');
            $count_articulo=count($articulo);

            $cantidad_p = $request->input('cantidad');
            $count_cantidad_p=count($cantidad_p);

            for($i=0 ; $i<$count_cantidad_p;$i++){
                $articulos[$i]= $request->input('articulo')[$i];
                $producto_id[$i]=strstr($articulos[$i], ' ', true);
            }

            for($i=0;$i<$count_articulo;$i++){

                $cantidad[]=$request->input('cantidad')[$i];
                $check_descuento[]=$request->input('check_descuento')[$i];
            }

            return view('transaccion.venta.cotizacion.fast_print',compact('cliente_id','forma_pago_id','validez','referencia','user_id','observacion','producto_id','cantidad','check_descuento'));
        }

        //codigo para convertir nombre a producto
        $cantidad_p = $request->input('cantidad');
        $count_cantidad_p=count($cantidad_p);

        for($i=0 ; $i<$count_cantidad_p;$i++){
            $articulos[$i]= $request->input('articulo')[$i];
            $producto_id[$i]=strstr($articulos[$i], ' ', true);
        }

        //contador de valores de articulos
        $articulo = $request->input('articulo');
        $count_articulo=count($articulo);

        //validacion para la no incersion de dobles articulos
        for ($e=0; $e < $count_articulo; $e++){
            $articulo_comparacion_inicial=$request->get('articulo')[$e];
            for ($a=0; $a< $count_articulo ; $a++) {
                if ($a==$e) {
                    $a++;
                }else {
                    $articulo_comparacion=$request->get('articulo')[$a];
                    if ($articulo_comparacion_inicial==$articulo_comparacion) {
                        return redirect()->route('cotizacion.create_factura')->with('repite', 'Datos repetidos - No permitidos!');
                    }
                }

            }
        }
        // Comisionista cobnvertir id

        $comisionista=$request->get('comisionista');
        if($comisionista!="" and $comisionista!="Sin comision - 0"){
            $numero = strstr($comisionista, '-',true);
            $numero_doc=personal::where('numero_documento',$numero)->first();
            $id_personal=$numero_doc->id;
            $comisionista_buscador=Personal_venta::where('id_personal',$id_personal)->first();
            //Comision segun comisionista
            $personal_venta=Personal_venta::where('id_personal',$comisionista_buscador->id)->first();
            $comi=$personal_venta->comision;
        }else{
            $comi=0;
        }



        //Convertir nombre del cliente a id
        $cliente_nombre=$request->get('cliente');
        $nombre = strstr($cliente_nombre, '-',true);

        $cliente_buscador=Cliente::where('numero_documento',$nombre)->first();
        // return $cliente_buscador->id;

         $forma_pago_id=$request->get('forma_pago');
         $formapago= Forma_pago::find($forma_pago_id);
         $dias= $formapago->dias;
        /*Fecha vencimiento*/
         $fecha =date("d-m-Y");
         $nuevafecha = strtotime ( '+'.$dias.' day' , strtotime ( $fecha ) ) ;
         $nuevafechas = date("d-m-Y", $nuevafecha );

        $personal_contador= cotizacion::all()->count();
        $suma=$personal_contador+1;
        $cod_comision='CO-0000'.$suma;


        $cotizacion=new Cotizacion;
        $cotizacion->cliente_id=$cliente_buscador->id;
        // $cotizacion->atencion=$request->get('atencion');
        $cotizacion->forma_pago_id=$request->get('forma_pago');
        $cotizacion->validez=$request->get('validez');
        $cotizacion->moneda_id=$request->get('moneda');
        $cotizacion->cod_comision=$cod_comision;
        $cotizacion->garantia=$request->get('garantia');
        $cotizacion->user_id =auth()->user()->id;
        $cotizacion->observacion=$request->get('observacion');
        $cotizacion->fecha_emision=$request->get('fecha_emision');
        $cotizacion->fecha_vencimiento=$nuevafechas;
        if($comisionista!="" and $comisionista!="Sin comision - 0"){
            $cotizacion->comisionista_id= $comisionista_buscador->id;
        }
        $cotizacion->estado='0';
        $cotizacion->estado_vigente='0';
        $cotizacion->save();

        

        //contador de valores de cantidad
        $cantidad = $request->input('cantidad');
        $count_cantidad=count($cantidad);

        //contador de valores del check descuento
        $check = $request->input('check_descuento');
        $count_check=count($check);

        if($count_articulo = $count_cantidad  = $count_check){
            for($i=0;$i<$count_articulo;$i++){
                $cotizacion_registro=new Cotizacion_factura_registro();
                $cotizacion_registro->cotizacion_id=$cotizacion->id;
                $cotizacion_registro->producto_id=$producto_id[$i];

                $producto=Producto::where('id',$producto_id[$i])->where('estado_id',1)->where('estado_anular',1)->first();
                $utilidad=kardex_entrada_registro::where('producto_id',$producto_id[$i])->where('estado',1)->avg('precio')*($producto->utilidad-$producto->descuento1)/100;
                $array=kardex_entrada_registro::where('producto_id',$producto_id[$i])->where('estado',1)->avg('precio')+$utilidad;
                $array2=kardex_entrada_registro::where('producto_id',$producto_id[$i])->where('estado',1)->avg('precio');
                // $array_pu_desc=kardex_entrada_registro::where('producto_id',$producto_id[$i])->where('estado',1)->avg('precio');
                $stock=kardex_entrada_registro::where('producto_id',$producto_id[$i])->where('estado',1)->sum('cantidad');
                $desc_comprobacion=$request->get('check_descuento')[$i];
                $cotizacion_registro->precio=$array;
                $cotizacion_registro->stock=$stock;
                $cotizacion_registro->cantidad=$request->get('cantidad')[$i];
                $cotizacion_registro->descuento=$request->get('check_descuento')[$i];
                $cotizacion_registro->promedio_original=$array2;
                if($desc_comprobacion <> 0){
                    $cotizacion_registro->precio_unitario_desc=$array-($array*$desc_comprobacion/100);
                }else{
                    $cotizacion_registro->precio_unitario_desc=$array;
                }
                $cotizacion_registro->comision=$comi;
                if($desc_comprobacion <> 0){
                    $cotizacion_registro->precio_unitario_comi=($array-($array*$desc_comprobacion/100))+($array*$comi/100);
                }else{
                    $cotizacion_registro->precio_unitario_comi=$array+($array*$comi/100);
                }

                $cotizacion_registro->save();
            }
        }else {
            return redirect()->route('cotizacion.create_factura')->with('campo', 'Falto introducir un campo de la tabla productos');
        }
        return redirect()->route('cotizacion.show',$cotizacion->id);

        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create_boleta()
    {
        $productos=Producto::where('estado_id',1)->where('estado_anular',1)->get();
        $igv_proceso=Igv::first();
        $igv_total=$igv_proceso->igv_total;

        foreach ($productos as $index => $producto) {

            $utilidad[]=kardex_entrada_registro::where('producto_id',$producto->id)->where('estado',1)->avg('precio')*($producto->utilidad-$producto->descuento1)/100;
            $array[]=(kardex_entrada_registro::where('producto_id',$producto->id)->where('estado',1)->avg('precio')+$utilidad[$index])+(kardex_entrada_registro::where('producto_id',$producto->id)->where('estado',1)->avg('precio')+$utilidad[$index])*$igv_total/100;
            $array_promedio[]=kardex_entrada_registro::where('producto_id',$producto->id)->where('estado',1)->avg('precio')+$utilidad[$index];

            $array_cantidad[]=kardex_entrada_registro::where('producto_id',$producto->id)->where('estado',1)->sum('cantidad');
        }

        $forma_pagos=Forma_pago::all();
        $clientes=Cliente::all();
        $moneda=Moneda::all();
        $personales=Personal::all();
        $p_venta=Personal_venta::all();
        $igv=Igv::first();

        return view('transaccion.venta.cotizacion.boleta.create',compact('productos','forma_pagos','clientes','personales','array','array_cantidad','igv','moneda','p_venta','array_promedio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_boleta(Request $request)
    {
        //El input esta activo

        // return $request;
        $igv_proceso=Igv::first();
        $igv_total=$igv_proceso->igv_total;

        $print=$request->get('print');
        if($print==1){
            $cliente_id=$request->get('cliente');
            // $atencion=$request->get('atencion');
            $forma_pago_id=$request->get('forma_pago');
            $moneda_id=$request->get('moneda');
            $validez=$request->get('validez');
            $garantia=$request->get('garantia');
            $user_id =auth()->user()->id;
            $observacion=$request->get('observacion');

            $articulo = $request->input('articulo');
            $count_articulo=count($articulo);

            $cantidad_p = $request->input('cantidad');
            $count_cantidad_p=count($cantidad_p);

            for($i=0 ; $i<$count_cantidad_p;$i++){
                $articulos[$i]= $request->input('articulo')[$i];
                $producto_id[$i]=strstr($articulos[$i], ' ', true);
            }

            for($i=0;$i<$count_articulo;$i++){

                $cantidad[]=$request->input('cantidad')[$i];
                $check_descuento[]=$request->input('check_descuento')[$i];
            }

            return view('transaccion.venta.cotizacion.fast_print',compact('cliente_id','forma_pago_id','validez','referencia','user_id','observacion','producto_id','cantidad','check_descuento'));
        }

        //codigo para convertir nombre a producto
        $cantidad_p = $request->input('cantidad');
        $count_cantidad_p=count($cantidad_p);

        for($i=0 ; $i<$count_cantidad_p;$i++){
            $articulos[$i]= $request->input('articulo')[$i];
            $producto_id[$i]=strstr($articulos[$i], ' ', true);
        }

        //contador de valores de articulos
        $articulo = $request->input('articulo');
        $count_articulo=count($articulo);

        //validacion para la no incersion de dobles articulos
        for ($e=0; $e < $count_articulo; $e++){
            $articulo_comparacion_inicial=$request->get('articulo')[$e];
            for ($a=0; $a< $count_articulo ; $a++) {
                if ($a==$e) {
                    $a++;
                }else {
                    $articulo_comparacion=$request->get('articulo')[$a];
                    if ($articulo_comparacion_inicial==$articulo_comparacion) {
                        return redirect()->route('cotizacion.create_boleta')->with('repite', 'Datos repetidos - No permitidos!');
                    }
                }

            }
        }
        // Comisionista convertir id

        $comisionista=$request->get('comisionista');
        if($comisionista!="" and $comisionista!="Sin comision - 0"){
            $numero = strstr($comisionista, '-',true);
            $numero_doc=personal::where('numero_documento',$numero)->first();
            $id_personal=$numero_doc->id;
            $comisionista_buscador=Personal_venta::where('id_personal',$id_personal)->first();
            //Comision segun comisionista
            $personal_venta=Personal_venta::where('id_personal',$comisionista_buscador->id)->first();
            $comi=$personal_venta->comision;
        }else{
            $comi=0;
        }



        //Convertir nombre del cliente a id
        $cliente_nombre=$request->get('cliente');
        $nombre = strstr($cliente_nombre, '-',true);

        $cliente_buscador=Cliente::where('numero_documento',$nombre)->first();
        // return $cliente_buscador->id;

        $personal_contador= cotizacion::all()->count();
        $suma=$personal_contador+1;
        $cod_comision='BO-0000'.$suma;

        $forma_pago_id=$request->get('forma_pago');
        $formapago= Forma_pago::find($forma_pago_id);
        $dias= $formapago->dias;
        /*Fecha vencimiento*/
        $fecha =date("d-m-Y");
        $nuevafecha = strtotime ( '+'.$dias.' day' , strtotime ( $fecha ) ) ;
        $nuevafechas = date("d-m-Y", $nuevafecha );



        $cotizacion=new Cotizacion;
        $cotizacion->cliente_id=$cliente_buscador->id;
        // $cotizacion->atencion=$request->get('atencion');
        $cotizacion->forma_pago_id=$request->get('forma_pago');
        $cotizacion->validez=$request->get('validez');
        $cotizacion->moneda_id=$request->get('moneda');
        $cotizacion->cod_comision=$cod_comision;
        $cotizacion->garantia=$request->get('garantia');
        $cotizacion->user_id =auth()->user()->id;
        $cotizacion->observacion=$request->get('observacion');
        $cotizacion->fecha_emision=$request->get('fecha_emision');
        $cotizacion->fecha_vencimiento=$nuevafechas;
        if($comisionista!="" and $comisionista!="Sin comision - 0"){
            $cotizacion->comisionista_id= $comisionista_buscador->id;
        }
        $cotizacion->estado='0';
        $cotizacion->estado_vigente='0';
        $cotizacion->save();


        //contador de valores de cantidad
        $cantidad = $request->input('cantidad');
        $count_cantidad=count($cantidad);

        //contador de valores del check descuento
        $check = $request->input('check_descuento');
        $count_check=count($check);

        if($count_articulo = $count_cantidad  = $count_check){
            for($i=0;$i<$count_articulo;$i++){
                $cotizacion_registro=new Cotizacion_boleta_registro();
                $cotizacion_registro->cotizacion_id=$cotizacion->id;
                $cotizacion_registro->producto_id=$producto_id[$i];

                $producto=Producto::where('id',$producto_id[$i])->where('estado_id',1)->where('estado_anular',1)->first();
                $utilidad=kardex_entrada_registro::where('producto_id',$producto_id[$i])->where('estado',1)->avg('precio')*($producto->utilidad-$producto->descuento1)/100;
                $array=kardex_entrada_registro::where('producto_id',$producto_id[$i])->where('estado',1)->avg('precio')+$utilidad+(kardex_entrada_registro::where('producto_id',$producto->id[$i])->where('estado',1)->avg('precio')+$utilidad[$i])*$igv_total/100;
                $array2=kardex_entrada_registro::where('producto_id',$producto_id[$i])->where('estado',1)->avg('precio');
                // $array_pu_desc=kardex_entrada_registro::where('producto_id',$producto_id[$i])->where('estado',1)->avg('precio');
                $stock=kardex_entrada_registro::where('producto_id',$producto_id[$i])->where('estado',1)->sum('cantidad');

                $desc_comprobacion=$request->get('check_descuento')[$i];
                $cotizacion_registro->precio=$array;
                $cotizacion_registro->stock=$stock;
                $cotizacion_registro->cantidad=$request->get('cantidad')[$i];
                $cotizacion_registro->descuento=$request->get('check_descuento')[$i];
                if($desc_comprobacion <> 0){
                    $cotizacion_registro->precio_unitario_desc=$array-($array*$desc_comprobacion/100);
                }else{
                    $cotizacion_registro->precio_unitario_desc=$array;
                }
                $cotizacion_registro->comision=$comi;
                $cotizacion_registro->promedio_original=$array2;
                if($desc_comprobacion <> 0){
                    $cotizacion_registro->precio_unitario_comi=($array-($array*$desc_comprobacion/100))+($array*$comi/100);
                }else{
                    $cotizacion_registro->precio_unitario_comi=$array+($array*$comi/100);
                }
                $cotizacion_registro->save();
            }
        }else {
            return redirect()->route('cotizacion.create_boleta')->with('campo', 'Falto introducir un campo de la tabla productos');
        }
        return redirect()->route('cotizacion.show',$cotizacion->id);

    }


    


    public function show($id)
    {
        $moneda=Moneda::where('principal',1)->first();
        $cotizacion_registro=Cotizacion_factura_registro::where('cotizacion_id',$id)->get();
        $cotizacion_registro2=Cotizacion_boleta_registro::where('cotizacion_id',$id)->get();
        foreach ($cotizacion_registro as $cotizacion_registros) {
             $array[]=kardex_entrada_registro::where('producto_id',$cotizacion_registros->producto_id)->avg('precio');
        }

        // $cotizacion_registro=Cotizacion_registro::where('cotizacion_id',$id)->get();
        $cotizacion=Cotizacion::find($id);
        $empresa=Empresa::first();
        $sum=0;
        $igv=Igv::first();
        $sub_total=0;

        $regla=substr($cotizacion->cod_comision,0,-6);
//        if ($regla=="CO"){
//            RETURN "V";
//        }
//        return "d";
         return view('transaccion.venta.cotizacion.show', compact('cotizacion','empresa','cotizacion_registro','cotizacion_registro2','sum','igv',"array","sub_total","moneda","regla"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function fast_print(Request $request){
    //     $atencion=$request->get('atencion');
    //     return view('transaccion.venta.cotizacion.fast_print',compact('atencion'));
    // }

     public function print($id){
        $moneda=Moneda::where('principal',1)->first();
        $cotizacion_registro=Cotizacion_factura_registro::where('cotizacion_id',$id)->get();
        foreach ($cotizacion_registro as $cotizacion_registros) {
             $array[]=kardex_entrada_registro::where('producto_id',$cotizacion_registros->producto_id)->avg('precio');
        }

        // $cotizacion_registro=Cotizacion_registro::where('cotizacion_id',$id)->get();
        $cotizacion=Cotizacion::find($id);
        $empresa=Empresa::first();
        $sum=0;
        $igv=Igv::first();
        $sub_total=0;

        return view('transaccion.venta.cotizacion.print' ,compact('cotizacion','empresa','cotizacion_registro','sum','igv',"array","sub_total","moneda"));
        }


         public function facturar($id)

        {
        $moneda=Moneda::where('principal',1)->first();
        $cotizacion_registro=Cotizacion_factura_registro::where('cotizacion_id',$id)->get();
        foreach ($cotizacion_registro as $cotizacion_registros) {
             $array[]=kardex_entrada_registro::where('producto_id',$cotizacion_registros->producto_id)->avg('precio');
        }

        $cotizacion=Cotizacion::find($id);
        /*Fecha vencimiento*/
         // $cotizacion_dias_pago= $cotizacion->forma_pago->dias;
         // $fecha =date("d-m-Y");
         // $nuevafecha = strtotime ( '+'.$cotizacion_dias_pago.' day' , strtotime ( $fecha ) ) ;
         // $nuevafechas = date("d-m-Y", $nuevafecha );

        $empresa=Empresa::first();
        $sum=0;
        $igv=Igv::first();
        $sub_total=0;



        $personal_contador= Facturacion::all()->count();
        $suma=$personal_contador+1;

         return view('transaccion.venta.cotizacion.facturar', compact('cotizacion','empresa','cotizacion_registro','sum','igv',"array","sub_total","moneda",'suma'));
        }


         public function facturar_store(Request $request)
        {

           
            // cambio de Estado Cotizador
            $id_cotizador=$request->get('id_cotizador');
            $cotizacion=Cotizacion::where('id',$id_cotizador)->first();
            $cotizacion->estado=1;
            $cotizacion->save();

            // Creacion de Facturacion
            $facturar=new Facturacion;
            $facturar->codigo_fac=$request->get('codigo_fac');
            $facturar->id_cotizador=$request->get('id_cotizador');
            $facturar->orden_compra=$request->get('orden_compra');
            $facturar->guia_remision=$request->get('guia_remision');
            $facturar->fecha_emision=$request->get('fecha_emision');
            $facturar->fecha_vencimiento=$request->get('fecha_vencimiento');
            $facturar->estado='0';
            $facturar->save();

            // Creacion de Ventas Registros del Comisinista
            $cotizador=$request->get('id_cotizador');
            $id_comisionista=$request->get('id_comisionista');
            $comisionista=Cotizacion::where('id',$cotizador)->first();
            $id_comi=$comisionista->comisionista_id;
            if(isset($id_comi)){
                 $comisionista=new Ventas_registro;
                 $comisionista->id_facturacion=$request->get('fac_id');
                 $comisionista->comisionista=$request->get('id_comisionista');
                 $comisionista->estado_aprobado='0';
                 $comisionista->pago_efectuado='0';
                 $comisionista->observacion='Viene del Cotizador';
                 $comisionista->save();
             }
            

            return redirect()->route('cotizacion.show',$id_cotizador);


        }
}
