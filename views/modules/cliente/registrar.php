<?php 
		$script = '/js/cliente.js';

		$content = '
		<div class="col-md-6">
		  <!-- general form elements -->
		  <div class="box box-primary">
		    <div class="box-header with-border">
		      <h3 class="box-title">Form Cliente</h3>
		    </div>
		    <!-- /.box-header -->
		    <!-- form start -->
		    <form role="form">
		      <div class="box-body">

		        <div class="form-group">
		            <label for="nombre">Nombre</label>            
		            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre">
		        </div>
		        <div class="form-group">
		          <label for="apellidopaterno">A. Paterno</label>
		          <input type="text" id="apellidopaterno" name="apellidopaterno" class="form-control" placeholder="Apellido Paterno">
		        </div>
		        <div class="form-group">
		          <label for="apellidomaterno">A. Materno</label>
		          <input type="text" id="apellidomaterno" name="apellidomaterno" class="form-control" placeholder="Apellido Materno">
		        </div>
		        <div class="form-group">
		          <label for="dni">Dni</label>
		          <input type="text" id="dni" name="dni" class="form-control" placeholder="Dni">
		        </div>
		        <div class="form-group">
		          <label for="email">Email</label>
		          <input type="text" id="email" name="email" class="form-control" placeholder="Email">
		        </div>
		        <div class="form-group">
		          <label for="celular">Celular</label>
		          <input type="text" id="celular" name="celular" class="form-control" placeholder="Celular">
		        </div>
		        <div class="form-group">
		          <label for="direccion">Dirección</label>
		          <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección">
		        </div>
		        <div class="form-group">
		          <label for="ruc">Ruc</label>
		          <input type="text" id="ruc" name="ruc" class="form-control" placeholder="Ruc">
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
	