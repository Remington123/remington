<?php 
	include 'EmpleadoBL.php';

	$opcion = $_POST["opcion"];
	$empleadoBL = null;

	switch ( $opcion ) {
		case 'listar':
			$empleadoBL = new EmpleadoBL();
			$empleadoBL->listar();
		break;
		case 'registrar':
			$empleadoBL = new EmpleadoBL();
			echo $empleadoBL->registrar();
		break;
		
		case 'modificar':
			$empleadoBL = new EmpleadoBL();
			echo $empleadoBL->modificar();
		break;
		case 'acceso':
			$empleadoBL = new EmpleadoBL();
			$empleadoBL->validarAcceso();
		break;
	}
	