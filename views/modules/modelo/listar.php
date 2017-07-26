<?php 
	
	include 'modals/modificar.php';
	include 'modals/eliminar.php';

	$script = "/js/modelo.js";

	$content = '	
		<div class="col-xs-12">
	        <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Lista de Modelo</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
					<table id="dt_modelo" class="table table-striped">
						<thead>
							<th>ID</th>
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
