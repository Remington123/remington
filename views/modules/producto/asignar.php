<?php
	include 'modals/buscar.php';

	$modulo = "detalleproducto";
	$accion = "registrar";
	$controlador = $modulo.'/DetalleProductoController';
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
	            <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripción" disabled>
	        </div>

			<div class="form-group col-md-6">
	          <label for="categoria">Categoría</label>
	          <input type="text" id="categoria" name="categoria" class="form-control" placeholder="Categoría" disabled>
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
	          <label for="idcolor">Color</label>
	          <select class="form-control" id="idcolor" name="idcolor" ><option value="">Seleccionar</option></select>
	        </div>

			<div class="form-group col-md-5">
	          <label for="url_imagen">Imagen</label>
	          <input type="text" id="url_imagen" name="url_imagen" class="form-control" placeholder="Url imagen">
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
        		<button type="button" id="agregar-item" class="btn btn-success">Agregar</button>
	      	</div>     

	      	<div class="col-md-12">       			            
		        
		            <div class="box-body">
						<table id="dt_detalleproducto" class="ocultar table table-hover">
							<thead>
								<th>Id Producto</th>
								<th>Id Modelo</th>
								<th>Id Talla</th>
								<th>Id Color</th>
								<th>Modelo</th>
								<th>Talla</th>
								<th>Color</th>								
								<th>Stock</th>
								<th>Precio</th>
								<th>Imagen</th>
								<th>Url Imagen</th>
								<th></th>
							</thead>							
						</table>
					</div>				
			</div> 

	      </div>
	      <!-- /.box-body -->
	      <div class="box-footer">
	      	<div class="form-group col-md-12">
        	<button type="submit" id="guardar-'.$modulo.'" class="btn btn-primary ">Guardar</button>
        	</div>
	      </div>
	      
	      <div class="row">
	        <br>
	       	<div class="col-sm-12 mensaje ocultar">
	        		
	       	</div>
	      </div>
		<!-- campos ocultos -->		
	      <input type="hidden" id="idcategoriaproducto" name="idcategoriaproducto">
	      <input type="hidden" id="id_producto" name="id_producto">

	    </form>
	  </div>
	  <!-- /.box -->
	  </div>'.$modalBuscar;

	$path = ["content"=>$content, "script"=>$script];
	echo json_encode( $path );
?>
	