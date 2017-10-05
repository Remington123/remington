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



 	$pie .="	<!-- Trigger the modal with a button -->
				  <button type='button' class='btn btn-info' data-toggle='modal' data-target='#modalpagar'>Comprar</button>

				  <!-- Modal -->
				  <div class='modal fade' id='modalpagar' role='dialog'>
				    <div class='modal-dialog'>
				    
				      <!-- Modal content-->
				      <div class='modal-content'>
				        <div class='modal-header'>
				          <button type='button' class='close' data-dismiss='modal'>&times;</button>
				          <h4 class='modal-title'>Realizar Pago</h4>
				        </div>
				        <div class='modal-body'>
			         		<div>
							    <label>
							         <span>Correo Electrónico</span>
							      <input type='text' size='50' name='email' value='".$email."' data-culqi='card[email]' id='card[email]'>
							    </label>
							  </div>
							  <input type='hidden' id='cliente_email' name='cliente_email' value='".$email."'>
							  <input type='hidden' id='monto' name='monto' value='".$total."'>
							  <div class='form-group'>
							    <label>
							      <span>Número de tarjeta</span>
							      <input type='text' size='20' data-culqi='card[number]'  id='card[number]'>
							    </label>
							  </div>
							  <div class='form-group'>
							    <label>
							      <span>CVV</span>
							      <input type='text' size='4' data-culqi='card[cvv]' id='card[cvv]'>
							    </label>
							  </div>
							  <div class='form-group'>
							    <label>
							      <span>Fecha expiración (MM/YYYY)</span>
							      <input type='text' size='2' data-culqi='card[exp_month]' id='card[exp_month]'>
							    </label>
							    <span>/</span>
							    <input type='text' size='4' data-culqi='card[exp_year]' id='card[exp_year]'>
							  </div>
				        </div>
				        <div class='modal-footer'>
				          <button type='submit' class='btn btn-primary'>Pagar</button>
				        </div>
				      </div>
				      
				    </div>
				  </div>";
 			 }else{ 
 	$pie .="	<strong class='text-danger'>¡Debes Iniciar Sesión!</strong>";
 			}
	$pie .=" 	</form>";
		}else if( !isset($carrito) ){
	$pie .="	<strong class='text-danger'>No hay Items para realizar la compra</strong>";
		}
		
 	$pie .="
			</div>
		</div>";
	

	echo $cabecera.$cuerpo.$oculto.$pie;

include 'helperhtml/footer.php';

	echo  "<!-- Incluyendo .js de Culqi-->
			<script src='https://checkout.culqi.com/v2'></script>

			<script src='js/pago.js' ></script>
			
			<script>		

				$(function(){
  					//alert('Culquiii');

					Culqi.publicKey = 'pk_test_PnizAP8dlMp7uAXV';
					Culqi.init();
					pagar();

				});

			</script>";

?>