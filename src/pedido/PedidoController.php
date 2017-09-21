<?php 

	include 'PedidoBL.php';

	$opcion = $_POST["opcion"];
	$pedidoBl = null;

	switch ( $opcion ) {
		case 'listar':
			$pedidoBl = new PedidoBL();
			echo $pedidoBl->listar();
		break;

		case 'listarPedido':
			$pedidoBl = new PedidoBL();
			echo $pedidoBl->listarPedido();
		break;

		case 'registrar':
			$pedidoBl = new PedidoBL();
			echo $pedidoBl->registrar();
		break;

		case 'modificar':
			$pedidoBl = new PedidoBL();
			echo $pedidoBl->modificar();
		break;

		case 'eliminar':
			$pedidoBl = new PedidoBL();
			echo $pedidoBl->eliminar();
		break;

		case 'guardar':
			session_start();
			$pedidoBl = new PedidoBL();
			echo $pedidoBl->guardarPedido();
			//session_destroy();
			//header('Location: ../../tienda/realizar-compra.php');
		break;
	}

 ?>