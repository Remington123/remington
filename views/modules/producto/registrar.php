<?php
	
	$modulo = "producto";
	$accion = "registrar";
	$controlador = $modulo.'/ProductoController';
	$script = '/js/producto.js';

	$content = '
	<div class="col-md-6">
	  <!-- general form elements -->
	  <div class="box box-primary">
	    <div class="box-header with-border">
	      <h3 class="box-title">Form Producto</h3>
	    </div>
	    <!-- /.box-header -->
	    <!-- form start -->
	    <form id="frmguardar'.$modulo.'" action="'.$controlador.'" role="form">
	    <input type="hidden" id="id'.$modulo.'" name="id'.$modulo.'" value="">
		<input type="hidden" id="opcion" name="opcion" value="'. $accion.'">
	      <div class="box-body">
			<div class="form-group">
	          <label for="idcategoriaproducto">Categoría</label>
	          <select class="form-control" id="idcategoriaproducto" name="idcategoriaproducto" ><option value="">Seleccionar</option></select>
	        </div>

	        <div class="form-group">
	            <label for="descripcion">Descripción</label>            
	            <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripción">
	        </div>
	        
	        <div class="form-group">
	          <label for="idtela">Tela</label>
	          <select class="form-control" id="idtela" name="idtela" ><option value="">Seleccionar</option></select>
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

	    </form>
	  </div>
	  <!-- /.box -->
	  </div>';

	$path = ["content"=>$content, "script"=>$script];
	echo json_encode( $path );
?>
	