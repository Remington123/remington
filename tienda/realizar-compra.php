<?php 
	include '../src/detallepedido/Item.php';//incluir esta la entidad para poder mostrar 
	session_start();

	include 'helperhtml/header.php';
 ?>

 	<h1>Realizar Compra</h1>

	<?php 
		if( isset($_SESSION["carrito"]) ){
			$carrito = $_SESSION["carrito"];
	?>
			<form id="frmpedidos" method="POST">
				<table>
					<thead>
						<th>ID</th>
						<th>Nombre</th>
						<th>Imagen</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Importe</th>
						<th>Opción</th>
					</thead>
					<tbody id="tbody_pedidos">
			<?php 
				$total = 0;
				foreach ( $carrito as $p ) {
					//var_dump($carrito);
			 ?>
						<tr>
							<td><?php echo $p->idproducto; ?></td>
							<td><?php echo $p->descripcion; ?></td>
							<td>Foto</td>
							<td class='precio'><?php echo $p->precio;?></td>
							<td><?php echo $p->cantidad;?></td>
							<td class='importe'><?php echo $p->importe; ?></td>				
							<?php $total = $total + $p->importe; ?>
							<td><input type="hidden" class="data" value="<?php echo $p->cantidad; ?>"></td>
							<td><input type="hidden" class="data" value="<?php echo $p->idproducto; ?>"></td>
							<td><input type="hidden" class="data" value="<?php echo $p->descripcion; ?>"></td>
							<td><input type="hidden" class="data" value="<?php echo $p->precio;?>"></td>
							<td><input type="hidden" class="data importe" value="<?php echo $p->importe; ?>"></td>
							<td><input type="hidden" class="data" value="urlfoto"></td>
							
						</tr>
			<?php } ?>			
						<tr>
							<td colspan='5'>Total: </td>
							<td id="totalcompra"><?php echo $total ?></td>
							<td><input type="hidden" id="total" value="<?php echo $total ?>"></td>
						</tr>
					</tbody>
				</table>
			</form>
		<?php }else if( !isset($carrito) ){
			echo "No hay Items para realizar la compra";
		}
		?>


 	<h2>Cuenta Bancaria</h2>
 	<h2>Pago con Tarjetas: API de CULQUI</h2>
	
<?php include 'helperhtml/footer.php' ?>