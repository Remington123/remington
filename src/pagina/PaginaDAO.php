<?php 

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__). '/../comunes/Consultas.php');

	class PaginaDAO implements Consultas{
		private $conexion=null;

		public function listar(){		
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
				$sql = "SELECT idmodulo, nombre FROM modulo;";
				$statement=$cnn->prepare($sql);
				$statement->execute();

				$data["data"] = [];//arreglo vacio
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
			$conexion = new Conexion();
			$respuesta = false;
			$statement = null;			
			try{
				$cnn = $conexion->getConexion();
				$sql = "INSERT INTO pagina(idmodulo, pagina, icono) VALUES (?,?,?);";
				/*Notice: Only variables should be passed by reference*/
				$idmodulo = $objeto->getIdmodulo();
				$pagina = $objeto->getPagina();
				$icono = $objeto->getIcono();
				$estado = $objeto->getEstado();

				$statement = $cnn->prepare( $sql );
				$statement->bindParam(1, $idmodulo, PDO::PARAM_STR );
				$statement->bindParam(2, $pagina, PDO::PARAM_INT );
				$statement->bindParam(3, $icono, PDO::PARAM_INT );
				$statement->bindParam(4, $estado, PDO::PARAM_INT );

				$respuesta = $statement->execute();				
			}catch(Exception $e){
				echo "EXCEPCIÓN ".$e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
			return $respuesta;
						
		}

		public function modificar($objeto) : bool{
			$conexion = new Conexion();
			$respuesta = false;
			$statement = null;			
			try{
				$cnn = $conexion->getConexion();
				$sql = "UPDATE pagina SET 
								 idmodulo = :idmodulo,
								 pagina = :pagina,
								 icono = :icono,
								 estado = :estado
						WHERE idpagina = :idpagina;";
				/*Notice: Only variables should be passed by reference*/
				$idmodulo = $objeto->getIdmodulo();
				$pagina = $objeto->getPagina();
				$icono = $objeto->getIcono();
				$estado = $objeto->getEstado();

				$statement = $cnn->prepare( $sql );
				$statement->bindParam(":idmodulo", $idmodulo, PDO::PARAM_STR );
				$statement->bindParam(":pagina", $pagina, PDO::PARAM_INT );
				$statement->bindParam(":icono", $icono, PDO::PARAM_INT );
				$statement->bindParam(":estado", $estado, PDO::PARAM_INT );

				$respuesta = $statement->execute();				
			}catch(Exception $e){
				echo "EXCEPCIÓN ".$e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
			return $respuesta;
		}

		public function eliminar(int $id) : bool{
			$conexion = null;
			$statement = null;
			$respuesta = false;
			try{
				$conexion = new Conexion();
				$cnn = $conexion->getConexion();
				$sql = "UPDATE pagina SET  estado = :estado 
						WHERE idpagina = :idpagina;";
				$estado = 0;

				$statement = $cnn->prepare($sql);
				$statement->bindParam(":idpagina", $id, PDO::PARAM_INT);
				$statement->bindParam(":estado", $estado, PDO::PARAM_INT);

				$respuesta = $statement->execute();

			}catch(Exception $e){
				echo "EXCEPCIÓN ".$e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
			return $respuesta; 
		}

	}

 ?>