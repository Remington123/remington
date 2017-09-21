<?php 
	include 'modals/modificardetalle.php';

	$script = "/js/producto.js";

	$modulo = "producto";
	$controlador = $modulo.'/ProductoController';

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
		            <label for="idproducto">Producto</label>            
		            <input type="text" id="idproducto" name="idproducto" class="form-control" placeholder="Ingresar Código">
		        </div>
		        <div class="form-group">
		            <label for="producto">Descripción</label>
		            <input type="text" id="producto" name="producto" class="form-control" placeholder="Producto">
		        </div>
		        <div class="form-group">
		            <label for="categoria">Categoria</label>
		            <input type="hidden" id="idcategoriaproducto" name="idcategoriaproducto">
		            <input type="text" id="categoria" name="categoria" class="form-control" placeholder="Categoria">
		        </div>
		        <div class="form-group">
		            <label for="tela">Tela</label>
		            <input type="hidden" id="idtela" name="idtela">
		            <input type="text" id="tela" name="tela" class="form-control" placeholder="Tela">
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
					<table id="dt_detalleproducto" class="table table-striped">
						<thead>
							<th>Id</th>
							<th>Modelo</th>
							<th>Talla</th>
							<th>Color</th>
							<th>Url Imagen</th>
							<th>Stock</th>
							<th>Precio</th>
							<th></th>
						</thead>
					</table>
				</div>
			</div>
		</div>'.$modalModificarDetalle;

	$path = ["content"=>$content, "script"=>$script];
	echo json_encode( $path );

?>
