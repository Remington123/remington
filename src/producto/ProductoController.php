<?php 

	include 'ProductoBL.php';

	$opcion = $_POST["opcion"];
	$productoBl = null;

	switch ( $opcion ) {
		case 'listar':
			$productoBl = new ProductoBL();
			echo $productoBl->listar();
		break;

		case 'registrar':
			$productoBl = new ProductoBL();
			echo $productoBl->registrar();
		break;
	}

 ?>