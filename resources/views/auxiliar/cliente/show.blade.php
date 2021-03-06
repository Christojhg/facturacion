@extends('layout')

@section('title', 'cliente ver')
@section('breadcrumb', 'cliente ver')
@section('breadcrumb2', 'cliente ver')
@section('href_accion', route('cliente.index'))
@section('value_accion', 'atras')

@section('content')

<div style="padding-top: 20px;padding-bottom: 50px">
<div class="container" style=" padding-top: 30px; background: white;">
      <div class="jumbotron" style="height: 50px;padding:10px">
       <center><h1>{{$cliente_show->nombre}}</h1> </center>
      </div>

  <i  class="fa fa-user-o" aria-hidden="true" style="font-size: 35px"></i>&nbsp;&nbsp;
  <a  class="btn btn-success" href="{{ route('cliente.edit', $cliente_show->id) }}" role="button"> <i class="fa fa-edit"></i></a>
  <br><br>
      <div class="row marketing">

        <div class="col-lg-12">

          <div class="row">
            <div class="col-lg-4">
              <h4>Nombre:</h4>
               <p>{{$cliente_show->nombre}}</p>
            </div>
            <div class="col-lg-4">
              <h4>Direccion:</h4>
               <p>{{$cliente_show->direccion}}</p>
            </div>
            <div class="col-lg-4">
              <h4>Email:</h4>
          <p>{{$cliente_show->email}}</p>
            </div>
          </div><hr>

          <div class="row">
            <div class="col-lg-4">
              <h4>Pais:</h4>
          <p>{{$cliente_show->pais}}</p>
            </div>
            <div class="col-lg-4">
              <h4>Departamento:</h4>
          <p>{{$cliente_show->departamento}}</p>
            </div>
            <div class="col-lg-4">
              <h4>Ciudad:</h4>
          <p>{{$cliente_show->ciudad}}</p>
            </div>
          </div><hr>

          <div class="row">
            <div class="col-lg-4">
              <h4>Codigo Postal:</h4>
          <p>{{$cliente_show->cod_postal}}</p>
            </div>
            <div class="col-lg-4">
             <h4>Telefono:</h4>
          <p>{{$cliente_show->numero_documento}}</p>
            </div>
            <div class="col-lg-4">
              <h4>Celular:</h4>
          <p>{{$cliente_show->celular}}</p>
            </div>

          </div><hr>

          <div class="row">
            <div class="col-lg-4">
              <h4>Documento De Identifiacion:</h4>
          <p>{{$cliente_show->documento_identificacion}}</p>
            </div>
            <div class="col-lg-4">
             <h4>Numero Documento:</h4>
          <p>{{$cliente_show->numero_documento}}</p>
            </div>
            <div class="col-lg-4">
              <h4>Tipo de Cliente:</h4>
          <p>{{$cliente_show->tipo_cliente}}</p>
            </div>

          </div><hr>

          <div class="row">
            <div class="col-lg-4">
              <h4>Fecha de Aniversario:</h4>
          <p>{{$cliente_show->aniversario}}</p>
            </div>
            <div class="col-lg-4">
             <h4>Fecha de Registro:</h4>
          <p>{{$cliente_show->fecha_registro}}</p>
            </div>
            <!-- <div class="col-lg-4">
              <h4>Tipo de Cliente:</h4>
          <p>{{$cliente_show->tipo_cliente}}</p>
            </div> -->

          </div><hr>


        </div>

    </div>

{{--Contacto  --}}
<p aling='rigth'><a class="btn btn-primary" href="{{ route('contacto.crear',$cliente_show->id) }}"> Agregar Contacto</a></p>

    <div style="padding-bottom: 10px">
    @foreach($contacto_show as $contacto)
    <table>
      <tr>
        <th><i  style="font-size: 35px" class="fa fa-address-book-o" aria-hidden="true"></i></th>
        </tr>
        <tr>
        <th>
          <a  class="btn btn-success" href="{{ route('contacto.editar', $contacto->id) }}" role="button"> <i class="fa fa-edit"></i></a>
        </th>
        <th>
         @if($contacto->primer_contacto==1)

             {{-- <button class="btn btn-s-m btn-info"></button>   --}}
              @else
              <form action="{{ route('contacto.destroy', $contacto->id)}}" method="POST">
                @csrf
             @method('delete')
             <input type="text" style=" width: 0px" hidden="hidden" name="id_cli" value="{{$contacto->clientes_id}}">
                <button type="submit" class="btn btn-s-m btn-danger"><i class="fa fa-trash-o"></i></button>
               </form>
               <th>{{-- <button type="" class="btn btn-s-m btn-info"></button> --}}
                <a data-toggle="modal" class="btn btn-s-m btn-info" href="#modal-form"><i class="fa fa-star"></i></a></th>
       @endif
       </th>
      </tr>
    </table>

    <div class="row marketing">
    	<div class="col-lg-6">
    	  <h4>Nombre del Contacto:</h4>
          <p>{{$contacto->nombre}}</p><hr>
    	  <h4>Cargo:</h4>
          <p>{{$contacto->cargo}}</p><hr>
    	</div>
    	<div class="col-lg-6">
    	  <h4>Telefono/Celular:</h4>
          <p>{{$contacto->telefono}} / {{$contacto->celular}}</p><hr>
    	  <h4>Email:</h4>
          <p>{{$contacto->email}}</p><hr>
    	</div>


    </div>
    @endforeach
    </div>

</div>
</div>
{{-- Modal Contacto Principal --}}

                            <div id="modal-form" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog" style="margin-top: 12%">
                                    <div class="modal-content">
                                        <div class="modal-body">

                                             <div class="ibox-content float-e-margins">

                                               <h3 class="font-bold col-lg-12" align="center">
                                              ¿Esta Seguro que Deseas Cambiar como "Contacto Principal"?
                                               </h3>
                                               <p align="center">
                                                   <a class="btn btn-w-m btn-primary" href="">Aceptar</a>
                                                   {{-- <a class="btn btn-w-m btn-danger"  href="">Cancelar</a> --}}
                                                   <button type="button" class="btn btn-w-m btn-danger" data-dismiss="modal">Cancelar</button>

                                               </p>
                                              </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
{{-- Fin Modal Contacto Principal --}}


<!-- Mainly scripts -->
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Custom and plugin javascript -->
<script src="{{ asset('js/inspinia.js') }}"></script>
<script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>

@endsection