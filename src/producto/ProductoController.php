<?php 

	include 'ProductoBL.php';

	$opcion = $_POST["opcion"];
	$productoBl = null;

	switch ( $opcion ) {
		case 'listar':
			$productoBl = new ProductoBL();
			echo $productoBl->listar();
		break;

		case 'listarProducto':
			$productoBl = new ProductoBl();
			echo $productoBl->listarProducto();
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

		case 'listarProductoCompleto':
			$productoBl = new ProductoBL();
			echo $productoBl->listarProductoCompleto();
		break;

		case 'listarPorCategoria':
			$productoBl = new ProductoBL();
			echo $productoBl->listarPorCategoria();
		break;

		case 'asignar':
			$productoBl = new ProductoBL();
			echo $productoBl->asignar();
		break;

		case 'buscar':
			$productoBl = new ProductoBL();
			echo $productoBl->buscar();
		break;
	}

 ?>