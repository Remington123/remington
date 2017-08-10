<?php 

	$accion = "eliminar";
	$modulo = "categoriaproducto";
	$controlador = $modulo.'/CategoriaProductoController';
	
	$modalEliminar = '
	<div class="row">
		<form id="frm'. $accion.$modulo.'" action="'.$controlador.'" method="POST">
			<input type="hidden" id="id'.$modulo.'" name="id'.$modulo.'" value="">
			<input type="hidden" id="opcion" name="opcion" value="'. $accion.'">
			<!-- Modal -->
			<div class="modal fade" id="modal'. $accion.'" tabindex="-1" role="dialog" aria-labelledby="modal'. $accion.'Label">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="modal'. $accion.'Label">'. ucwords($accion.' '.$modulo).'</h4>
						</div>
						<div class="modal-body">							
							¿Está seguro de '. $accion.' al '.$modulo.'?<strong data-name=""></strong>
						</div>
						<div class="modal-footer">
							<button type="submit" id="'. $accion.'-'.$modulo.'" class="btn btn-primary">Aceptar</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>';

 ?>