<?php 

	include 'PermisoBL.php';
	$opcion = $_POST["opcion"];
	$permisoBl = null;

	switch ( $opcion ) {
		case 'listar':
			$permisoBl = new PermisoBL();
			$permisoBl->listar();
		break;

		case 'registrar':
			$permisoBl = new PermisoBL();
			echo $permisoBl->registrar();
		break;

		case 'modificar':
			$permisoBl = new PermisoBL();
			echo $permisoBl->PermisoBL();
		break;
	}

 ?>