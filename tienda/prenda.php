<?php 
	include 'helperhtml/header.php';

	include '../src/detalleproducto/DetalleProductoController.php';
	
	$data = json_decode($listaDetalle);

	$descripcion = $_POST["descripcion"];
	$precio = $_POST["precio"];
	$idproducto = $_POST["idproducto"];
	$cantidad = $_POST["cantidad"];
	$urlimagen = $_POST["urlimagen"];

	//var_dump($data);

	?>

<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>Single <span>Page </span></h3>
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Single Page</li>
							</ul>
						 </div>
				</div>
	</div>
</div>

  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
	     <div class="col-md-4 single-right-left ">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					
					<ul class="slides">
						<li data-thumb="images/d2.jpg">

							<div class="thumb-image"> 
								<img src="<?php echo $urlimagen; ?>" data-imagezoom="true" class="img-responsive"> 
							</div>
						</li>
						
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-8 single-right-left simpleCart_shelfItem">
				
				<form id="#frmprenda" action="../src/detallepedido/DetallePedidoController.php" class="form-horizontal" method="POST">
					<h3><?php echo $descripcion; ?></h3>
					<br>
					
			        
			        <div class="form-group">
			          <label class="col-sm-2 control-label" for="idcolor">Color</label>
			          <div class="col-sm-4">
			          	<select class="form-control" id="idcolor" name="idcolor" >
			          		<option value="">Seleccionar</option>
						
						<?php 	
							$i = 0;
							foreach ( $data->{"data"} as $item ) {	
								echo "<option data-idproducto='".$idproducto."' data-imagen='".$item->{"urlimagen"}."' value='".$item->{'idcolor'}."'>".$item->{'nombre'}."</option>";								
							} 
						?>
						</select>
			          </div>
			        </div>

			        <div class="form-group">
			          <label class="col-sm-2 control-label" for="idtalla">Talla</label>
			          <div class="col-sm-4">
			          	<select class="form-control" id="idtalla" name="idtalla" ><option value="">Seleccionar</option></select>
			          </div>
			        </div>

			        
			        <div class="form-group">
			            <label class="col-sm-2 control-label" for="precio">Precio</label>            
			            <div class="col-sm-4">
			            	<input type="text" id="prenda_precio" name="prenda_precio" value="<?php echo 'S/. '.$precio;?>" class="form-control" placeholder="descripcion" readonly>
			            </div>
			        </div>

					<div class="form-group">
			            <label class="col-sm-2 control-label" for="cantidad">Cantidad</label>            
			            <div class="col-sm-4">
			            	<input type="text" id="cantidad" name="cantidad" value="<?php echo $cantidad; ?>" class="form-control" placeholder="Ingresar Cantidad">
			            </div>
			        </div>

					<div class="form-group">
						<div class="col-sm-12 col-sm-offset-2 ">

								<fieldset>
									<input type="hidden" name="opcion" value="agregarItem" />
									<input type="hidden" name="idproducto" value="<?php echo $idproducto; ?>">
									<input type="hidden" name="descripcion" value="<?php echo $descripcion; ?>">
									<input type="hidden" name="item_precio" value="<?php echo $precio; ?>">
									<input type="hidden" id="url_imagen" name="url_imagen" value="">
									<input type="hidden" id="item_talla" name="item_talla" value="">
									<input type="hidden" id="color" name="color" value="">
									<input type="hidden" name="importe" value="0">
									<input type="submit" name="btnAgregar" value="AGREGAR" class="btn btn-success col-sm-2" />
								</fieldset>
			        	
			        	</div>
				    </div>
					
					<div class="row">
						<br>
			        	<div class="col-sm-12 mensaje ocultar">
			        		
			        	</div>
			        </div>
				</form>

							

					
		</div>
	 	<div class="clearfix"> </div>

	</div>
 </div>

 <?php
 	include 'helperhtml/footer.php'
 ?>