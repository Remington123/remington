<?php 
	include 'TipoUsuarioBL.php';

	$opcion = $_POST["opcion"];
	$tipousuarioBL = null;

	switch ( $opcion ) {
		case 'listar':
			$tipousuarioBL = new TipoUsuarioBL();
			$tipousuarioBL->listar();
		break;
		case 'registrar':
			$tipousuarioBL = new TipousuarioBL();
			echo $tipousuarioBL->registrar();
		break;		
		case 'modificar':
			$tipousuarioBL = new TipousuarioBL();
			echo $tipousuarioBL->modificar();
		break;
	}
	