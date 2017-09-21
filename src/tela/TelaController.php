<?php 

	include 'TelaBL.php';

	$opcion = $_POST["opcion"];
	$telaBl = null;

	switch ( $opcion ) {
		case 'listar':
			$telaBl = new TelaBL();
			echo $telaBl->listar();
		break;

		case 'registrar':
			$telaBl = new TelaBL();
			echo $telaBl->registrar();
		break;

		case 'modificar':
			$telaBl = new TelaBL();
			echo $telaBl->modificar();
		break;

		case 'eliminar':
			$telaBl = new TelaBL();
			echo $telaBl->eliminar();
		break;

		case 'combo':
			$telaBl = new TelaBL();
			echo $telaBl->llenarCombo();
		break;
	}

 ?>