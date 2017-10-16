<?php 
	$script = "/js/producto.js";

	$content = '
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Listar Productos por Color <small>Mostrar productos por filtro de colores.</small></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
		            <div class="form-group">
			          <label class="col-sm-12 control-label" for="idcolor">Color</label>
			          <div class="col-sm-6">
			          	<select class="form-control" id="idcolor" name="idcolor" ><option value="">Seleccionar</option></select>
			          </div>
			          <div class="form-group col-md-4">	        	        	
		        		<button type="button" id="mostrarproductos" class="btn btn-primary">Mostrar</button>
			      	</div> 
			        </div>					

					<div class="col-md-12">
						<table id="dt_productocolor" class="table table-striped">
							<thead>
								<th>Código</th>
								<th>Descripción</th>
								<!--<th>Color</th>-->
								<th>Talla</th>
								<th>Stock</th>
								<th>Precio</th>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>';

	$path = ["content"=>$content, "script"=>$script];
	echo json_encode( $path );

?>
