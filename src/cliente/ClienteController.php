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

		case 'eliminar':
			$clienteBl = new ClienteBL();
			echo $clienteBl->eliminar();
		break;

		case 'acceso':
			session_start();
			$clienteBl = new ClienteBL();
			$clienteBl->validarAcceso();
			header('Location: ../../tienda/index.php');
		break;

		case 'cerrarsesion':
			session_start();
			$clienteBl = new ClienteBL();
			$clienteBl->cerrarSesion();
			//session_destroy();			
			header('Location: ../../tienda/index.php');
		break;
	}
	
?>
