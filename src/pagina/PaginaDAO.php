<?php 

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__). '/../comunes/Consultas.php');

	class PaginaDAO implements Consultas{

		public function listar(){		
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
				$sql = "SELECT idmodulo, nombre FROM modulo;";
				$statement=$cnn->prepare($sql);
				$statement->execute();

				$data = [];//arreglo vacio
				while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$data["modulo"][] = $resultado;
				}

				$sql = "SELECT * FROM pagina;";
				$statement=$cnn->prepare($sql);
				$statement->execute();

				while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$data["data"][] = $resultado;
				}

				return (json_encode($data));
			}catch (Throwable $e) {
				return $e->getMessage();
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