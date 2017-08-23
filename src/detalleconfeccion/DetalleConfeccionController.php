<?php 

	include 'DetalleConfeccionBL.php';

	$opcion = $_POST["opcion"];
	$detalleconfeccionBl = null; 

	switch ( $opcion ) {
		case 'listar':
			$detalleconfeccionBl = new DetalleConfeccionBL();
			$detalleconfeccionBl->listar();
		break;

		case 'registrar':
			$detalleconfeccionBl = new DetalleConfeccionBL();
			echo $detalleconfeccionBl->registrar();
		break;

		case 'modificar':
			$detalleconfeccionBl = new DetalleConfeccionBL();
			echo $detalleconfeccionBl->modificar();
		break;

		case 'eliminar':
		$detalleconfeccionBl = new DetalleConfeccionBL();
		echo $detalleconfeccionBl->eliminar();
		break;

	}

 ?>