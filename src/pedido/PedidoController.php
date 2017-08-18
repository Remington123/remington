<?php 

	include 'PedidoBL.php';

	$opcion = $_POST["opcion"];
	$pedidoBl = null;

	switch ( $opcion ) {
		case 'listar':
			$pedidoBl = new PedidoBL();
			echo $pedidoBl->listar();
		break;

		case 'registrar':
			$pedidoBl = new PedidoBL();
			echo $pedidoBl->registrar();
		break;

		case 'modificar':
			$pedidoBl = new PedidoBL();
			echo $pedidoBl->modificar();
		break;
	}

 ?>