<?php 

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');

	class TallaDAO implements Consultas{
		private $conexion = null;

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
			return true;
		}
	}

 ?>