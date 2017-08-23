<?php 

	include 'ModeloBL.php';

	$opcion = $_POST["opcion"];
	$modeloBl = null;

	switch ( $opcion ) {
		case 'listar':
			$modeloBl = new ModeloBL();
			$modeloBl->listar();
		break;

		case 'registrar':
			$modeloBl = new ModeloBL();
			echo $modeloBl->registrar();
		break;

		case 'modificar':
			$modeloBl = new ModeloBL();
			echo $modeloBl->modificar();
		break;

		case 'eliminar':
			$modeloBl = new ModeloBL();
			echo $modeloBl->eliminar();
		break;

		case 'combo':
			$modeloBl = new ModeloBL();
			echo $modeloBl->llenarCombo();
		break;
	}

 ?>