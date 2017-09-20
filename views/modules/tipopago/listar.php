<?php 
	
	include 'modals/modificar.php';
	include 'modals/eliminar.php';

	$script = "/js/tipopago.js";

	$content = '	
		<div class="col-xs-12">
	        <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Lista de Empleados</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
					<table id="dt_tipopago" class="table table-striped">
						<thead>
							<th>Idtipopago</th>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th></th>
						</thead>
					</table>
				</div>
			</div>
		</div>'.$modalModificar.$modalEliminar;

	$path = ["content"=>$content, "script"=>$script];
	echo json_encode( $path );

 ?>