<?php 

	include 'TelaBL.php';

	$opcion = $_POST["opcion"];
	$telaBl = null;

	switch ( $opcion ) {
		case 'listar':
			$telaBl = new TelaBL();
			$telaBl->listar();
		break;

		case 'registrar':
			$telaBl = new TelaBL();
			echo $telaBl->registrar();
		break;

		case 'modificar':
			$telaBl = new TelaBL();
			echo $telaBl->modificar();
		break;
	}

 ?>