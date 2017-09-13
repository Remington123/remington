<?php 

	include 'ColorBL.php';

	$opcion = $_POST["opcion"];
	$colorBl = null;

	switch ( $opcion ) {
		case 'listar':
			$colorBl = new colorBL();
			$colorBl->listar();
		break;

		case 'combo':
			$colorBl = new colorBL();
			echo $colorBl->llenarCombo();
		break;
	}


 ?>