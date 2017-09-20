<?php 

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');
 
	class TelaDAO implements Consultas{
		private $conexion=null;

		public function listar(){
		 	$conexion = new Conexion();
			$statement=null;
			try {			
				$cnn = $conexion->getConexion();
				$sql = " SELECT * FROM tela WHERE estado = 1;";
				$statement=$cnn->prepare($sql);
				$statement->execute();
				$data["data"] = [];//arreglo vacio
				while ($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$data["data"][] = $resultado;
				}
				return json_encode($data);
			} catch (Throwable $e) {
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
		return false;
		}

		public function llenarCombo(){
		 	$conexion = new Conexion();
			$statement=null;
			try {			
				$cnn = $conexion->getConexion();
				$sql = " SELECT idtela, descripcion FROM tela WHERE estado = 1;";
				$statement=$cnn->prepare($sql);
				$statement->execute();
				$data = [];
				while ($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$data["data"][] = $resultado;
				}
				return json_encode($data);
			} catch (Throwable $e) {
					echo $e->getMessage();
			}finally{
					$statement->closeCursor();
					$conexion = null;
			}		
		}
	}
 ?>