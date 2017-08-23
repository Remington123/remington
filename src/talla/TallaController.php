<?php 

	include 'TallaBL.php';

	$opcion = $_POST["opcion"];
	$tallaBl = null;

	switch ( $opcion ) {
		case 'listar':
			$tallaBl = new TallaBL();
			$tallaBl->listar();
		break;

		case 'registrar':
			$tallaBl = new TallaBL();
			echo $tallaBl->registrar();
		break;

		case 'modificar';
			$tallaBl = new TallaBL();
			echo $tallaBl->modificar();
		break;

		case 'eliminar':
			$tallaBl = new TallaBL();
			echo $tallaBl->eliminar();
		break;

		case 'combo':
			$tallaBl = new TallaBL();
			echo $tallaBl->llenarCombo();
		break;
	}


 ?>