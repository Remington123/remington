<?php 

	include 'ConfeccionBL.php';
	
	$opcion = $_POST["opcion"];
	$confeccionBl = null;

	switch ( $opcion ) {
		case 'listar':
			$confeccionBl = new ConfeccionBL();
			$confeccionBl->listar();
		break;

		case 'registrar':
			$confeccionBl = new ConfeccionBL();
			echo $confeccionBl->registrar();
		break;

		case 'modificar':
			$confeccionBl = new ConfeccionBL();
			echo $confeccionBl->modificar();
		break;

		case 'eliminar':
			$confeccionBl = new ConfeccionBL();
			echo $confeccionBl->eliminar();
		break;

	}

 ?>







