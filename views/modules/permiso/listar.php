<?php 
	
	include 'modals/modificar.php';
	include 'modals/eliminar.php';

	$script = "/js/permiso.js";

	$content = '	
		<div class="col-xs-12">
	        <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Lista de Permisos de Módulos por Tipo de Usuario</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
					<table id="dt_permiso" class="table table-striped">
						<thead>
							<th>Idpermiso</th>
							<th>Idtipousuario</th>
							<th>Tipo Usuario</th>
							<th>Idmodulo</th>
							<th>Módulo</th>
							<!--<th></th>-->
						</thead>
					</table>
				</div>
			</div>
		</div>'.$modalModificar.$modalEliminar;

	$path = ["content"=>$content, "script"=>$script];
	echo json_encode( $path );

 ?>