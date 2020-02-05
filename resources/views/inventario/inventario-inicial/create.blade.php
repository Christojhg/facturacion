@extends('layout')

@section('title', 'Inventario Inicial')
@section('breadcrumb', 'Inventario Inicial')
@section('breadcrumb2', 'Inventario Inicial')
@section('href_accion', route('inventario-inicial.index'))
@section('value_accion', 'atras')

@section('content')


@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
            <div class="ibox">
				<div class="ibox-title">
                    <h5>Nuevo</h5>
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
					<form action="{{ route('inventario-inicial.store') }}"  enctype="multipart/form-data" method="post">
					 	@csrf
					 	<div class="form-group  row">
                            <label class="col-sm-2 col-form-label">Motivos :</label>
		                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="NN" value="Inventario Inicial" disabled>
                            </div>
                        </div>

                        {{-- Datos pasados de almacen y clasificacion --}}
                        <input type="hidden" name="motivo" value="4" >
                        <input type="hidden" name="almacen" value="{{$almacen}}">
                        <input type="hidden" name="clasificacion" value="{{$clasificacion}}">

                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">Provedor:</label>
		                    <div class="col-sm-10">
                                <select class="form-control" name='provedor' required>
									@foreach($provedores as $provedor)
									<option value="{{$provedor->id}}">{{$provedor->empresa}}</option>
									@endforeach
								</select>
                            </div>
						</div>

		                <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">Informaciones:</label>
		                    <div class="col-sm-10">
                                <input type="text" class="form-control" name="informacion">
                            </div>
						</div>

						<table 	 cellspacing="0" class="table table-striped table-responsive">
							<thead>
							<tr>
								<th><input class='check_all' type='checkbox' onclick="select_all()" /></th>
								<th>---- Codigo ------ articulo</th>

								<th>Cantidad</th>
								<th>Precio</th>
								<th>Total</th>
							</tr>
						</thead>
								<tbody>
							<tr>
								<td><input type='checkbox' class="case"></td>
								<td>
								<select class="form-control" id='articulo' name='articulo[]' required>
									@foreach($productos as $producto)
									<option value="{{$producto->id}}">{{$producto->codigo_producto}} -> {{$producto->nombre}}</option>
									@endforeach
								</select>
								</td>

								<td><input type='text' id='cantidad' name='cantidad[]' class="monto0 form-control"   onkeyup="multi(0);"  required/></td>
								<td><input type='text' id='precio' name='precio[]' class="monto0 form-control" onkeyup="multi(0);" required/></td>
								<td><input type='text' id='total0' name='total[]' class="form-control" required/></td>
								<span id="spTotal"></span>
							</tr>
						</tbody>
						</table>


						<button type="button" class='delete btn btn-danger'  > Eliminar </button>
						<button type="button" class='addmore btn btn-success' > Agregar </button>

						<button class="btn btn-primary" type="submit">Guardar</button>

					</form>
<tr>
	<style type="text/css">
	.form-control{
		    border-radius: 5px;
	}
	</style>

	{{-- <style type="text/css">
		#boton_personalizado_eliminar{
			text-decoration: none;
			padding: 5px;
			font-weight: 600;
			font-size: 13px;
			color: #ffffff;
			background-color: #1883ba;
			border-radius: 6px;
			border: 2px solid #0016b0;
		}
		#boton_personalizado_eliminar:hover{
			color: #1883ba;
			background-color: #ffffff;
		}

		#boton_personalizado_agregar{
			text-decoration: none;
			padding: 5px;
			font-weight: 600;
			font-size: 13px;
			color: #ffffff;
			background-color: #CD5C5C;
			border-radius: 6px;
			border: 2px solid #F11616;
		}
		#boton_personalizado_agregar:hover{
			color: #CD5C5C;
			background-color: #ffffff;
		}
	  </style> --}}
    {{-- <td>
    <label>
      <input type="text" name="Precio" id="Precio" value="" class="monto" onkeyup="multi();">
    </label>
  </td>
    <td>
    <label>
      <input type="text" name="Cantidad" id="Cantidad" class="monto" onkeyup="multi();">
    </label>
  </td> --}}
  <td>
    {{-- <label id="Costo"> --}}
      {{-- <input type="text" name="Costo" id="Costo"> --}}
    {{-- </label> --}}
  </td>
</tr>


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

    <script src="{{ asset('js/inspinia.js') }}"></script>
	<script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>

<script>
// function multi(){
//     var total = 1;
//     var change= false; //
//     $(".monto").each(function(){
//         if (!isNaN(parseFloat($(this).val()))) {
//             change= true;
//             total *= parseFloat($(this).val());
//         }
//     });
//     total = (change)? total:0;
//     document.getElementById('Costo').innerHTML = total;
// }
</script>

    <script>
        var i = 2;
        $(".addmore").on('click', function () {
            var data = `[<tr><td><input type='checkbox' class='case'/></td>";
             <td>
			<select class="form-control" id='articulo' name='articulo[]' required>
									@foreach($productos as $producto)
									<option value="{{$producto->id}}">{{$producto->codigo_producto}} --- {{$producto->nombre}}</option>
									@endforeach
								</select>
			</td>

			<td><input type='text' id='cantidad" + i + "' name='cantidad[]' class="monto${i} form-control" onkeyup="multi(${i});" required/></td>
			<td><input type='text' id='precio" + i + "' name='precio[]' class="monto${i} form-control"  onkeyup="multi(${i});" required/></td>
			<td><input type='text' id='total${i}' name='total[]' class="form-control" required/></td>
			</tr>`;
            $('table').append(data);
            i++;
        });
	</script>

<script>function multi(a){
	console.log(a);
	var total = 1;
	var change= false; //
	$(`.monto${a}`).each(function(){
		if (!isNaN(parseFloat($(this).val()))) {
			change= true;
			total *= parseFloat($(this).val());
		}
	});
	total = (change)? total:0;
	document.getElementById(`total${a}`).value = total;
}
</script>

    <script>
        $(".delete").on('click', function () {
            $('.case:checkbox:checked').parents("tr").remove();

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
@endsection
