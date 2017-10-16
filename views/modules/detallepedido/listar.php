<?php 
	include 'modals/modificar.php';
	include 'modals/eliminar.php';

	$script = "/js/detallepedido.js";

	$modulo = "detallepedido";
	$controlador = $modulo.'/DetallePedidoController';

	$content = '
		<div class="col-md-8 col-md-offset-2">
		  <!-- general form elements -->
		  <div class="box box-primary">
		    <div class="box-header with-border">
		      <h3 class="box-title">Pedido</h3>
		    </div>
		    <!-- /.box-header -->
		    <!-- form start -->
		    <form id="frmlistar'.$modulo.'" action="'.$controlador.'" role="form">
		      <div class="box-body">

		        <div class="form-group">
		            <label for="idpedido">Pedido</label>            
		            <input type="text" id="idpedido" name="idpedido" class="form-control" placeholder="Ingresar Código">
		        </div>
		        <div class="form-group">
		            <label for="cliente">Cliente</label>
		            <input type="hidden" id="idcliente" name="idcliente">
		            <input type="text" id="cliente" name="cliente" class="form-control" placeholder="Cliente">
		        </div>
		        <div class="form-group">
		            <label for="fecha">Fecha</label>            
		            <input type="text" id="fecha" name="fecha" class="form-control" placeholder="Fecha">
		        </div>
		        <div class="form-group">
		            <label for="total">Total</label>            
		            <input type="text" id="total" name="total" class="form-control" placeholder="Total">
		        </div>		        
		      </div>
		      <!-- /.box-body -->
		      <div class="box-footer">
		        <button type="button" id="btnlistar-'.$modulo.'" class="btn btn-primary">Verificar</button>
		      </div>
		    </form>
		  </div>
		  <!-- /.box -->
		  </div>
		
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Lista de Detalle</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="dt_detallepedido" class="table table-striped">
						<thead>
							<th>ID</th>
							<th>idPedido</th>
							<th>idProducto</th>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Importe</th>
							
						</thead>
					</table>
				</div>
			</div>
		</div>'.$modalModificar.$modalEliminar;

	$path = ["content"=>$content, "script"=>$script];
	echo json_encode( $path );

?>
