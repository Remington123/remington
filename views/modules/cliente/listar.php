<?php 
	
	include 'modals/modificar.php';
	include 'modals/eliminar.php';

	$script = "/js/cliente.js";

	$content = '	
		<div class="col-xs-12">
	        <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Lista de Clientes</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
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
				</div>
			</div>
		</div>'.$modalModificar.$modalEliminar;

	$path = ["content"=>$content, "script"=>$script];
	echo json_encode( $path );

 ?>
