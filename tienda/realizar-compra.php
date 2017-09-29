<?php 
	include '../src/detallepedido/Item.php';//incluir esta la entidad para poder mostrar 
	//session_start();

	include 'helperhtml/header.php';

	$cabecera = "";
	$cuerpo = "";
	$pie = "";
	$oculto ="";
	$mensaje = "";

	$cabecera .="<div class='container'>
			<div class='col-sm-12'>
			<br>

 			<h2 id='h2.-bootstrap-heading'>Realizar Compra</h2>
			<br>";
		if( isset($_SESSION['carrito']) ){
			$carrito = $_SESSION['carrito'];

	$cabecera .="	<form id='frmguardarpedido' method='POST'>
				<input type='hidden' id='enviar' name='enviar' value='1'>
				<table class='table '>
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
					<tbody id='tbody_pedidos'>";
					$total = 0;
					foreach ( $carrito as $p ) {
						//var_dump($carrito);
		$cuerpo .="			<tr>
							<td>".$p->idproducto."</td>							
							<td><img src='". $p->urlimagen."' width='100' height='80' ></td>
							<td>".$p->descripcion."</td>							
							<td>".$p->color."</td>
							<td>".$p->talla."</td>
							<td class='precio'>".$p->precio."</td>
							<td>".$p->cantidad."</td>
							<td class='importe'>".$p->importe."</td>";
							$total = $total + $p->importe;
		$cuerpo .="				<td><input type='hidden' name='cantidad' id='cantidad' class='data' value='".$p->cantidad."'></td>
							<td><input type='hidden' name='idproducto' id='idproducto' class='data' value='".$p->idproducto."'></td>
							<td><input type='hidden' name='descripcion' id='descripcion' class='data' value='".$p->descripcion."'></td>
							<td><input type='hidden' name='precio' id='precio' class='data' value='".$p->precio."'></td>
							<td><input type='hidden' name='importe' id='importe' class='data importe' value='".$p->importe."'></td>
							<td><input type='hidden' name='urlimagen' id='urlimagen' class='data' value='".$p->urlimagen."'></td>
							<td><input type='hidden' name='idtalla' id='idtalla' class='data' value='".$p->idtalla."'></td>
							<td><input type='hidden' name='idcolor' id='idcolor' class='data' value='".$p->idcolor."'></td>						
						</tr>";
				 } 		
		$cuerpo .="			<tr>
							<td colspan='7'><strong>Total:</strong> </td>
							<td id='totalcompra'><strong>".$total."</strong></td>
							<td><input type='hidden' id='total' value='".$total."'></td>
							<input type='hidden' id='email' name='email' value='".$email."'>
							<input type='hidden' id='idcliente' name='idcliente' value='".$idcliente."'>
						</tr>
					</tbody>
				</table>";
			 if( !empty( $idcliente ) ){
			 	$mensaje = $cabecera.$cuerpo;
	//$oculto.= "		<input type='hidden' id='mensajecorreo' name='mensajecorreo' value='".$mensaje."'>";
			 	//enviarCorreo( $email, $mensaje );

 	$pie .="	<button type='submit' class='btn btn-primary'>Pagar</button>";
 			 }else{ 
 	$pie .="	<strong class='text-danger'>¡Debes Iniciar Sesión!</strong>";
 			}
	$pie .=" 	</form>";
		}else if( !isset($carrito) ){
	$pie .="	No hay Items para realizar la compra";
		}
		
 	$pie .="	<h4>Cuenta Bancaria</h4>
 			<h4>Pago con Tarjetas: API de CULQUI</h4>
			</div>
		</div>";
	

	echo $cabecera.$cuerpo.$oculto.$pie;

include 'helperhtml/footer.php';

?>