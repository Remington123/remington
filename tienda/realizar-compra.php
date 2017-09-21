<?php 
	include '../src/detallepedido/Item.php';//incluir esta la entidad para poder mostrar 
	//session_start();

	include 'helperhtml/header.php';
 ?>
 	<div class="container">
		<div class="col-sm-12">
	<br>

 	<h2 id="h2.-bootstrap-heading">Realizar Compra</h2>
	<br>
	<?php 
		/*VALIDAR QUE EL CLIENTE ESTE LOGEADO*/
		if( isset($_SESSION["carrito"]) ){
			$carrito = $_SESSION["carrito"];
	?>
			<form id="frmguardarpedido" method="POST">
				<table class="table ">
					<thead>
						<th>ID</th>
						<th>Imagen</th>
						<th>Nombre</th>
						<th>Color</th>
						<th>Talla</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Importe</th>
						
					</thead>
					<tbody id="tbody_pedidos">
			<?php 
				$total = 0;
				foreach ( $carrito as $p ) {
					//var_dump($carrito);
			 ?>			

						<tr>
							<td><?php echo $p->idproducto; ?></td>							
							<td><img src="<?php echo $p->urlimagen; ?>" width="100" height="80" ></td>
							<td><?php echo $p->descripcion; ?></td>							
							<td ><?php echo $p->color;?></td>
							<td ><?php echo $p->talla;?></td>
							<td class='precio'><?php echo $p->precio;?></td>
							<td><?php echo $p->cantidad;?></td>
							<td class='importe'><?php echo $p->importe; ?></td>				
							<?php $total = $total + $p->importe; ?>
							<td><input type="hidden" name="cantidad" id="cantidad" class="data" value="<?php echo $p->cantidad; ?>"></td>
							<td><input type="hidden" name="idproducto" id="idproducto" class="data" value="<?php echo $p->idproducto; ?>"></td>
							<td><input type="hidden" name="descripcion" id="descripcion" class="data" value="<?php echo $p->descripcion; ?>"></td>
							<td><input type="hidden" name="precio" id="precio" class="data" value="<?php echo $p->precio;?>"></td>
							<td><input type="hidden" name="importe" id="importe" class="data importe" value="<?php echo $p->importe; ?>"></td>
							<td><input type="hidden" name="urlimagen" id="urlimagen" class="data" value="<?php echo $p->urlimagen; ?>"></td>
							<td><input type="hidden" name="idtalla" id="idtalla" class="data" value="<?php echo $p->idtalla; ?>"></td>
							<td><input type="hidden" name="idcolor" id="idcolor" class="data" value="<?php echo $p->idcolor; ?>"></td>
							
						</tr>
			<?php } ?>			
						<tr>
							<td colspan='7'><strong>Total:</strong> </td>
							<td id="totalcompra"><strong><?php echo $total ?></strong></td>
							<td><input type="hidden" id="total" value="<?php echo $total ?>"></td>
						</tr>
					</tbody>
				</table>
			<?php if( !empty( $idcliente ) ){ ?>
 				<button type="submit" class="btn btn-primary">Pagar</button>
 			<?php }else{ echo "<strong class='text-danger'>¡Debes Iniciar Sesión!</strong>";}?>

			</form>
		<?php }else if( !isset($carrito) ){
			echo "No hay Items para realizar la compra";
		}
		?>
 	<h4>Cuenta Bancaria</h4>
 	<h4>Pago con Tarjetas: API de CULQUI</h4>
	</div>
</div>
	
<?php include 'helperhtml/footer.php' ?>