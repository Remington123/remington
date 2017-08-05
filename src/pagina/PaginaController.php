<?php 

	include 'PaginaBL.php';

 	$opcion = $_POST["opcion"];
 	$paginaBL = null;
 	$lista = "";//variable global

 	switch ( $opcion ) {
 		case 'listar':
 			$paginaBL = new PaginaBL();
 			$lista = $paginaBL->listar();
 			//var_dump($lista);
 		break;
 		
 		case 'registrar':
 			$paginaBL = new PaginaBL();
 			echo $paginaBL->registrar();
 		break;

 		case 'modificar':
 			$paginaBL = new PaginaBL();
 			echo $paginaBL->modificar();
 		break;
 	} 
	

 ?>