<?php 

	include 'DetallePedidoBL.php';
	
	$opcion = $_POST["opcion"];
	$detallepedidoBl = null;

	switch ( $opcion ) {
		case 'listar':
			$detallepedidoBl = new DetallePedidoBL();
			echo $detallepedidoBl->listar();
		break;
		
		case 'listarPedidoConDetalle':
			$detallepedidoBl = new DetallePedidoBL();
			echo $detallepedidoBl->listarDetallePedido();
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

		case 'agregarItem':
			session_start();
			$detallepedidoBl = new DetallePedidoBL();
			//var_dump( $detallepedidoBl->agregarItem() );
			$detallepedidoBl->agregarItem();
			header('Location: ../../tienda/index.php');
		break;

		case 'actualizarCarrito':
			session_start();
			$detallepedidoBl = new DetallePedidoBL();
			$detallepedidoBl->actualizarCarrito();
			//header('Location: ../../tienda/realizar-compra.php');
		break;

	}

 ?>