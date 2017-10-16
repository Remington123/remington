<?php 
	include '../src/detallepedido/Item.php';//incluir esta la entidad para poder mostrar 
	session_start();

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'vendor/autoload.php';

	$correo = new PHPMailer();

	try {
		if( isset( $_POST["email"] ) ){	
				//Server settings
			    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
			    $correo->isSMTP();                                      // Set correoer to use SMTP
			    $correo->Host = 'p3plcpnl0806.prod.phx3.secureserver.net';  // Specify main and backup SMTP servers
			    $correo->SMTPAuth = true;                               // Enable SMTP authentication
			    $correo->Username = 'administrador@remyngton.com';                 // SMTP username
			    $correo->Password = 'administrador123';                           // SMTP password
			    $correo->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			    $correo->Port = 465;                                    // TCP port to connect to

				//Recipients
				$correo->setFrom("administrador@remyngton.com", "REMYNGTON");
				$correo->addAddress( $_POST["email"] );
				$correo->addAddress('geovanny.j.rios@gmail.com');

				//Content
				$correo->isHTML(true);
				$correo->Subject = 'Lista de Productos Comprados';
				//$correo->Subject = 'PHPMailer GMail SMTP Prueba';
				//$mensaje = "<h3>".$_POST["mensaje"]."</h3>";

	$cabecera = "";
	$cuerpo = "";
	$pie="";
	$mensaje = "";

	$cabecera .="<h2>Lista de Productos</h2>
				<br>";
		if( isset($_SESSION['carrito']) ){
			$carrito = $_SESSION['carrito'];

			$cabecera .="<table class='table '>
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
								</tr>
							</tbody>
						</table>";
				}else if( !isset($carrito) ){
					$pie .="	No hay Items para realizar la compra";
				}		

				$mensaje = $cabecera.$cuerpo.$pie;

				$correo->Body = $mensaje;
				//$correo->AltBody = 'This is the body in plain text for non-HTML mail clients';

				if ( !$correo->send() ) {
				    echo "error";
				} else {
				    echo "bien";

				    //aquí generar el comprobante de pago automáticamente y guardarlo en la BD
				    $_SESSION["carrito"] = array();
					unset($_SESSION["carrito"]);
				}							
		}
	} catch (Exception $e) {
		echo 'Message could not be sent.';
    	echo 'Mailer Error: ' . $mail->ErrorInfo;
	}

 ?>