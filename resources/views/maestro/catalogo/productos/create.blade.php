@extends('layout')

@section('title', 'Productos')
@section('breadcrumb', 'Productos-Agregar')
@section('breadcrumb2', 'Productos-Agregar')
@section('href_accion', route('productos.index') )
@section('value_accion', 'Atras')

@section('content')

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


<div class="ibox-content" style="margin-top: 5px;margin-bottom:50px" align="center">
	
   <form action="{{ route('productos.store') }}"  enctype="multipart/form-data" method="post">
					 	@csrf
	 <div class="row">
            
        <fieldset class="col-sm-6">    	
					<legend>Clasificacion del <br>Producto</legend>
					
				<div class="panel panel-default">
					<div class="panel-body" align="left">
						<div class="row">
							<!-- <label class="col-sm-2 col-form-label">Codigo:</label>
							<div class="col-sm-4"><input type="text" class="form-control" name="codigo_producto" >
                    		</div> -->

                    		<label class="col-sm-2 col-form-label">Codigo Alernativo:</label>
                              <div class="col-sm-4"><input type="text" class="form-control" name="codigo_original" required="required"></div>

                              <label class="col-sm-2 col-form-label">Categoria:</label>
                               <div class="col-sm-4">
                                			<select class="form-control m-b" name="categoria_id" required="required">
			          						{{-- <option>Seleccione una Categoria</option> --}}
			          						@foreach($categorias as $categoria)
					    					<option value="{{ $categoria->id }}">{{ $categoria->descripcion}}</option>
					    					@endforeach
					    					</select>
					    		</div>
							</div>


						<div class="row">
							<!-- <label class="col-sm-2 col-form-label">Categoria:</label>
                               <div class="col-sm-4">
                                			<select class="form-control m-b" name="categoria_id" >
			          						<option>Seleccione una Categoria</option>
			          						@foreach($categorias as $categoria)
					    					<option value="{{ $categoria->id }}">{{ $categoria->descripcion}}</option>
					    					@endforeach
					    					</select>
					    		</div> -->

                  		 	<label class="col-sm-2 col-form-label">Marca:</label>
              					<div class="col-sm-10">
               						 <select class="form-control m-b" name="marca_id" required="required">
			          				{{-- <option>Seleccione una Marca</option> --}}
			          				@foreach($marcas as $marca)
					    			<option value="{{ $marca->id }}">{{ $marca->nombre}}</option>
					    			@endforeach
					    			</select>
                      			</div>
						</div>
						<div class="row">
							
                      			<label class="col-sm-2 col-form-label">Familia:</label>
                        		 <div class="col-sm-10">
                         			<select class="form-control m-b" name="familia_id" required="required">
			          				{{-- <option>Seleccione una Familia</option> --}}
			          				@foreach($familias as $familia)
					    			<option value="{{ $familia->id }}">{{ $familia->descripcion}}</option>
					    			@endforeach
					    			</select>
                				</div>

						</div>
						<br>
				</div>
					
		</fieldset>		

		<fieldset class="col-sm-6">    	
					<legend>Datos del <br>Producto </legend>
					
					<div class="panel panel-default">
						<div class="panel-body" align="left">
							<div class="row">
								<label class="col-sm-2 col-form-label">Nombre:</label>
                              <div class="col-sm-10"><input type="text" class="form-control" name="nombre" placeholder="Nombre del Producto" required="required"></div>

                    			<label class="col-sm-2 col-form-label">Descripcion:</label>
                              <div class="col-sm-10"><textarea type="text" class="form-control" name="descripcion" rows="2" required="required" ></textarea ></div>
							</div>
							<div class="row">
								<label class="col-sm-2 col-form-label">Estado:</label>
                    				<div class="col-sm-4">
                     					 <select class="form-control m-b" name="estado_id" required="required">
			          							{{-- <option>Seleccione un Estado</option> --}}
			          								@foreach($estados as $estado)
					    						<option value="{{ $estado->id }}">{{ $estado->nombre}}</option>
					    							@endforeach
					    				</select>
					    			</div>

                    			<label class="col-sm-2 col-form-label">Origen:</label>
                   				   <div class="col-sm-4">
                   				   	<select class="form-control m-b" name="origen" required>
			          							{{-- <option>Seleccione un Estado</option> --}}
			          							<option value="Producto Nacional" >Producto Nacional</option>
			          							<option value="Producto Importado">Producto Importado</option>
					    			</select>
                   				   </div>

							</div>

						</div>
					</div>
					
		</fieldset>		

		<fieldset class="col-sm-6">    	
					<legend>Precio del <br>Producto</legend>
					
					<div class="panel panel-default">
						<div class="panel-body" align="left">
							<div class="row">
								 <label class="col-sm-2 col-form-label">Descuento1:</label>
                              <div class="col-sm-4">
                              	<div class="input-group m-b">
                  						<div class="input-group-prepend">
                    						<span class="input-group-addon">%</span>
                  						</div>
                  					<input type="text" class="form-control" name="descuento1" required="required" value="0">
                				</div>
                   			 </div>

                   			 <label class="col-sm-2 col-form-label">Descuento2:</label>
                              <div class="col-sm-4">
                              	<div class="input-group m-b">
                  					<div class="input-group-prepend">
                    					<span class="input-group-addon">%</span>
                 					 </div>
                  					<input type="text" class="form-control" name="descuento2" required="required" value="0">
                 				</div>
                  			  </div>
                    			
						</div>
						<div class="row">
								 <label class="col-sm-2 col-form-label">Descuento Maximo:</label>
                              <div class="col-sm-4"><div class="input-group m-b">
                  <div class="input-group-prepend">
                    <span class="input-group-addon">%</span>
                  </div>
                  <input type="text" class="form-control" name="descuento_maximo" required="required" value="0">
                </div>
                    </div>

                   			<label class="col-sm-2 col-form-label">Utilidad:</label>
                              <div class="col-sm-4"><div class="input-group m-b">
                  <div class="input-group-prepend">
                    <span class="input-group-addon">%</span>
                  </div>
                 <input type="text" class="form-control" name="utilidad" required="required" value="0">
                </div>
                    			
						</div>
					</div>
					<div class="row">
								 <label class="col-sm-2 col-form-label">Unida de medida:</label>
                              <div class="col-sm-4">
                              	<div class="input-group m-b">
	                  				 <select class="form-control m-b" name="unidad_medida_id" required="required">
										{{-- <option>Seleccione La Unidad de Medida</option> --}}
										@foreach($unidad_medidas as $unidad_medida)
										<option value="{{ $unidad_medida->id }}">{{ $unidad_medida->medida}}</option>
										@endforeach
									</select>
               					 </div>
                  			  </div>
                    <label class="col-sm-2 col-form-label">Peso:</label>
                              <div class="col-sm-2">
                                <div class="input-group m-b">
                             <input type="number" class="form-control" name="peso" required="required" value="0">
                                </div>
                              </div>
                              <div class="col-sm-2">
                                <div class="input-group m-b">
                                  <select name="simbolo" class="form-control">
                                    <option value="Gramos">Gramos</option>
                                    <option value="Kilos">Kilos</option>
                                    <option value="Toneladas">Toneladas</option>
                                  </select>
                                </div>
                              </div>
                   			
                    			
						</div>
						<div class="row">
								 <label class="col-sm-2 col-form-label">garantia:</label>
                              <div class="col-sm-2"><input type="text" class="form-control" name="garantia" value="12 meses" >
                    		</div>

                   			<label class="col-sm-2 col-form-label">Stok Minimo:</label>
                              <div class="col-sm-2"><input type="text" class="form-control" name="stock_minimo" required="" value="0">
                    		</div>
                    		<label class="col-sm-2 col-form-label">Stock Maximo:</label>
                              <div class="col-sm-2"><input type="text" class="form-control" name="stock_maximo" required="" value="0" >
                    </div>
                    			
						</div>
						


					</div>

						
					
		</fieldset>		
		<fieldset class="col-sm-6">    	
					<legend>Foto del <br>Producto </legend>
					
					<div class="panel panel-default">
						<div class="panel-body">
                              <div class="col-sm-12">
                              	<input type="file" id="archivoInput" name="foto" onchange="return validarExt()"  />
												<div id="visorArchivo">
													<!--Aqui se desplegará el fichero-->
													<center ><img name="foto"  src="" width="390px" height="200px" /></center>
                              					</div>
                              </div>
						</div>
					</div>
							
		</fieldset>		


    </div>
			
	<button class="btn btn-primary" type="submit">Guardar</button>

                		
					</form>
</div>

                
<style>
	/*img{border-radius: 40px}*/
			p#texto{
				text-align: center;
				color:black;
			}
			
			input#archivoInput{
				position:absolute;
				top:0px;
				left:0px;
				right:0px;
				bottom:0px;
				width:100%;
				height:100%;
				opacity: 0	;
			}
	.form-control{    margin-bottom: 15px;
}
   fieldset 
  {
    /*border: 1px solid #ddd !important;*/
    padding: 10px;       
    /*border-radius:4px ;*/
    background-color:#f5f5f5;
    padding-left:10px!important;
    padding-right:10px!important;
    margin-bottom: 10px;
    border-left: 1px solid #ddd !important;

  } 
  
    legend
    {
      font-size:14px;
      font-weight:bold;
      margin-bottom: 0px; 
      width: 35%; 
      border: 1px solid #ddd;
      border-radius: 4px; 
      padding: 5px 5px 5px 10px; 
      background-color: #ffffff;
    } 
</style>
	<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('js/inspinia.js') }}"></script>
    <script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>
     <script type="text/javascript">
		function validarExt()
{
    var archivoInput = document.getElementById('archivoInput');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.jpg|.png|.jfif)$/i;
    if(!extPermitidas.exec(archivoRuta)){
        alert('Asegurese de haber seleccionado una Imagen');
        archivoInput.value = '';
        return false;
    }

    else
    {
        //PRevio del PDF
        if (archivoInput.files && archivoInput.files[0]) 
        {
            var visor = new FileReader();
            visor.onload = function(e) 
            {
                document.getElementById('visorArchivo').innerHTML = 
                '<center><img name="foto" src="'+e.target.result+'"width="390px" height="200px" /></center>';
            };
            visor.readAsDataURL(archivoInput.files[0]);
        }
    }
}
	</script>
@endsection