<?php 

	include 'DetallePedidoBL.php';
	
	$opcion = $_POST["opcion"];
	$detallepedidoBl = null;

	switch ( $opcion ) {
		case 'listar':
			$detallepedidoBl = new DetallePedidoBL();
			$detallepedidoBl->listar();
		break;
		
		case 'listarPedidoConDetalle':
			$detallepedidoBl = new DetallePedidoBL();
			$detallepedidoBl->listarDetallePedido();
		break;

		case 'registrar':
			$detallepedidoBl = new DetallePedidoBL();
			echo $detallepedidoBl->registrar();
		break;

		case 'modificar':
			$detallepedidoBl = new DetallePedidoBL();
			echo $detallepedidoBl->modificar();
		break;

		case 'eliminar':
			$detallepedidoBl = new DetallePedidoBL();
			echo $detallepedidoBl->eliminar();
		break;
	}

 ?>