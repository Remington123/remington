<?php 

	include 'DetallePedidoBL.php';
	
	$opcion = $_POST["opcion"];
	$detallepedidoBl = null;

	switch ( $opcion ) {
		case 'listar':
			$detallepedidoBl = new DetallePedidoBL();
			$detallepedidoBl->listar();
		break;
		
		case 'registrar':
			$detallepedidoBl = new DetallePedidoBL();
			echo $detallepedidoBl->registrar();
		break;

		case 'modificar':
			$detallepedidoBl = new DetallePedidoBL();
			echo $detallepedidoBl->modificar();
		break;
	}

 ?>