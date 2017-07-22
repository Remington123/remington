<?php

include (dirname(__FILE__). '/../comunes/Conexion.php'); 
include (dirname(__FILE__). '/../comunes/Consultas.php');

class TipoUsuarioDAO implements Consultas{
	private $conexion=null;
	
	public function listar(){
		$conexion =new Conexion();
		try {
			$cnn=$conexion -> getConexion();
			$sql= "SELECT * FROM tipousuario;";
			$statement=$cnn->prepare($sql);
			$statement->execute();
			$data = [];
			while($resultado=$statement->fetch(PDO::FETCH_ASSOC)){
				$data[]=$resultado;
			}
			echo json_encode($data);
		}catch (Throwable $e) {
			echo $e->getMessage();
		}finally{
			$statement->closeCursor();
			$conexion = null;
		}
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