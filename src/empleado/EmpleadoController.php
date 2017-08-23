<?php 
	include 'EmpleadoBL.php';
	
	$opcion = $_POST["opcion"];
	$empleadoBL = null;

	switch ( $opcion ) {
		case 'listar':
			$empleadoBL = new EmpleadoBL();
			echo $empleadoBL->listar();
		break;
		case 'registrar':
			$empleadoBL = new EmpleadoBL();
			echo $empleadoBL->registrar();
		break;
		
		case 'modificar':
			$empleadoBL = new EmpleadoBL();
			echo $empleadoBL->modificar();
		break;

		case 'eliminar':
			$empleadoBL = new EmpleadoBL();
			echo $empleadoBL->eliminar();
		break;

		case 'acceso':
			session_start();
			$empleadoBL = new EmpleadoBL();
			var_dump( $empleadoBL->validarAcceso() );
			header('Location: ../../dashboard/panel.php');
		break;
	}
	