<?php 
	
	include 'modals/modificar.php';
	include 'modals/eliminar.php';

	$script = "/js/pagina.js";

	$content = '	
		<div class="col-xs-12">
	        <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Lista de Paginas</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
					<table id="dt_pagina" class="table table-striped">
						<thead>
							<th>Idpagina</th>
							<th>Pagina/th>
							<th>Icono</th>
							<th></th>
						</thead>
					</table>
				</div>
			</div>
		</div>'.$modalModificar.$modalEliminar;

	$path = ["content"=>$content, "script"=>$script];
	echo json_encode( $path );

 ?>