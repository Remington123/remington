<?php 

 	include 'CategoriaProductoBL.php';

 	$opcion = $_POST["opcion"];
 	$categoriaproductoBl = null;

 	switch ( $opcion ) {
 		case 'listar':
 			$categoriaproductoBl = new 	CategoriaProductoBL();
 			$categoriaproductoBl->listar();
 		break;
 		
 		case 'registrar':
 			$categoriaproductoBl = new CategoriaProductoBL();
 			echo $categoriaproductoBl->registrar();
 		break;

 		case 'modificar':
 			$categoriaproductoBl = new CategoriaProductoBL();
 			echo $categoriaproductoBl->modificar();
 		break;


 	} 

 ?>