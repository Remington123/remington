<?php 

	include 'TipoPagoBL.php';

	$opcion = $_POST["opcion"];
	$tipopagoBl = null;

	switch ( $opcion ) {
		case 'listar':
			$tipopagoBl = new TipoPagoBL();
			$tipopagoBl->listar();
		break;

		case 'registrar':
			$tipopagoBl = new TipoPagoBL();
			echo $tipopagoBl->registrar();
		break;

		case 'modificar':
			$tipopagoBl = new TipoPagoBL();
			echo $tipopagoBl->modificar();
		break;
	}

 ?>