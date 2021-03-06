@extends('layout')

@section('title', 'Usuario')
@section('breadcrumb', 'Usuario')
@section('breadcrumb2', 'Usuario')
@section('href_accion', route('usuario.lista'))
@section('value_accion', 'Agregar')

@section('content')
		<div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Usuarios</h5>
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
                                                <th>Personal</th>
                                                <th>Nombre</th>
                                                <th>Correo</th>
                                                <th>Permisos</th>
                                                <th>Editar</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        @foreach($usuarios as $usuario)
                                            <tr class="gradeX">
                                                <td>{{$usuario->id}}</td>
                                                <td>{{$usuario->personal->nombres}}</td>
                                                <td>{{$usuario->name}}</td>
                                                <td>{{$usuario->email}}</td>
                                                @if($usuario->estado == 1)
                                                <td>
                                                    <center><a href="{{ route('usuario.permiso', $usuario->id) }}" ><button type="button" class="btn btn-s-m btn-info">Permisos</button></a></center>
                                                </td>
                                                <td>
                                                    <center><a href="{{ route('usuario.edit', $usuario->id) }}" ><button type="button" class="btn btn-s-m btn-success">Editar</button></a></center></td>
                                                <td>
                                                    <center>
                                                            <form action="{{ route('usuario.desactivar', $usuario->id)}}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-s-m btn-danger">Desactivar</button>
                                                            </form>

                                                    </center>
                                                </td>
                                                @else
                                                <td>
                                                    <center><a><button type="button" class="btn btn-s-m btn-secondary">Permisos</button></a></center>
                                                </td>
                                                <td>
                                                    <center><a><button type="button" class="btn btn-s-m btn-secondary">Editar</button></a></center></td>
                                                <td>
                                                    <center>
                                                        <form action="{{ route('usuario.activar', $usuario->id)}}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-s-m btn-warning">Activar</button>
                                                        </form>
                                                    </center>
                                                </td>
                                                @endif
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