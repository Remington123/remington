<?php 

	include 'DetalleProductoBL.php';

	$opcion = $_POST["opcion"];
	$detalleproductoBl = null;

	switch ( $opcion ) {
		case 'listar':
			$detalleproductoBl = new DetalleProductoBL();
			echo $detalleproductoBl->listar();
		break;

		case 'registrar':
			$detalleproductoBl = new DetalleProductoBL();
			echo $detalleproductoBl->registrar();
		break;

		case 'modificar':
			$detalleproductoBl = new DetalleProductoBL();
			echo $detalleproductoBl->modificar();
		break;

		case 'eliminar':
			$detalleproductoBl = new DetalleProductoBL();
			echo $detalleproductoBl->eliminar();
		break;
	}

 ?>