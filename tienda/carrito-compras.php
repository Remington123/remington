<?php 

	include '../src/detallepedido/Item.php';//incluir esta la entidad para poder mostrar los datos
	//session_start();
	//header('Location: '.$_SERVER["PHP_SELF"]);
	//echo $_SERVER["PHP_SELF"];

	include 'helperhtml/header.php'
 ?>


	<!-- NO TOCAR -->
	<div class="container">
		<div class="col-sm-12">
	<br>	
	<h2 id="h2.-bootstrap-heading">Productos agregados al carrito de compras</h2>
	<br>
	<?php 
		if( isset($_SESSION["carrito"]) ){
			$carrito = $_SESSION["carrito"];

			//var_dump($carrito);
	?>
			<form id="frmpedidos" method="POST">
				<table class="table">
					<thead>
						<th>ID</th>
						<th>Imagen</th>
						<th>Nombre</th>
						<th>Talla</th>
						<th>Color</th>
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
							<td> <img src="<?php echo $p->urlimagen; ?>" width="100" height="80" > </td>
							<td><?php echo $p->descripcion; ?></td>
							<td><?php echo $p->talla;?></td>
							<td><?php echo $p->color;?></td>
							<td class='precio'><?php echo $p->precio;?></td>

							<td>
								<input type='text' name='cantidad' class='cantidad data' min='1' value="<?php echo $p->cantidad;?>">
							</td>
							<td class='importe'><?php echo $p->importe; ?></td>
							<td><button type="button" data-indice-item="<?php echo $indice; ?>" class="eliminar btn btn-danger">Eliminar</button></td>
							<?php $total = $total + $p->importe; ?>
							
							<td><input type="hidden" class="data" value="<?php echo $p->idproducto; ?>"></td>
							<td><input type="hidden" class="data" value="<?php echo $p->descripcion; ?>"></td>
							<td><input type="hidden" class="data" value="<?php echo $p->precio;?>"></td>
							<td><input type="hidden" class="data importe" value="<?php echo $p->importe; ?>"></td>
							<td><input type="hidden" class="data" value="<?php echo $p->urlimagen; ?>"></td>
							<td><input type="hidden" class="data" value="<?php echo $p->idtalla; ?>"></td>
							<td><input type="hidden" class="data" value="<?php echo $p->idcolor; ?>"></td>
							<?php $indice++; ?>
						</tr>
			<?php } ?>			
						<tr>
							<td colspan='7'><strong>Total:</strong> </td>
							<td id="totalcompra"><strong><?php echo $total ?><strong></td>
							<td><input type="hidden" id="total" value="<?php echo $total ?>"></td>
						</tr>
					</tbody>
				</table>
				<div>
					<button type="button" class="btn btn-primary" id="btnIrCaja">Ir a Caja</button>
					<br><br>
				</div>
			</form>
		<?php }else if( !isset($carrito) ){
			echo "No hay Items agregados";
		}
		?>
	<!-- NO TOCAR -->
	</div>
</div>


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
				numeroCampos = 8;//Todos menos el total
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
			$("tr .cantidad").on("change", function(e){
				e.preventDefault();
				var cantidad = parseInt( $(this).val() ),
					precio = $(this).parents("tr")[0].children[5].innerHTML,//5, celda de precio
					importe = $(this).parents("tr")[0].children[7];//7, celda de importe
					importe.innerText = cantidad * parseFloat(precio);
				
				console.log( $(this).parents("tr"));

				var importe_enviar = $(this).parents("tr")[0].children[12].children[0];//12, celda de importe
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

	<!-- FIN NO TOCAR -->

	

<?php include 'helperhtml/footer.php' ?>