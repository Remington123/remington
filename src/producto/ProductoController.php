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

		case 'modificar':
			$productoBl = new ProductoBL();
			echo $productoBl->modificar();
		break;

		case 'eliminar':
			$productoBl = new ProductoBL();
			echo $productoBl->eliminar();
		break;

		case 'listarPorTipo':
			$productoBl = new ProductoBL();
			echo $productoBl->listarPorTipo();
		break;
		}

 ?>