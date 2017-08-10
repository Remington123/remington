<?php 
		$accion = "registrar";
		$modulo = "talla";
		$controlador = $modulo.'/TallaController';
		$script = '/js/talla.js';

		$content = '
		<div class="col-md-6">
		  <!-- general form elements -->
		  <div class="box box-primary">
		    <div class="box-header with-border">
		      <h3 class="box-title">Form Talla</h3>
		    </div>
		    <!-- /.box-header -->
		    <!-- form start -->
		    <form id="frmguardar'.$modulo.'" action="'.$controlador.'" role="form">
		    	<input type="hidden" id="id'.$modulo.'" name="id'.$modulo.'" value="">
				<input type="hidden" id="opcion" name="opcion" value="'. $accion.'">
		      <div class="box-body">
		        <div class="form-group">
		            <label for="talla">Talla</label>            
		            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre">
		        </div>

				<div class="form-group">
		            <label for="acronimo">Acronimo</label>            
		            <input type="text" id="acronimo" name="acronimo" class="form-control" placeholder="Acronimo">
		        </div>		        
		      </div>
		      <!-- /.box-body -->
		      <div class="box-footer">
		        <button type="submit" id="guardar-'.$modulo.'" class="btn btn-primary">Guardar</button>
		      </div>
		    </form>
		  </div>
		  <!-- /.box -->
		  </div>';

		$path = ["content"=>$content, "script"=>$script];
		echo json_encode( $path );
?>
	