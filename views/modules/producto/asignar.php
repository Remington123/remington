<?php
	include 'modals/buscar.php';

	$modulo = "producto";
	$accion = "asignar";
	$controlador = $modulo.'/ProductoController';
	$script = '/js/producto.js';

	$content = '
	<div class="col-md-12">
	  <!-- general form elements -->
	  <div class="box box-primary">
	    <div class="box-header with-border">
	      <h3 class="box-title">Form Asignar</h3>
	    </div>
	    <!-- /.box-header -->
	    <!-- form start -->
	    <form id="frmguardar'.$modulo.'" action="'.$controlador.'" role="form">
	    <input type="hidden" id="id'.$modulo.'" name="id'.$modulo.'" value="">
		<input type="hidden" id="opcion" name="opcion" value="'. $accion.'">
	      <div class="box-body">
	      	<div class="form-group col-md-12">        	
        		<button type="button" data-target="#modalbuscar" data-toggle="modal" id="modal-buscar-'.$modulo.'" class="btn btn-primary">Buscar Producto</button>
	      	</div>  

	        <div class="form-group col-md-6">
	            <label for="descripcion">Descripción</label>            
	            <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripción">
	        </div>

			<div class="form-group col-md-6">
	          <label for="idcategoriaproducto">Categoría</label>
	          <input type="text" id="categoria" name="categoria" class="form-control" placeholder="Categoría">
	        </div>
	        <div class="form-group col-md-6">
	          <label for="idmodelo">Modelo</label>
	          <select class="form-control" id="idmodelo" name="idmodelo" ><option value="">Seleccionar</option></select>
	        </div>
	        <div class="form-group col-md-6">
	          <label for="idtalla">Talla</label>
	          <select class="form-control" id="idtalla" name="idtalla" ><option value="">Seleccionar</option></select>
	        </div>
			<div class="form-group col-md-3">
	          <label for="idtalla">Color</label>
	          <select class="form-control" id="idcolor" name="idcolor" ><option value="">Seleccionar</option></select>
	        </div>

			<div class="form-group col-md-5">
	          <label for="urlimagen">Imagen</label>
	          <input type="text" id="urlimagen" name="urlimagen" class="form-control" placeholder="Url imagen">
	        </div>

			<div class="form-group col-md-2">
	          <label for="stock">Stock</label>
	          <input type="text" id="stock" name="stock" class="form-control" placeholder="Stock">
	          <input type="hidden" id="stock" name="stockactual" class="form-control" placeholder="StockActual">
	        </div>

	        <div class="form-group col-md-2">
	          <label for="precio">Precio</label>
	          <input type="text" id="precio" name="precio" class="form-control" placeholder="Precio">
	        </div>	        

	        <div class="form-group col-md-12">	        	        	
        		<button type="button" id="asignar-'.$modulo.'" class="btn btn-success">Agregar</button>
	      	</div>     

	      	<div class="col-md-12">       			            
		        
		            <div class="box-body">
						<table id="" class="table table-hover">
							<thead>
								<th>ID</th>
								<th>Modelo</th>
								<th>Talla</th>
								<th>Color</th>
								<th>Stock</th>
								<th>Precio</th>
								<th></th>
							</thead>
							<tbody>
								<tr>
									<td>01</td>
									<td>Cuello V</td>
									<td>S</td>
									<td>Negro</td>
									<td>30</td>
									<td>70</td>
									<td>
										<button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>				
			</div> 

	      </div>
	      <!-- /.box-body -->
	      <div class="box-footer">        	
        	<button type="submit" id="guardar-'.$modulo.'" class="btn btn-primary">Guardar</button>
	      </div>
	      
	      <div class="row">
	        <br>
	       	<div class="col-sm-12 mensaje ocultar">
	        		
	       	</div>
	      </div>
		<!-- campos ocultos -->		
	      <input type="hidden" id="idcategoriaproducto" name="idcategoriaproducto">

	    </form>
	  </div>
	  <!-- /.box -->
	  </div>'.$modalBuscar;

	$path = ["content"=>$content, "script"=>$script];
	echo json_encode( $path );
?>
	