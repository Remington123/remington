<?php 

	include 'DetalleProductoBL.php';

	$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : '';;
	$listaDetalle = ""; // variable global
	

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

			case 'listarProductoConDetalle':
				$detalleproductoBl = new DetalleProductoBL();
				echo $detalleproductoBl->listarDetalleProducto();
			break;

			case 'listarProductoDetallePorId':
				$detalleproductoBl = new DetalleProductoBL();
				$listaDetalle = $detalleproductoBl->listarProductoDetallePorId();
			break;

			default:
				echo "<script> window.location = 'categoria.php'; </script>";			
			break;
		}
	
		//header('Location: ../../tienda/categoria.php');
	

 ?>