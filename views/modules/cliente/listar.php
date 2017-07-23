<?php 
	
	include 'modals/modificar.php';
	include 'modals/eliminar.php';

	$script = "/js/cliente.js";

	$content = '
	<div class="row">
		<table id="dt_cliente" class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Apellido M.</th>
				<th>Email</th>
				<th>Celular</th>
				<th></th>
			</thead>
		</table>
	</div>'.$modalModificar.$modalEliminar;

	$path = ["content"=>$content, "script"=>$script];
	echo json_encode( $path );

 ?>
