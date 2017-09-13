<?php 
	
	$accion = "buscar";
	$modulo = "producto";
	$controlador = $modulo.'/ProductoController';
	
	$modalBuscar = '
	<div class="row">
		
			<div class="modal fade" id="modal'. $accion.'" tabindex="-1" role="dialog" aria-labelledby="modal'. $accion.'Label">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="modal'. $accion.'Label">'. ucwords($accion.' '.$modulo).'</h4>
						</div>
						<div class="modal-body">							
							<div class="form-group col-md-10">
					            <input type="text" id="descripcion-prenda" name="descripcion-prenda" class="form-control" placeholder="Ingresar nombre de producto ...">
					        </div>
					        <div class="form-group col-md-2">
					            
					            <button type="button" id="buscar-'.$modulo.'" class="btn btn-primary">Buscar</button>
					        </div>
							
							<div class="col-md-12">
						        <div class="box-body">
									<table id="buscar_dt_producto" class="table table-hover">
										<thead>
											<th>ID</th>
											<th>Categoria</th>
											<th>Descripcion</th>
											<th>Tella</th>											
											<th></th>
										</thead>
										
									</table>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							
						</div>
					</div>
				</div>
			</div>
		
	</div>';

 ?>
