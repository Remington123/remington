<?php 

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');

	class TallaDAO implements Consultas{
		private $conexion = null;

		public function listar(){
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
				$sql = "SELECT idtalla, t.descripcion, t.idcategoriaproducto, cp.descripcion as categoria, t.estado  		FROM talla t 
						INNER JOIN categoriaproducto cp
						ON t.idcategoriaproducto = cp.idcategoriaproducto;";
				$statement=$cnn->prepare($sql);
				$statement->execute();

				$data = [];//arreglo vacio
				while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$data["data"][] = $resultado;
				}
				echo json_encode($data);
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

		public function llenarCombo( $idcategoriaproducto ){
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
				$sql = "SELECT * FROM talla WHERE idcategoriaproducto = :idcategoriaproducto;";
				$statement=$cnn->prepare($sql);
				$statement->bindParam(":idcategoriaproducto", $idcategoriaproducto, PDO::PARAM_INT);
				$statement->execute();

				$data = [];
				while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$data["data"][] = $resultado;
				}
				return json_encode($data);
			}catch (Throwable $e) {
				return $e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
		}	
	}

 ?>