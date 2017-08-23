<?php 

	include 'ComprobantePagoBL.php';

	$opcion = $_POST["opcion"];
	$comprobantepagoBl = null;

	switch ( $opcion ) {
		case 'listar':
			$comprobantepagoBl = new ComprobantePagoBL();
			$comprobantepagoBl->listar();
		break;

		case 'registrar':
			$comprobantepagoBl = new ComprobantePagoBL();
			echo $comprobantepagoBl->registrar();
		break;

		case 'modificar':
			$comprobantepagoBl = new ComprobantePagoBL();
			echo $comprobantepagoBl();
		break;

		case 'eliminar':
			$comprobantepagoBl = new ComprobantePagoBL();
			echo $comprobantepagoBl->eliminar();
		break;
	}
?>