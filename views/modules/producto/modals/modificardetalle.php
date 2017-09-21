<?php
	
	$accion = "modificar";
	$modulo = "detalleproducto";
	$controlador = $modulo.'/DetalleProductoController';
	$modalModificarDetalle = '
	<div class="col-md-6">
			<!-- Modal -->
			<div class="modal fade" id="modal'. $accion.'" tabindex="-1" role="dialog" aria-labelledby="modal'. $accion.'Label">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="modal'. $accion.'Label">'. ucwords($accion.' '.$modulo).'</h4>
						</div>
						<!--Fin modal-body-->
						<div class="modal-body">
							<form id="frmguardar'.$modulo.'" class="form-horizontal" action="'.$controlador.'" method="POST">
							<input type="hidden" id="id'.$modulo.'" name="id'.$modulo.'" value="">
							<input type="hidden" id="opcion" name="opcion" value="'. $accion.'">
							
							<!--<div class="form-group">
					            <label class="col-sm-2 control-label" for="modelo">Modelo</label>            
					            <div class="col-sm-10">
					            <input type="hidden" id="idmodelo" name="idmodelo">
					            	<input type="text" id="modelo" name="modelo" class="form-control" placeholder="Modelo">
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-sm-2 control-label" for="talla">Talla</label>            
					            <div class="col-sm-10">
					            <input type="hidden" id="idtalla" name="idtalla">
					            	<input type="text" id="talla" name="talla" class="form-control" placeholder="Talla">
					            </div>
					        </div>
					        <div class="form-group">
					            <label class="col-sm-2 control-label" for="color">Color</label>            
					            <div class="col-sm-10">
					            <input type="hidden" id="idcolor" name="idcolor">
					            	<input type="text" id="color" name="color" class="form-control" placeholder="Color">
					            </div>
					        </div>-->
					        <div class="form-group">
					            <label class="col-sm-2 control-label" for="stock">Stock</label>
					            <div class="col-sm-10">
					            	<input type="text" id="stock" name="stock" class="form-control" placeholder="Stock">
					            </div>
					        </div>
					        <div class="form-group">
					            <label class="col-sm-2 control-label" for="precio">Precio</label>
					            <div class="col-sm-10">
					            	<input type="text" id="precio" name="precio" class="form-control" placeholder="Precio">
					            </div>
					        </div>
							

							<div class="modal-footer">
								<button type="submit" id="guardar-'.$modulo.'" class="btn btn-primary">Guardar</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							</div>
							
							<div class="row">
								<br>
					        	<div class="col-sm-12 mensaje ocultar">
					        		
					        	</div>
					        </div>
						</form>
					</div>
					<!--Fin modal-body-->
				</div>
			</div>		
		</div>
	</div>';

 ?>