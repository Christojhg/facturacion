@extends('layout')

@section('title', 'Personal')
@section('breadcrumb', 'Personal-Editar')
@section('breadcrumb2', 'Personal-Editar')
@section('href_accion', route('personal.index') )
@section('value_accion', 'Atras')

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
            <div class="ibox">
				<div class="ibox-title">
                    <h5>Datos Personales</h5>
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
					<form action="{{ route('personal-datos-laborales.update',$personales->id) }}"  enctype="multipart/form-data" method="post">
					 	@csrf
					 	@method('PATCH')

					 	<div class="form-group  row"><label class="col-sm-2 col-form-label">Numero de Documentacion:</label>
		                     <div class="col-sm-10"><input type="text" class="form-control" name="id_personal" value="{{$personales->id_personal}}" readonly></div>
		                </div>

					 	<div class="form-group  row"><label class="col-sm-2 col-form-label">Fecha de vinculacion:</label>
		                     <div class="col-sm-10"><input type="date" class="form-control" name="fecha_vinculacion" value="{{$personales->fecha_vinculacion}}"></div>
		                </div>

				        <div class="form-group  row"><label class="col-sm-2 col-form-label">Fecha de retiro:</label>
		                     <div class="col-sm-10"><input type="date" class="form-control" name="fecha_retiro" value="{{$personales->fecha_retiro}}"></div>
		                </div>

		                <div class="form-group  row"><label class="col-sm-2 col-form-label">Forma de pago:</label>
		                     <div class="col-sm-10"><input type="text" class="form-control" name="forma_pago" value="{{$personales->forma_pago}}"></div>
		                </div>

		                <div class="form-group  row"><label class="col-sm-2 col-form-label">Salario:</label>
		                     <div class="col-sm-10"><input type="text" class="form-control" name="salario" value="{{$personales->salario}}"></div>
		                </div>

		                <div class="form-group  row"><label class="col-sm-2 col-form-label">Categoria Ocupacional:</label>
		                     <div class="col-sm-10"><input type="text" class="form-control" name="categoria_ocupacional" value="{{$personales->categoria_ocupacional}}"></div>
		                </div>

		                <div class="form-group  row"><label class="col-sm-2 col-form-label">Estado Trabajador:</label>
		                     <div class="col-sm-10"><input type="text" class="form-control" name="estado_trabajador" value="{{$personales->estado_trabajador}}"></div>
		                </div>

		                <div class="form-group  row"><label class="col-sm-2 col-form-label">Sede:</label>
		                     <div class="col-sm-10"><input type="text" class="form-control" name="sede" value="{{$personales->sede}}"></div>
		                </div>

		                <div class="form-group  row"><label class="col-sm-2 col-form-label">Turno:</label>
		                     <div class="col-sm-10"><input type="text" class="form-control" name="turno" value="{{$personales->turno}}"></div>
		                </div>

		                <div class="form-group  row"><label class="col-sm-2 col-form-label">Dpto Area:</label>
		                     <div class="col-sm-10"><input type="text" class="form-control" name="departamento_area" value="{{$personales->departamento_area}}"></div>
		                </div>

		                <div class="form-group  row"><label class="col-sm-2 col-form-label">Cargo:</label>
		                     <div class="col-sm-10"><input type="text" class="form-control" name="cargo" value="{{$personales->cargo}}"></div>
		                </div>

		                <div class="form-group  row"><label class="col-sm-2 col-form-label">Tipo de trabajador:</label>
		                     <div class="col-sm-10"><input type="text" class="form-control" name="tipo_trabajador" value="{{$personales->tipo_trabajador}}"></div>
		                </div>

		                <div class="form-group  row"><label class="col-sm-2 col-form-label">Tipo de contrato:</label>
		                     <div class="col-sm-10"><input type="text" class="form-control" name="tipo_contrato" value="{{$personales->tipo_contrato}}"></div>
		                </div>

		                <div class="form-group  row"><label class="col-sm-2 col-form-label">Regimen Pensionario:</label>
		                     <div class="col-sm-10"><input type="text" class="form-control" name="regimen_pensionario" value="{{$personales->regimen_pensionario}}"></div>
		                </div>

		                <div class="form-group  row"><label class="col-sm-2 col-form-label">Afiliacion Salud:</label>
		                     <div class="col-sm-10"><input type="text" class="form-control" name="afiliacion_salud" value="{{$personales->afiliacion_salud}}"></div>
		                </div>

		                <div class="form-group  row"><label class="col-sm-2 col-form-label">Banco Renumeracion:</label>
		                     <div class="col-sm-10"><input type="text" class="form-control" name="banco_renumeracion" value="{{$personales->banco_renumeracion}}"></div>
		                </div>

		               <div class="form-group  row"><label class="col-sm-2 col-form-label">Nr de cuenta:</label>
		                     <div class="col-sm-10"><input type="text" class="form-control" name="numero_cuenta" value="{{$personales->numero_cuenta}}"></div>
		                </div>

		                <div class="form-group  row"><label class="col-sm-2 col-form-label">Notas:</label>
		                     <div class="col-sm-10"><input type="text" class="form-control" name="notas" value="{{$personales->notas}}"></div>
		                </div>

				    	<button class="btn btn-primary" type="submit">Guardar</button>

					</form>

				</div>
			</div>
		</div>

	</div>
</div>
	<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('js/inspinia.js') }}"></script>
    <script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>
@stop