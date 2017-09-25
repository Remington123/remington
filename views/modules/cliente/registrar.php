<?php 
		$modulo = "cliente";
		$accion = "registrar";
		$controlador = $modulo.'/ClienteController';

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
		    <form id="frmguardar'.$modulo.'" action="'.$controlador.'" role="form">
		    	<input type="hidden" id="id'.$modulo.'" name="id'.$modulo.'" value="">
				<input type="hidden" id="opcion" name="opcion" value="'. $accion.'">
		      <div class="box-body">

		        <div class="form-group">
		            <label for="nombres">Nombres</label>            
		            <input type="text" id="nombres" name="nombres" class="form-control" placeholder="Nombres">
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
		          <input type="text" id="dni" name="dni" class="form-control" placeholder="Dni" minlength="8" maxlength="8">
		        </div>
		        <div class="form-group">
		          <label for="celular">Celular</label>
		          <input type="text" id="celular" name="celular" class="form-control" placeholder="Celular" minlength="9" maxlength="9">
		        </div>
		        <div class="form-group">
		          <label for="direccion">Dirección</label>
		          <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección">
		        </div>
		        <div class="form-group">
		          <label for="email">Email</label>
		          <input type="text" id="email" name="email" class="form-control" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
          				title="Por favor, introducir un formato de email valido, ejemplo: juan@gmail.com">
		        </div>
		        <div class="form-group">
		          <label for="contrasena">Contraseña</label>
		          <input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="Contraseña">
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
	