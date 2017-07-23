<?php 
	$modalModificar = '
	<div class="col-md-6">
			<!-- Modal -->
			<div class="modal fade" id="modalModificar" tabindex="-1" role="dialog" aria-labelledby="modalModificarLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="modalEliminarLabel">Modificar Cliente</h4>
						</div>
						<div class="modal-body">
						<form id="frmModificarCliente" class="form-horizontal" action="" method="POST">
						<input type="hidden" id="idcliente" name="idcliente" value="">
						<input type="hidden" id="opcion" name="opcion" value="modificar">
							<div class="form-group">
								 <label  class="col-sm-2 control-label"
                              		for="nombre">Nombre</label>
								<div class="col-sm-10">
									<input id="nombre" name="nombre" type="text" class="form-control">
								</div>
							</div>
							<div class="form-group">
								 <label  class="col-sm-2 control-label"
                              		for="apellidopaterno">Apellido Paterno</label>
								<div class="col-sm-10">
									<input id="apellidopaterno" name="apellidopaterno" type="text" class="form-control">
								</div>
							</div>
							<div class="form-group">
								 <label  class="col-sm-2 control-label"
                              		for="apellidomaterno">Apellido Materno</label>
								<div class="col-sm-10">
									<input id="apellidomaterno" name="apellidomaterno" type="text" class="form-control"></div>
							</div>
							<div class="form-group">
								 <label  class="col-sm-2 control-label"
                              		for="email">Email</label>
								<div class="col-sm-10">
									<input id="email" name="email" type="text" class="form-control">
								</div>
							</div>
							<div class="form-group">
								 <label  class="col-sm-2 control-label"
                              		for="celular">Celular</label>
								<div class="col-sm-10">
									<input id="celular" name="celular" type="text" class="form-control">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" id="modificar-cliente" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>';

 ?>