@extends('layout')

@section('title', 'Cotizacion Servicio')
@section('breadcrumb', 'Cotizacion Servicio')
@section('breadcrumb2', 'cotizacion_servicio')
@section('href_accion', route('cotizacion_servicio.create_factura'))
@section('value_accion', 'Agregar')
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Creacion de cotizacion</h5>
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
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ruc/DNI</th>
                                    <th>Cliente</sth>
                                    <th>N° Cotizacion</th>
                                    <th>Fecha</th>
                                    <th>Ver</th>
                                    <th>Estado</th>
                                    <th>Creado por</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @foreach($cotizaciones_servicios as $cotizacion_servicio)
                                    <tr class="gradeX">
                                      <td>{{$cotizacion_servicio->id}}</td>
                                      <td>{{$cotizacion_servicio->cliente->numero_documento}}</td>
                                      <td>{{$cotizacion_servicio->cliente->nombre}}</td>
                                      <td>{{$cotizacion_servicio->cod_comision}}</td>
                                      <td>{{$cotizacion_servicio->created_at}}</td>
                                      <td><center><a href="{{route('cotizacion_servicio.show',$cotizacion_servicio->id)}}"><button type="button" class="btn btn-w-m btn-primary">VER</button></a></center></td>
                                      <td>
                                            @if($cotizacion_servicio->estado =='0')
                                              <button type="button" class="btn btn-w-m btn-info">En Proceso</button>
                                            @else
                                              <button type="button" class="btn btn-w-m btn-default">Procesado</button>
                                            @endif
                                      </td>
                                      <td>
                                        @if($cotizacion_servicio->user_personal->personal->nombres==auth()->user()->personal->nombres)
                                            Creado por usted
                                        @else
                                           Creado por  {{$cotizacion_servicio->user_personal->personal->nombres}}
                                        @endif
                                      </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                   </div>
               </div>
           </div>
       </div>
   </div>






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

   <!-- Page-Level Scripts -->
   <script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
            { extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},

            {extend: 'print',
            customize: function (win){
                $(win.document.body).addClass('white-bg');
                $(win.document.body).css('font-size', '10px');

                $(win.document.body).find('table')
                .addClass('compact')
                .css('font-size', 'inherit');
            }
        }
        ]

    });

    });

</script>
@endsection
