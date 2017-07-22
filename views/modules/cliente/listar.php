<?php 
	
	$script = "/js/cliente.js";

	$content = '<h1 class="text-center">Soy el Listado de Cliente</h1>';

	$path = ["content"=>$content, "script"=>$script];
	echo json_encode( $path );

 ?>
