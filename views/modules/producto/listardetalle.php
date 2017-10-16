<?php 
	include 'modals/modificardetalle.php';
	include 'modals/buscar.php';

	$script = "/js/producto.js";

	$modulo = "producto";
	$controlador = $modulo.'/ProductoController';

	$content = '
		<div class="col-md-12">
		  <!-- general form elements -->
		  <div class="box box-primary">
		    <div class="box-header with-border">
		      <h3 class="box-title">Producto Detalle</h3>
		    </div>
		    <!-- /.box-header -->
		    <!-- form start -->
		    <form id="frmlistar'.$modulo.'" action="'.$controlador.'" role="form">
		      <div class="box-body">
			    <!--<div class="form-group col-md-12">        	
        			<button type="button" data-target="#modalbuscar" data-toggle="modal" id="modal-buscar-'.$modulo.'" class="btn btn-primary">Buscar Producto</button>
		    	</div>-->  

		        <div class="form-group col-md-6">
		            <label for="idproducto">Producto</label>            
		            <input type="text" id="idproducto" name="idproducto" class="form-control" placeholder="Ingresar Código">
		        </div>
		        <div class="form-group col-md-6">
		            <label for="producto">Descripción</label>
		            <input type="text" id="producto" name="producto" class="form-control" placeholder="Producto" disabled >
		        </div>
		        <div class="form-group col-md-6">
		            <label for="categoria">Categoria</label>
		            <input type="hidden" id="idcategoriaproducto" name="idcategoriaproducto">
		            <input type="text" id="categoria" name="categoria" class="form-control" placeholder="Categoria" disabled >
		        </div>
		        <div class="form-group col-md-6">
		            <label for="tela">Tela</label>
		            <input type="hidden" id="idtela" name="idtela">
		            <input type="text" id="tela" name="tela" class="form-control" placeholder="Tela" disabled >
		        </div>
				
				<div class="form-group col-md-12">
		        	<input type="button" id="btnlistar-'.$modulo.'" class="btn btn-primary" value="Verificar">					
				</div>

		      </div>
		      <!-- /.box-body -->
		      <!--<div class="box-footer">-->
		      <!--</div>-->
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
		</div>'.$modalModificarDetalle.$modalBuscar;

	$path = ["content"=>$content, "script"=>$script];
	echo json_encode( $path );

?>
