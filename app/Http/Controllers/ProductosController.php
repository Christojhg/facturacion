<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Unidad_medida;
use App\Categoria;
use App\Marca;
use App\Estado;
use App\Familia;
use App\Moneda;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $productos=Producto::all();
        return view('maestro.catalogo.productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $monedas=Moneda::all();
        $familias=Familia::all();
        $marcas=Marca::all();
        $estados=Estado::all();
        $categorias=Categoria::all();
        $unidad_medidas=Unidad_medida::all();
        return view('maestro.catalogo.productos.create',compact('unidad_medidas','categorias','marcas','estados','familias','monedas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image =$request->file('foto');
        $codigo= $request->get('codigo_barras');
        $name = $codigo."-".$image->getClientOriginalName();
        $image->move(public_path().'/archivos/imagenes/productos',$name);

        $producto=new Producto;
        $producto->cod_producto=$request->get('cod_producto');
        $producto->cod_alternativo=$request->get('cod_alternativo');
        $producto->categoria_id=$request->get('categoria_id');
        $producto->familia_id=$request->get('familia_id');
        $producto->marca_id=$request->get('marca_id');
        $producto->nombre=$request->get('nombre');
        $producto->descripcion=$request->get('descripcion');
        $producto->estado_id=$request->get('estado_id');
        $producto->origen=$request->get('origen');
        $producto->descuento=$request->get('descuento');
        $producto->utilidad=$request->get('utilidad');
        $producto->unidad_medida_id=$request->get('unidad_medida_id');
        $producto->monedas_id=$request->get('monedas_id');
        $producto->precio=$request->get('precio');
        $producto->foto=$name;
        $producto->save();

        return redirect()->route('productos.index');








    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto=Producto::find($id);
        return view('maestro.catalogo.productos.show',compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto=Producto::find($id);
        $unidad_medidas=Unidad_medida::all();
        return view('maestro.catalogo.productos.edit',compact('unidad_medidas','producto'));
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
        $image =$request->file('foto');
        $codigo= $request->get('codigo_barras');
        $name = $codigo."-".$image->getClientOriginalName();
        $image->move(public_path().'/archivos/imagenes/productos',$name);

        $producto=Producto::find($id);
        $producto->nombre=$request->get('nombre');
        $producto->utilidad=$request->get('utilidad');
        $producto->descuento=$request->get('descuento');
        $producto->descuento2=$request->get('descuento2');
        $producto->categoria=$request->get('categoria');
        $producto->marca=$request->get('marca');
        $producto->modelo=$request->get('modelo');
        $producto->unidad_medida=$request->get('unidad_medida');
        $producto->producto_estado=$request->get('activo');
        $producto->foto=$name;
        $producto->descripcion=$request->get('descripcion');
        $producto->save();
        return redirect()->route('productos.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto=Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index');
    }
}
