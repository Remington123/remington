<?php 
 include (dirname(__FILE__). '/../comunes/Conexion.php'); 
 include (dirname(__FILE__) . '/../comunes/Consultas.php');

	class CategoriaProductoDAO implements Consultas{
		public function listar(){
			echo "listar";
		}
		public function registrar($objeto) : bool{
			return true;
		}
		public function modificar($objeto) : bool{
			return true;
		}
		public function eliminar(int $id) : bool{
			return false;
		}

	}
	$dao=new CategoriaProductoDAO();
	$dao-> listar();

	var_dump($dao-> registrar("objeto"));

	var_dump($dao-> eliminar(1));
 ?>