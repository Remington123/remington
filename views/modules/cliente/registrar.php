<?php 
		$script = '/js/cliente.js';

		$content = '<div class="row">
			<div class="col-sm-12">
				<h1 class="text-center">Formulario de Registro</h1>
				<hr>
			</div>
		</div>
		<div class="row">
			<form id="frm-cliente-registrar" action="cliente/ClienteController.php" method="POST">
				<input type="hidden" id="opcion" name="opcion" value="modificar">
				<input type="hidden" id="idcliente" name="idcliente" value="4">
				<div class="form-horizontal">
					<div class="form-group">
						<label for="nombre" class="col-sm-2 control-label">Nombre</label>
						<div class="col-sm-10">
							<input type="text" id="nombre" name="nombre" class="form-control" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="apellidopaterno" class="col-sm-2 control-label">A. Paterno</label>
						<div class="col-sm-10">
							<input type="text" id="apellidopaterno" name="apellidopaterno" class="form-control" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="apellidomaterno" class="col-sm-2 control-label">A. Materno</label>
						<div class="col-sm-10">
							<input type="text" id="apellidomaterno" name="apellidomaterno" class="form-control" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="dni" class="col-sm-2 control-label">Dni</label>
						<div class="col-sm-10">
							<input type="text" id="dni" name="dni" class="form-control" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="text" id="email" name="email" class="form-control" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="celular" class="col-sm-2 control-label">Celular</label>
						<div class="col-sm-10">
							<input type="text" id="celular" name="celular" class="form-control" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="direccion" class="col-sm-2 control-label">Dirección</label>
						<div class="col-sm-10">
							<input type="text" id="direccion" name="direccion" class="form-control" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<label for="ruc" class="col-sm-2 control-label">Ruc</label>
						<div class="col-sm-10">
							<input type="text" id="ruc" name="ruc" class="form-control" placeholder="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</div>
				</div>
			</form>
		</div>';

		$path = ["content"=>$content, "script"=>$script];
		echo json_encode( $path );
?>
	