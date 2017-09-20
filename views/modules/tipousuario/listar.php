<?php 
	
	include 'modals/modificar.php';
	include 'modals/eliminar.php';

	$script = "/js/tipousuario.js";

	$content = '	
		<div class="col-xs-12">
	        <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Lista de Tipos Usuario</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
					<table id="dt_tipousuario" class="table table-striped">
						<thead>
							<th>Idtipousuario</th>
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