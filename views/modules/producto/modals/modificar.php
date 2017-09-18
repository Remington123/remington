<?php
	
	$accion = "modificar";
	$modulo = "producto";
	$controlador = $modulo.'/ProductoController';
	$modalModificar = '
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
							
							<div class="form-group">
					            <label class="col-sm-2 control-label" for="descripcion">Descripción</label>            
					            <div class="col-sm-10">
					            	<input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="descripcion">
					            </div>
					        </div>
							<div class="form-group">
					          <label class="col-sm-2 control-label" for="idcategoriaproducto">Categoría</label>
					          <div class="col-sm-10">
					          	<select class="form-control" id="idcategoriaproducto" name="idcategoriaproducto" ><option value="">Seleccionar</option></select>
					          </div>
					        </div>
					        
					        <div class="form-group">
					          <label class="col-sm-2 control-label" for="idtela">Tela</label>
					          <div class="col-sm-10">
					          	<select class="form-control" id="idtela" name="idtela" ><option value="">Seleccionar</option></select>
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