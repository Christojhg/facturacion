@extends('layout')
@section('title', 'Facturacion Productos')
@section('breadcrumb', 'Facturacion')
@section('breadcrumb2', 'Facturacion')
@section('href_accion', route('facturacion.index'))
@section('value_accion', 'Atras')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<head>
    <script type="text/javascript">
        $(document).ready(function() {

            $("form").keypress(function(e) {
                if (e.which == 13) {
                    setTimeout(function() {
                        e.target.value += ' | ';
                    }, 4);
                    e.preventDefault();
                }
            });


        });
    </script>
</head>
@section('content')
@if (session('repite'))
<div class="alert alert-success">
    {{ session('repite') }}
</div>
@endif

@if (session('campo'))
<div class="alert alert-success">
    {{ session('campo') }}
</div>
@endif

@if($errors->any())
<div style="padding-top: 20px;">
    <div class="alert alert-danger">
        <a class="alert-link" href="#">
            @foreach ($errors->all() as $error)
            <li style="color: red">{{ $error }}</li>
            @endforeach
        </a>
    </div>
</div>
@endif


<div class="social-bar">
    <a class="icon icon-facebook" target="_blank" data-toggle="modal" data-target=".bd-example-modal-lg1"><i class="fa fa-user-o" aria-hidden="true"></i><span> cliente</span></a>

</div>
<!-- Modal CLiente -->

<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="width: 100%">
            <!-- Consulta API -->
            <form class="wizard-big" style="margin:20px 20px 20px 20px">
                {{ csrf_field() }}
                <div class="form-group row ">
                    <label class="col-sm-2 col-form-label" >Introducir Ruc (Inestable):</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" class="ruc" id="ruc" name="ruc">
                        <button class="btn btn-primary" id="botoncito" class="botoncito"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </div>
            </form>

            <script>
                $(function(){
                    $('#botoncito').on('click', function(){
                        var ruc = $('#ruc').val();
                        var url = "{{ url('provedorruc') }}";
                        $('.ajaxgif').removeClass('hide');
                        $.ajax({
                            type:'GET',
                            url:url,
                            data:'ruc='+ruc,
                            success: function(datos_dni){
                                $('.ajaxgif').addClass('hide');
                                var datos = eval(datos_dni);
                                var nada ='nada';
                                if(datos[0]==nada){
                                    alert('DNI o RUC no válido o no registrado');
                                }else{
                                    $('#numero_ruc').val(datos[0]);
                                    $('#razon_social').val(datos[1]);
                                    $('#fecha_actividad').val(datos[2]);
                                    $('#condicion').val(datos[3]);
                                    $('#tipo').val(datos[4]);
                                    $('#estado').val(datos[5]);
                                    $('#fecha_inscripcion').val(datos[6]);
                                    $('#domicilio').val(datos[7]);
                                    $('#emision').val(datos[8]);
                                }
                            }
                        });
                        return false;
                    });
                });
            </script>
            <!-- Fin Consulta API -->
            <form action="{{ route('agregado_rapido.cliente_cotizado') }}"  enctype="multipart/form-data" id="form" class="wizard-big" method="post" style="margin:0 20px 20px 20px">
                @csrf
                <h1 ><i class="fa fa-user-o" aria-hidden="true"></i></h1>
                <div class="form-group row ">
                    <label class="col-sm-2 col-form-label" >Tipo Documento:</label>
                    <div class="col-sm-4">
                        <select class="form-control m-b" name="documento_identificacion" >
                            <option value="Ruc">Ruc</option>
                            <option value="dni">DNI</option>
                            <option value="pasaporte">Pasaporte</option>
                        </select>
                    </div>
                    <label class="col-sm-2 col-form-label">Numero de Documento:</label>
                    <div class="col-sm-4">
                        <input list="browserdoc" class="form-control m-b" name="numero_documento" id="numero_ruc" required value="{{ old('numero_documento')}}" autocomplete="off" type="number">
                        <datalist id="browserdoc" >
                            @foreach($clientes as $cliente)
                            <option id="a">{{$cliente->numero_documento}} - existente</option>
                            @endforeach
                        </datalist>
                    </div>
                </div>
                <div class="form-group row" >
                    <label class="col-sm-2 col-form-label" >Cliente:</label>
                    <div class="col-sm-4">
                        <input list="browsersc" class="form-control m-b" name="nombre" id="razon_social" required value="{{ old('nombre')}}" autocomplete="off">
                        <datalist id="browsersc" >
                            @foreach($clientes as $cliente)
                            <option id="a">{{$cliente->nombre}} - existente</option>
                            @endforeach
                        </datalist>
                    </div>
                    <label class="col-sm-2 col-form-label">Direccion:</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="direccion" id="domicilio" class="form-control" required value="{{ old('direccion')}}" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" >correo:</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" name="email" class="form-control" required value="{{ old('email')}}" autocomplete="off">
                    </div>
                </div>
                <input type="submit"class="btn btn-primary" value="Grabar">
            </form>
        </div>
    </div>
</div>
<!-- Fin Modal Clieb¿nte -->
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Agregar </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">Config option 1</a>
                            </li>
                            <li><a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form action="{{route('facturacion.store')}}"  enctype="multipart/form-data" method="post">
                        @csrf
                        {{-- Cabecera --}}
                        <div class="row">
                            <div class="col-sm-4 text-left" align="left">

                                <address class="col-sm-4" align="left">

                                    <img src="{{asset('img/logos/logo.png')}}" alt="" width="300px">
                                </address>
                            </div>
                            <div class="col-sm-4">
                            </div>

                            <div class="col-sm-4 ">
                                <div class="form-control ruc" style="height: 125px">
                                    <center>
                                        <h3 style="padding-top:10px ">{{$empresa->ruc}}</h3>
                                        <h2>FACTURA ELECTRONICA</h2>
                                        <h5>FC-000{{$suma}}</h5>
                                    </center>

                                </div>
                            </div>
                        </div><br>

                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Cliente</td>
                                    <td>:</td>
                                    <td><input list="browsersc1" class="form-control m-b" name="cliente" required="required" value="{{ old('nombre')}}" autocomplete="off">
                                        <datalist id="browsersc1" >
                                            @foreach($clientes as $cliente)
                                            <option id="{{$cliente->id}}">{{$cliente->numero_documento}} - {{$cliente->nombre}}</option>
                                            @endforeach
                                        </datalist></td>

                                        <td>Comisionista</td>
                                        <td>:</td>
                                        <td> <input list="browsersc2" class="form-control m-b" id="comisionista" name="comisionista" required value="Sin comision - 0" onkeyup="comision()" autocomplete="off">
                                            <datalist id="browsersc2" >
                                                <option id="">Sin comision - 0 </option>
                                                @foreach($p_venta as $p_ventas)
                                                <option id="{{$p_ventas->id}}">{{$p_ventas->cod_vendedor}} - {{$p_ventas->personal->personal_l->nombres}} - <span style="color: red">{{$p_ventas->comision}}</span></option>
                                                @endforeach
                                            </datalist>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Orden de compra</td>
                                        <td>:</td>
                                        <td><input type="text" class="form-control m-b" name="orden_compra" required  autocomplete="off" value="0"></td>

                                        <td>Forma de pago</td>
                                        <td>:</td>
                                        <td><select class="form-control" name="forma_pago" required="required">
                                            @foreach($forma_pagos as $forma_pago)
                                            <option value="{{$forma_pago->id}}">{{$forma_pago->nombre}}</option>
                                            @endforeach
                                            <select></td>
                                            </tr>
                                            <tr>
                                                <td>Vendedor</td>
                                                <td>:</td>
                                                <td><input type="text" class="form-control" name="personal" disabled required="required" value="{{auth()->user()->name}}"></td>

                                                <td>Guia remision</td>
                                                <td>:</td>
                                                <td> <input type="text" class="form-control" value="0" name="guia_r"></td>


                                            </tr>
                                            <tr>
                                                <td>Moneda</td>
                                                <td>:</td>
                                                <td><select class="form-control" name="moneda" required="required">
                                                    @foreach($moneda as $monedas)
                                                    <option value="{{$monedas->id}}">{{$monedas->nombre}}</option>
                                                    @endforeach
                                                    <select></td>

                                                        <td>Fecha</td>
                                                        <td>:</td>
                                                        <td><input type="text" name="fecha_emision" class="form-control" value="{{date("d-m-Y")}}" readonly="readonly"></td>
                                                    </tr>
                                                    <tr>

                                                        <td>Observacion</td>
                                                        <td>:</td>
                                                        <td colspan="4"><textarea class="form-control" name="observacion" id="observacion"  rows="2"  >Emitimos la siguiente Factura a vuestra solicitud</textarea>
                                                        </td>
                                                    </tr>
                                                </div>


                                            </tbody>
                                        </table>

                                        {{--FIn Cabecera --}}
                                        @if($categoria=='servicio')
                                        <div class="table-responsive">
                                            <table   cellspacing="0" class="table tablese  ">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px"><input class='check_all' type='checkbox' onclick="select_all()" /></th>
                                                        <th style="width: 400px;font-size: 13px">Articulo</th>
                                                        <th style="width: 100px;font-size: 13px">Precio</th>
                                                        <th style="width: 100px;font-size: 13px">Descuento</th>
                                                        <th style="width: 100px;font-size: 13px">Precio U desc</th>
                                                        <th style="width: 100px;font-size: 13px">PU. Com.</th>
                                                        <th style="width: 100px;font-size: 13px">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type='checkbox' class="case">
                                                        </td>
                                                        <td>
                                                            <input list="browsers2" class="form-control " name="articulo[]" class="monto0 form-control" required id='articulo' onkeyup="calcular(this,0);multi(0)" onclick="Clear(this);" autocomplete="off">
                                                            <datalist id="browsers2" >
                                                                @foreach($servicios as $index => $servicio)
                                                                <option value="{{$servicio->id}} | {{$servicio->codigo_servicio}} | {{$servicio->codigo_original}} | {{$servicio->nombre}} / &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 0 0 {{$servicio->descuento}} {{$array[$index]}}">
                                                                    @endforeach
                                                                </datalist>
                                                            </td>
                                                            <td>
                                                                <input type='text' id='precio0' name='precio[]' readonly="readonly" class="monto0 form-control" required  autocomplete="off" />
                                                            </td>
                                                            <td>
                                                                {{-- <input type='text' id='descuento0' name='descuento[]' readonly="readonly" class="monto0 form-control" required  autocomplete="off" /> --}}
                                                                <div style="position: relative; " > <input class="text_des"type='text' id='descuento0' name='descuento[]' readonly="readonly" class="" required  autocomplete="off"/>
                                                                </div>
                                                                <div class="div_check" >
                                                                 <input class="check"  type='checkbox' id='check0' name='check[]' onclick="multi(0)" style="" autocomplete="off"/>
                                                             </div>
                                                         </td>
                                                         <td>
                                                            <input type='text' id='descuento_unitario0' name='descuento_unitario[]' readonly="readonly" class="monto0 form-control" required  autocomplete="off" />
                                                        </td>
                                                        <td>
                                                            <input type='text' id='comision0' name='comision[]' readonly="readonly" class="form-control" required  autocomplete="off" />
                                                        </td>
                                                        <td>
                                                            <input type='text' id='total0' name='total' disabled="disabled" class="total form-control " required  autocomplete="off" />
                                                        </td>
                                                        <span id="spTotal"></span>
                                                    </tr>

                                                </tbody><br>
                                                <tbody>
                                                    <tr style="background-color: #f5f5f500;" align="center">
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Subtotal :</td>
                                                        <td><input id='sub_total'  disabled="disabled" class="form-control" required /></td>
                                                    </tr>
                                                    <tr style="background-color: #f5f5f500;" align="center">
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>IGV :</td>
                                                        <td><input id='igv'  disabled="disabled" class="form-control" required /></td>
                                                    </tr>
                                                    <tr  align="center">
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Total :</td>
                                                        <td><input id='total_final'  disabled="disabled" class="form-control" required /></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <input type="text" name="facturacion" value="servicio">
                                        <button type="button" class='delete btn btn-danger'  > <i class="fa fa-trash" aria-hidden="true"></i> </button>&nbsp;
                                        <button type="button" class='addmores btn btn-success' > <i class="fa fa-plus-square" aria-hidden="true"></i> </button>&nbsp;
                                        <button class="btn btn-primary float-right" type="submit"><i class="fa fa-cloud-upload" aria-hidden="true"> Guardar</i></button>&nbsp;
                                        @elseif($categoria=='producto')
                                        <div class="table-responsive">
                                            <table   cellspacing="0" class="table tables  " style="width: 1100px">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px"><input class='check_all' type='checkbox' onclick="select_all()" /></th>
                                                        <th style="width: 400px">Articulo</th>
                                                        <th>Stock</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio</th>
                                                        <th>Dcto</th>
                                                        <th>PU. Dcto.</th>
                                                        <th>PU. Com.</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type='checkbox' class="case">
                                                        </td>
                                                        <td>
                                                            <input list="browsers2" class="form-control " name="articulo[]" class="monto0 form-control" required id='articulo' onkeyup="calcular(this,0);multi(0)"  autocomplete="off">
                                                            <datalist id="browsers2" >
                                                                @foreach($productos as $index => $producto)
                                                                <option value="{{$producto->id}} | {{$producto->codigo_producto}} | {{$producto->codigo_original}} | {{$producto->nombre}} / &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$array_promedio[$index]}} {{$array_cantidad[$index]}} {{$producto->descuento1}} {{$array[$index]}}">
                                                                    @endforeach
                                                                </datalist>
                                                                <textarea type='text' id='numero_serie0'  name='numero_serie[]' class="form-control"   autocomplete="off" style="margin-top: 5px;"></textarea>

                                                            </td>

                                                            <td>
                                                                <input  style="width: 76px" type='text' id='stock0' readonly="readonly" name='stock[]' class="form-control" required  autocomplete="off"/>
                                                            </td>
                                                            <td>
                                                                <input style="width: 76px" type='text' id='cantidad0' name='cantidad[]' max="" class="monto0 form-control"  onkeyup="multi(0)"  required  autocomplete="off" />
                                                            </td>
                                                            <td>
                                                                <input style="width: 76px" type='text' id='precio0' name='precio[]' readonly="readonly" class="monto0 form-control" onkeyup="multi(0)" required  autocomplete="off" />
                                                            </td>


                                                            <td>
                                                                <div style="position: relative; " > <input class="text_des"type='text' id='descuento0' name='descuento[]' readonly="readonly" class="" required  autocomplete="off"/></div>


                                                                <div  class="div_check" >
                                                                    <input class="check"  type='checkbox' id='check0' name='check[]'    onclick="multi(0)" style="" autocomplete="off"/></div>
                                                                    <input type='hidden' id='check_descuento0' name='check_descuento[]'  class="form-control"  required >
                                                                    <input type='hidden' id='promedio_original0' name='promedio_original[]'  class="form-control"  required >
                                                                </td>
                                                                <td>
                                                                    <input style="width: 76px" type='text' id='precio_unitario_descuento0' name='precio_unitario_descuento[]' readonly="readonly" class="precio_unitario_descuento0 form-control"  required  autocomplete="off" />
                                                                </td>
                                                                <input style="width: 76px"  type='hidden' name="comision[]" id='comision0'  readonly="readonly" class="form-control"  required  autocomplete="off" />
                                                                <td>
                                                                    <input style="width: 76px"  type='text' id='precio_unitario_comision0' name='precio_unitario_comision[]' readonly="readonly" class="form-control"  required  autocomplete="off" />
                                                                </td>
                                                                <td>
                                                                    <input style="width: 76px"  type='text' id='total0' name='total' disabled="disabled" class="total form-control " required  autocomplete="off" />
                                                                </td>
                                                                <span id="spTotal"></span>
                                                            </tr>

                                                        </tbody>
                                                        <tbody>
                                                            <tr style="background-color: #f5f5f500;" align="center">
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>Subtotal :</td>
                                                                <td><input id='sub_total'  disabled="disabled"  style="width: 76px"  class="form-control" required /></td>
                                                            </tr>
                                                            <tr style="background-color: #f5f5f500;" align="center">
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>IGV :</td>
                                                                <td><input id='igv'  style="width: 76px"   disabled="disabled" class="form-control" required /></td>
                                                            </tr>
                                                            <tr  align="center">
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>Total :</td>
                                                                <td><input id='total_final'  style="width: 76px"  disabled="disabled" class="form-control" required /></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <input type="text" name="facturacion" value="producto">
                                                <button type="button" class='delete btn btn-danger'  > <i class="fa fa-trash" aria-hidden="true"></i> </button>&nbsp;
                                                <button type="button" class='addmore btn btn-success' > <i class="fa fa-plus-square" aria-hidden="true"></i> </button>&nbsp;
                                                <button class="btn btn-primary float-right" type="submit"><i class="fa fa-cloud-upload" aria-hidden="true"> Guardar</i></button>&nbsp;
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <style>
                            .form-control{border-radius: 10px}
                            .text_des{border-radius: 10px;border: 1px solid #e5e6e7;width: 80px;padding: 6px 12px;}
                            .check{-webkit-appearance: none;height: 34px;background-color: #ffffff00;-moz-appearance: none;border: none;appearance: none;width: 80px;border-radius: 10px;}
                            .div_check{position: relative;top: -33px;left: 0px;background-color: #ffffff00;  top: -35;}
                            .check:checked {background: #0375bd6b;}
                        </style>
                        <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
                        <script src="{{ asset('js/popper.min.js') }}"></script>
                        <script src="{{ asset('js/bootstrap.js') }}"></script>
                        <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
                        <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

                        <!-- Custom and plugin javascript -->
                        <script src="{{ asset('js/inspinia.js') }}"></script>
                        <script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>
                        @if($categoria=='producto')
                        <script>
                            var i = 2;
                            $(".addmore").on('click', function () {
                                var data = `[
                                <tr>
                                <td>
                                <input type='checkbox' class='case'/>
                                </td>";
                                <td>
                                <input list="browsers" class="form-control " name="articulo[]" required id='articulo${i}' onkeyup="calcular(this,${i});multi(${i})" autocomplete="off">
                                <datalist id="browsers" >
                                @foreach($productos as $index => $producto)
                                <option value="{{$producto->id}} | {{$producto->codigo_producto}} | {{$producto->codigo_original}} | {{$producto->nombre}} / &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{$array_promedio[$index]}} {{$array_cantidad[$index]}} {{$producto->descuento1}} {{$array[$index]}}" >
                                @endforeach
                                </datalist>
                                <textarea type='text' id='numero_serie0'  name='numero_serie[]' class="form-control"   autocomplete="off" style="margin-top: 5px;"></textarea>
                                </td>
                                <td>
                                <input type='text' style="width: 76px"  id='stock${i}' name='stock[]' readonly="readonly" class="form-control" required  autocomplete="off"/>
                                </td>
                                <td>
                                <input type='text' style="width: 76px"  id='cantidad${i}' name='cantidad[]' class="monto${i} form-control" onkeyup="multi(${i})" required  autocomplete="off"/>
                                </td>
                                <td>
                                <input type='text' style="width: 76px"  id='precio${i}' name='precio[]' readonly="readonly" class="monto${i} form-control" onkeyup="multi(${i})" required  autocomplete="off"/>
                                </td>
                                <td>
                                <div style="position: relative;" >
                                <input class="text_des"type='text' id='descuento${i}' name='descuento[]' readonly="readonly" class="" required onkeyup="multi(${i})"  autocomplete="off"/>
                                </div>
                                <div  class="div_check">
                                <input class="check"  type='checkbox' id='check${i}' name='check[]' onclick="multi(${i})" style="" autocomplete="off"/>
                                </div>
                                <input style="width: 76px" type='hidden'id='check_descuento${i}' name='check_descuento[]'  class="form-control"  required >
                                <input type='hidden' id='promedio_original${i}' name='promedio_original[]'  class="form-control"  required >
                                </td>

                                <td>
                                <input type='text' id='precio_unitario_descuento${i}'  style="width: 76px"  name='precio_unitario_descuento[]' readonly="readonly" class="precio_unitario_descuento${i} form-control"  required  autocomplete="off" />
                                </td>

                                <input type='hidden' name="comision[]" id='comision${i}'  style="width: 76px"  readonly="readonly" class="form-control"  required  autocomplete="off" />

                                <td>
                                <input type='text' id='precio_unitario_comision${i}'  style="width: 76px"  name='precio_unitario_comision[]' readonly="readonly" class="form-control"  required  autocomplete="off" />
                                </td>

                                <td>
                                <input type='text' id='total${i}'  style="width: 76px"  name='total' disabled="disabled" class="total form-control "  required  autocomplete="off"/>
                                </td>

                                </tr>`;
                                $('.tables').append(data);
                                i++;
                            });
                        </script>



                        <script>

                            function comision(){

            //comision
            var comision=document.querySelector(`#comisionista`).value;
            var separador=" ";
            //revirtiendo la cadena
            var reverse9=reverseString(comision);//devuelve toda la cadena articulo al reves
            //para comision
            var comision_v_r=reverse9.split(separador,1); //devuelve el precio en objeto al revez
            var comision_r=comision_v_r[0];//obtiene el precio del objeto [0] al revez
            var comision_v =reverseString(comision_v_r[0]);//convierte el precio al revez a la normalidad

            var campos_num = document.getElementsByClassName("total").length;

            console.log(comision_v);

            document.getElementById(`comision0`).value = comision_v;

            if(campos_num!=1){
                for(var i=2;i<=campos_num;i++){
                    document.getElementById(`comision${i}`).value = comision_v;
                }
            }
            multi(0);
            if(campos_num!=1){
                for(var i=2;i<=campos_num;i++){
                    multi(i);
                }
            }


        }

        function multi(a){


            var total = 1;
            var totales=0;
            var change= false; //
            $(`.monto${a}`).each(function(){
                if (!isNaN(parseFloat($(this).val()))) {
                    change= true;

                    total *= parseFloat($(this).val());
                }
            });
            total = (change)? total:0;

            // Get the checkbox
            var checkBox = document.getElementById(`check${a}`);
            var cantidad = document.querySelector(`#cantidad${a}`).value;
            var promedio_origina_descuento1=document.querySelector(`#precio_unitario_descuento${a}`).value;
            var promedio_original2=document.querySelector(`#promedio_original${a}`).value;

            if (checkBox.checked == true){
                var descuento = document.querySelector(`#descuento${a}`).value;
                var precio = document.querySelector(`#precio${a}`).value;
                var promedio_original=document.querySelector(`#promedio_original${a}`).value;
                var comision_porcentaje=document.querySelector(`#comision${a}`).value;
                var multiplier = 100;
                var precio_uni=precio-(promedio_original*descuento/100);
                var precio_uni_dec=Math.round(precio_uni * multiplier) / multiplier;

                document.getElementById(`check_descuento${a}`).value = descuento;
                document.getElementById(`precio_unitario_descuento${a}`).value = precio_uni_dec;

                var comisiones9=precio_uni_dec+(promedio_original*comision_porcentaje/100);
                var comisiones=Math.round(comisiones9*multiplier)/multiplier;
                document.getElementById(`precio_unitario_comision${a}`).value = comisiones;

                var final=comisiones*cantidad;
                var final_decimal = Math.round(final * multiplier) / multiplier;
                console.log(final_decimal);
                document.getElementById(`total${a}`).value = final_decimal;
            } else {
                var multiplier = 100;
                var descuento = 0;
                var precio = document.querySelector(`#precio${a}`).value;
                var comision_porcentaje=document.querySelector(`#comision${a}`).value;
                var final= cantidad*precio;
                var end9=parseFloat(precio)+(parseFloat(promedio_original2)*parseInt(comision_porcentaje)/100);

                var end =Math.round(end9 * multiplier) / multiplier;
                var final2=cantidad*end;
                var final_decimal = Math.round(final2 * multiplier) / multiplier;

                console.log("la promedio_origina_descuento1 es:"+  promedio_origina_descuento1);
                console.log("la comision procentaje es:"+  comision_porcentaje);
                console.log("la promedio_original2 procentaje es:"+   promedio_original2);
                console.log("la end es:"+  end);

                document.getElementById(`check_descuento${a}`).value = 0;
                document.getElementById(`total${a}`).value = final_decimal;
                document.getElementById(`precio_unitario_descuento${a}`).value = precio;
                document.getElementById(`precio_unitario_comision${a}`).value = end;
            }

            var totalInp = $('[name="total"]');
            var total_t = 0;

            totalInp.each(function(){
                total_t += parseFloat($(this).val());
            });

            var multiplier2 = 100;
            var total_tt = Math.round(total_t * multiplier2) / multiplier2;

            $('#sub_total').val(total_tt);

            var igv_valor={{$igv->renta}};
            var subtotal = document.querySelector(`#sub_total`).value;
            var igv=subtotal*igv_valor/100;

            var igv_decimal = Math.round(igv * multiplier2) / multiplier2;
            var end=igv_decimal+parseFloat(subtotal);

            var end2 = Math.round(end * multiplier2) / multiplier2;

            document.getElementById("igv").value = igv_decimal;
            document.getElementById("total_final").value = end2;

        }
    </script>

    <script>
        function reverseString(str) {
            return str.split("").reverse().join("");;
        }

        function calcular(input,a)
        {
            var id = input.id;
            var caracteres = input.value;
            var caracteres_reverse=reverseString(caracteres);
            var cadena=input.value;
            var separador=" ";
            var seprador_total= " / ";
            var id=cadena.split(separador,1);
            //revirtiendo la cadena
            var reverse=reverseString(caracteres);//devuelve toda la cadena articulo al reves
            //para precio
            var precio_v_r=reverse.split(separador,1); //devuelve el precio en objeto al revez
            var precio_r=precio_v_r[0];//obtiene el precio del objeto [0] al revez
            var precio_v =reverseString(precio_v_r[0]);//convierte el precio al revez a la normalidad

            var caracteres_space=caracteres_reverse.replace(precio_r,"");//obtiene la cadena articulo sin precio,pero con un espacio en blanco
            var reverse2=caracteres_space.slice(1);//elimina el espacion en blanco de la cadena articulo sin precio
            //para descuento
            var descuento_v_r=reverse2.split(separador,1);////obtiene el descuento del objeto [0] al revez
            var descuento_r=descuento_v_r[0];//obtiene el descuento del objeto [0] al revez
            var descuento_v =reverseString(descuento_v_r[0]);//convierte el descuento al revez a la normalidad

            var caracteres_space_2=reverse2.replace(descuento_r,"");//obtiene la cadena articulo sin precio,descuento,con un espacio en blanco
            var reverse3=caracteres_space_2.slice(1);//elimina el espacion en blanco de la cadena articulo sin precio
            //para stock
            var stock_v_r=reverse3.split(separador,1);
            var stock_r=stock_v_r[0];
            var stock_v =reverseString(stock_v_r[0]);

            var caracteres_space_3=reverse3.replace(stock_r,"");//obtiene la cadena articulo sin precio,descuento,con un espacio en blanco
            var reverse4=caracteres_space_3.slice(1);//elimina el espacion en blanco de la cadena articulo sin precio
            //para promedio_original
            var prom_v_r=reverse4.split(separador,1);
            var prom_r=prom_v_r[0];
            var prom_v =reverseString(prom_v_r[0]);

            console.log("el promedio original es: "+prom_v);
            console.log("el strock es: "+stock_v+"-------------")

            document.getElementById(`precio${a}`).value = precio_v;
            document.getElementById(`cantidad${a}`).value = 1;
            document.getElementById(`precio_unitario_descuento${a}`).value = precio_v;
            document.getElementById(`promedio_original${a}`).value = prom_v;
            document.getElementById(`stock${a}`).value = stock_v;
            document.getElementById(`descuento${a}`).value = descuento_v;
            document.getElementById(`check_descuento${a}`).value =0;

            //comision
            var comision=document.querySelector(`#comisionista`).value;
            //revirtiendo la cadena
            var reverse9=reverseString(comision);//devuelve toda la cadena articulo al reves
            //para comision
            var comision_v_r=reverse9.split(separador,1); //devuelve el precio en objeto al revez
            var comision_r=comision_v_r[0];//obtiene el precio del objeto [0] al revez
            var comision_v =reverseString(comision_v_r[0]);//convierte el precio al revez a la normalidad
            // console.log(comision_v);
            if(comision){
                document.getElementById(`comision${a}`).value = comision_v;
            }else{
                document.getElementById(`comision${a}`).value = 0;
            }


        }
    </script>

    <script>
        $(".delete").on('click', function () {
            $('.case:checkbox:checked').parents("tr").remove();
            var totalInp = $('[name="total"]');
            var total_t = 0;

            totalInp.each(function(){
                total_t += parseFloat($(this).val());
            });
            $('#sub_total').val(total_t);

            var igv_valor={{$igv->renta}};
            var subtotal = document.querySelector(`#sub_total`).value;
            var igv=parseFloat(subtotal)*igv_valor/100;
            var end=parseFloat(igv)+parseFloat(subtotal);

            // console.log(typeof igv);
            // console.log(typeof end);
            document.getElementById("igv").value = igv;
            document.getElementById("total_final").value = end;
        });
    </script>

    <script>
        function select_all() {
            $('input[class=case]:checkbox').each(function () {
                if ($('input[class=check_all]:checkbox:checked').length == 0) {
                    $(this).prop("checked", false);
                } else {
                    $(this).prop("checked", true);
                }
            });
        }
    </script>

    <script src="{{ asset('js/plugins/iCheck/icheck.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
    <style type="text/css">
        .a{color: red}
    </style>

    @elseif($categoria=='servicio')
    <script>
        var i = 2;
        $(".addmores").on('click', function () {
            var data = `[
            <tr>
            <td>
            <input type='checkbox' class='case'/>
            </td>";
            <td>
            <input list="browsers" class="form-control " name="articulo[]" required id='articulo${i}' onkeyup="calcular(this,${i});multi(${i})" onclick="Clear(this);" autocomplete="off" >
            <datalist id="browsers" >
            @foreach($servicios as $index => $servicio)
            <option value="{{$servicio->id}} | {{$servicio->codigo_servicio}} | {{$servicio->codigo_original}} | {{$servicio->nombre}} / &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 0 0 {{$servicio->descuento}} {{$array[$index]}}">
            @endforeach
            </datalist>
            </td>



            <td>
            <input type='text' id='precio${i}' name='precio[]' readonly="readonly" class="monto${i} form-control" onkeyup="multi(${i})" required  autocomplete="off"/>
            </td>

            <td>
            {{-- <input type='text' id='descuento0' name='descuento[]' readonly="readonly" class="monto0 form-control" required  autocomplete="off" /> --}}
            <div style="position: relative; " > <input class="text_des"type='text' id='descuento${i}' name='descuento[]' readonly="readonly" class="" required  autocomplete="off"/>
            </div>
            <div class="div_check" >
            <input class="check"  type='checkbox' id='check${i}' name='check[]' onclick="multi(${i})" style="" autocomplete="off"/>
            </div>
            </td>

            <td>
            <input type='text' id='descuento_unitario${i}' name='descuento_unitario[]' readonly="readonly" class="descuento_unitario${i} form-control"  required  autocomplete="off" />
            </td>



            <td>
            <input type='text' id='comision${i}' name='comision[]' readonly="readonly" class="form-control"  required  autocomplete="off" />
            </td>

            <td>
            <input type='text' id='total${i}' name='total' disabled="disabled" class="total form-control "  required  autocomplete="off"/>
            </td>

            </tr>`;
            $('.tablese').append(data);
            i++;
        });
    </script>

    <script>
        function print(){
            var print_input=1;
            document.getElementById("prints").value = print_input;
            var estado = document.querySelector("#prints").value;
            // console.log(estado);
        }

        function comision(){

            //comision
            var comision=document.querySelector(`#comisionista`).value;
            var separador=" ";
            //revirtiendo la cadena
            var reverse9=reverseString(comision);//devuelve toda la cadena articulo al reves
            //para comision
            var comision_v_r=reverse9.split(separador,1); //devuelve el precio en objeto al revez
            var comision_r=comision_v_r[0];//obtiene el precio del objeto [0] al revez
            var comision_v =reverseString(comision_v_r[0]);//convierte el precio al revez a la normalidad

            var campos_num = document.getElementsByClassName("total").length;

            // console.log(comision_v);

            document.getElementById(`comision0`).value = comision_v;

            if(campos_num!=1){
                for(var i=2;i<=campos_num;i++){
                    document.getElementById(`comision${i}`).value = comision_v;
                }
            }
            multi(0);
            if(campos_num!=1){
                for(var i=2;i<=campos_num;i++){
                    multi(i);
                }
            }


        }

        function multi(a){


            var total = 1;
            var totales=0;
            var change= false; //
            $(`.monto${a}`).each(function(){
                if (!isNaN(parseFloat($(this).val()))) {
                    change= true;

                    total *= parseFloat($(this).val());
                }
            });
            total = (change)? total:0;

            var precio = document.querySelector(`#precio${a}`).value;
            var comision=document.querySelector(`#comision${a}`).value;
            var descuento=document.querySelector(`#descuento${a}`).value;
            var checkBox = document.getElementById(`check${a}`);

            var multiplier = 100;
            // console.log(checkBox.checked);

            if (checkBox.checked == true){
                precio=precio-(precio*descuento/100);
                document.getElementById(`descuento_unitario${a}`).value = precio;
                var descuento_p=precio*comision/100;
                var precio_final=parseFloat(descuento_p)+parseFloat(precio) ;
                var precio_final_redondeado=Math.round(precio_final * multiplier) / multiplier;
                document.getElementById(`total${a}`).value = precio_final_redondeado;
            }else{
                document.getElementById(`descuento_unitario${a}`).value = precio;
                var descuento_p=precio*comision/100;
                var precio_final=parseFloat(descuento_p)+parseFloat(precio) ;
                console.log(descuento_p);
                var precio_final_redondeado=Math.round(precio_final * multiplier) / multiplier;
                document.getElementById(`total${a}`).value = precio_final_redondeado;
            }



            var totalInp = $('[name="total"]');
            var total_t = 0;

            totalInp.each(function(){
                total_t += parseFloat($(this).val());
            });

            var multiplier2 = 100;
            var total_tt = Math.round(total_t * multiplier2) / multiplier2;

            $('#sub_total').val(total_tt);

            var igv_valor={{$igv->renta}};
            var subtotal = document.querySelector(`#sub_total`).value;
            var igv=subtotal*igv_valor/100;

            var igv_decimal = Math.round(igv * multiplier2) / multiplier2;
            var end=igv_decimal+parseFloat(subtotal);

            var end2 = Math.round(end * multiplier2) / multiplier2;

            document.getElementById("igv").value = igv_decimal;
            document.getElementById("total_final").value = end2;

        }
    </script>

    <script>
        function reverseString(str) {
            return str.split("").reverse().join("");;
        }

        function calcular(input,a)
        {
            var id = input.id;
            var caracteres = input.value;
            var caracteres_reverse=reverseString(caracteres);
            var cadena=input.value;
            var separador=" ";
            var seprador_total= " / ";
            var id=cadena.split(separador,1);
            //revirtiendo la cadena
            var reverse=reverseString(caracteres);//devuelve toda la cadena articulo al reves
            //para precio
            var precio_v_r=reverse.split(separador,1); //devuelve el precio en objeto al revez
            var precio_r=precio_v_r[0];//obtiene el precio del objeto [0] al revez
            var precio_v =reverseString(precio_v_r[0]);//convierte el precio al revez a la normalidad

            var caracteres_space=caracteres_reverse.replace(precio_r,"");//obtiene la cadena articulo sin precio,pero con un espacio en blanco
            var reverse2=caracteres_space.slice(1);//elimina el espacion en blanco de la cadena articulo sin precio
            //para descuento
            var descuento_v_r=reverse2.split(separador,1);////obtiene el descuento del objeto [0] al revez
            var descuento_r=descuento_v_r[0];//obtiene el descuento del objeto [0] al revez
            var descuento_v =reverseString(descuento_v_r[0]);//convierte el descuento al revez a la normalidad

            document.getElementById(`precio${a}`).value = precio_v;
            document.getElementById(`descuento${a}`).value = descuento_v;
            //comision
            var comision=document.querySelector(`#comisionista`).value;
            //revirtiendo la cadena
            var reverse9=reverseString(comision);//devuelve toda la cadena articulo al reves
            //para comision
            var comision_v_r=reverse9.split(separador,1); //devuelve el precio en objeto al revez
            var comision_r=comision_v_r[0];//obtiene el precio del objeto [0] al revez
            var comision_v =reverseString(comision_v_r[0]);//convierte el precio al revez a la normalidad
            // console.log(comision_v);
            if(comision){
                document.getElementById(`comision${a}`).value = comision_v;
            }else{
                document.getElementById(`comision${a}`).value = 0;
            }


        }
    </script>

    <script>
        $(".delete").on('click', function () {
            $('.case:checkbox:checked').parents("tr").remove();
            var totalInp = $('[name="total"]');
            var total_t = 0;

            totalInp.each(function(){
                total_t += parseFloat($(this).val());
            });
            $('#sub_total').val(total_t);

            var igv_valor={{$igv->renta}};
            var subtotal = document.querySelector(`#sub_total`).value;
            var igv=parseFloat(subtotal)*igv_valor/100;
            var end=parseFloat(igv)+parseFloat(subtotal);

            // console.log(typeof igv);
            // console.log(typeof end);
            document.getElementById("igv").value = igv;
            document.getElementById("total_final").value = end;
        });
    </script>

    <script>
        function select_all() {
            $('input[class=case]:checkbox').each(function () {
                if ($('input[class=check_all]:checkbox:checked').length == 0) {
                    $(this).prop("checked", false);
                } else {
                    $(this).prop("checked", true);
                }
            });
        }

        function Clear(elem)
        {
            elem.value='';
        }
    </script>

    <script src="{{ asset('js/plugins/iCheck/icheck.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
    <style type="text/css">
        .a{color: red}
    </style>


    @endif

    @stop
