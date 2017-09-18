<?php 
	
	include 'modals/modificar.php';
	include 'modals/eliminar.php';
	include 'modals/visualizar.php';

	$script = "/js/producto.js";

	$content = '	
		<div class="col-xs-12">
	        <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Lista de Productos</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
					<table id="dt_producto" class="table table-striped">
						<thead>
							<th>ID</th>
							<th>Descripción</th>
							<th>Categoria</th>
							<th>Tela</th>
							<th>Estado</th>						
							<th></th>
						</thead>
					</table>
				</div>
			</div>
		</div>'.$modalModificar.$modalEliminar.$modalVisualizar;

	$path = ["content"=>$content, "script"=>$script];
	echo json_encode( $path );

 ?>
