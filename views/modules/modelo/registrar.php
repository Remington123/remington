<?php 
		$script = '/js/modelo.js';

		$content = '
		<div class="col-md-6">
		  <!-- general form elements -->
		  <div class="box box-primary">
		    <div class="box-header with-border">
		      <h3 class="box-title">Form Modelo</h3>
		    </div>
		    <!-- /.box-header -->
		    <!-- form start -->
		    <form id = "frmmodeloregistrar" action="modelo/ModeloController.php" role="form">
		      <div class="box-body">

		        <div class="form-group">
		            <label for="nombre">Descripcion</label>            
		            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre">
		        </div>
		        
		      </div>
		      <!-- /.box-body -->
		      <div class="box-footer">
		        <button type="submit" class="btn btn-primary">Submit</button>
		      </div>
		    </form>
		  </div>
		  <!-- /.box -->
		  </div>';

		$path = ["content"=>$content, "script"=>$script];
		echo json_encode( $path );
?>
	