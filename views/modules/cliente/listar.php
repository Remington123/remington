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
							<th>Idcliente</th>
							<th>Nombres</th>
							<th>Apellidopaterno</th>
							<th>Apellidomaterno</th>
							<th>Dni</th>
							<th>Email</th>
							<th></th>
						</thead>
					</table>
				</div>
			</div>
		</div>'.$modalModificar.$modalEliminar;

	$path = ["content"=>$content, "script"=>$script];
	echo json_encode( $path );

 ?>
