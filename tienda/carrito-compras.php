<?php 
	include '../src/detallepedido/Item.php';//incluir esta la entidad para poder mostrar los datos
	session_start();
	//header('Location: '.$_SERVER["PHP_SELF"]);
	//echo $_SERVER["PHP_SELF"];
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mi Carrito</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>

	<h2>Lista de Productos agregados al carrito de compras</h2>
<a href="http://www.worldanimalfoundation.net/f/wolf.pdf">PDF</a>
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
				$indice = 0;
				foreach ( $carrito as $p ) {
					//var_dump($carrito);
			 ?>
						<tr>
							<td><?php echo $p->idproducto; ?></td>
							<td><?php echo $p->descripcion; ?></td>
							<td>Foto</td>
							<td class='precio'><?php echo $p->precio;?></td>
							<td>
								<input type='text' name='cantidad' class='cantidad data' min='1' value="<?php echo $p->cantidad;?>">
							</td>
							<td class='importe'><?php echo $p->importe; ?></td>
							<td><button type="button" data-indice-item="<?php echo $indice; ?>" class="eliminar">Eliminar</button></td>
							<?php $total = $total + $p->importe; ?>
							
							<td><input type="hidden" class="data" value="<?php echo $p->idproducto; ?>"></td>
							<td><input type="hidden" class="data" value="<?php echo $p->descripcion; ?>"></td>
							<td><input type="hidden" class="data" value="<?php echo $p->precio;?>"></td>
							<td><input type="hidden" class="data importe" value="<?php echo $p->importe; ?>"></td>
							<td><input type="hidden" class="data" value="urlfoto"></td>
							<?php $indice++; ?>
						</tr>
			<?php } ?>			
						<tr>
							<td colspan='5'>Total: </td>
							<td id="totalcompra"><?php echo $total ?></td>
							<td><input type="hidden" id="total" value="<?php echo $total ?>"></td>
						</tr>
					</tbody>
				</table>
				<div>
					<button type="button" id="btnIrCaja">Ir a Caja</button>
				</div>
			</form>
		<?php }else if( !isset($carrito) ){
			echo "No hay Items agregados";
		}
		?>


	<script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
	<script>

		$(function(){
			calcularImporte();
			//meter unputs hidden para poder enviar los datos a ir a Caja
			enviarData();
			eliminarItem();
		});

		function eliminarItem(){
			$("tr .eliminar").on("click", function(){
				/*La propiedad dataset, almacena aquellos valores, de las propiedades personalizadas que hemos propuesto: data-indice-item*/
				var indice = $(this)[0].dataset.indiceItem;
				$.ajax({
					method:"POST",
					url:"../src/detallepedido/DetallePedidoController.php",
					data:{opcion: "eliminarItem", indice: indice}
				}).done( function( info ){
					console.log( info );
					window.location = "carrito-compras.php";
				});

			});
		}

		function enviarData(){
			$("#btnIrCaja").on("click", function(){
				//console.log( obtenerDataTabla("#tbody_pedidos tr") );
				var items = obtenerDataTabla("#tbody_pedidos tr");
				var data = {
					pedido: items,
					total: $("#total").val()
				};
				console.log(data);

				$.ajax({
					method:"POST",
					url: "../src/detallepedido/DetallePedidoController.php",
					data:{ opcion: "actualizarCarrito", data: JSON.stringify(data)}
				}).done(function( info ){
					window.location = "realizar-compra.php";
				})
			});
		}

//hacer validacion en el servidor $carrito["idproducto"] == datoenviado, entonces actualiza el resto

		function obtenerDataTabla(tbody){
			var sumarImporte = 0, contador = 0, 
				numeroCampos = 6;//Todos menos el total
			var pedido = [], item = [];
		    $(tbody).find('td input.data').each(function (i) {
		    	contador++;
		        if( contador < numeroCampos ){
		        	//console.log("fila "+i+": "+ $(this).val() );
		        	item.push( $(this).val() );
		        }else{
		        	contador = 0;
		        	//console.log("fila "+i+": "+ $(this).val() );
		        	item.push( $(this).val() );
		        	pedido.push( item );
		        	item = [];//setear el arreglo data para la siguiente fila
		        }
		    });
		    
		    return pedido;
		}

		function calcularImporte(){
			$("tr .cantidad").on("change", function(){
				var cantidad = parseInt( $(this).val() ),
					precio = $(this).parents("tr")[0].children[3].innerHTML,
					importe = $(this).parents("tr")[0].children[5];
					importe.innerText = cantidad * parseFloat(precio);

				var importe_enviar = $(this).parents("tr")[0].children[10].children[0];
				importe_enviar.value = importe.innerText;
				console.log(importe_enviar);

				var total = sumarImportes("#tbody_pedidos tr");
				$("#totalcompra").text( total );
				$("#total").val( total );//total a enviar
			});
		}


		function sumarImportes(tbody) {
		    var sumarImporte = 0;
		    $(tbody).find('td.importe').each(function (i) {		    
		        sumarImporte = sumarImporte + parseFloat( $(this).text() );    
		    });
		    return sumarImporte;		    
		}
	</script>
</body>
</html>