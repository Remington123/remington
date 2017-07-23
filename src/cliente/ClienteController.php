<?php 
	include 'ClienteBL.php';

	$opcion = $_POST["opcion"];
	$clienteBl = null;

	switch ( $opcion ) {
		case 'listar':
			$clienteBl = new ClienteBL();
			$clienteBl->listar();
		break;
		case 'registrar':
			$clienteBl = new ClienteBL();
			echo $clienteBl->registrar();
		break;
		
		case 'modificar':
			$clienteBl = new ClienteBL();
			echo $clienteBl->modificar();
		break;
	}
	
?>
