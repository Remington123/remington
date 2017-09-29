<?php 
	//include 'modals/modificar.php';
	//include 'modals/eliminar.php';

	$script = "/js/reportes.js";

	$content = '
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Reporte de Pedidos <small>Mostrar los clientes que estan registrados, pero que no han realizado ningun pedido.</small></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group col-md-6">
		                <label for="fechaInicio">Fecha Inicio:</label>
		                <div class="input-group date">
		                  <div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                  </div>
		                  <input type="text" class="form-control pull-right datepicker_clientes" id="fechaInicio" name="fechaInicio">
		                </div>
		            </div>

		            <div class="form-group col-md-6">
		                <label for="fechaInicio">Fecha Fin:</label>
		                <div class="input-group date">
		                  <div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                  </div>
		                  <input type="text" class="form-control pull-right datepicker_clientes" id="fechaFin" name="fechaFin">
		                </div>
		            </div>
					
					<div class="form-group col-md-12">	        	        	
		        		<button type="button" id="buscar" class="btn btn-primary">Buscar</button>
			      	</div> 

					<div class="col-md-12">
						<table id="dt_reportepedido_cliente" class="table table-striped">
							<thead>
								<th>ID Cliente</th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Dni</th>
								<th>Email</th>
								<th>Fecha Registro</th>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>'; //.$modalModificar.$modalEliminar;

	$path = ["content"=>$content, "script"=>$script];
	echo json_encode( $path );

?>
