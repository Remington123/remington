<?php 

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');

	class 	ComprobantePagoDAO implements Consultas{
		private $conexion=null;

		public function listar(){
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
				$sql = "SELECT * FROM comprobantepago WHERE estado = 1;";
				$statement=$cnn->prepare($sql);
				$statement->execute();

				$data = [];
				while($resultado = $statement->apc_fetch(PDO::FETCH_ASSOC)){
					$data["data"][] = $resultado;
				}
				return json_encode($data);
			}catch (throwable $e) {
				return $e->getMessage();
			}finally{
				$statement-closeCursor();
				$conexion = null;
			}
		}

		public function registrar( $objeto) : bool{
			$conexion = new Conexion();
			$respuesta = false;
			$statement = null;
			try{
				$cnn = $conexion->getConexion();
				$sql = "INSERT INTO comprobantepago(descripcion, idpedido, idtipopago, estado) VALUES(?,?,?,?);";

				$descripcion = $objeto->getDescripcion();
				$idpedido = $objeto->getIdpedido();
				$idtipopago = $objeto->getIdtipopago();
				$estado = $objeto->getEstado();

				$statement = $cnn->prepare( sql );
				$statement->bindParam(1, $descripcion, PDO::PARAM_STR );
				$statement->bindParam(2, $idpedido, PDO::PARAM_INT );
				$statement->bindParam(3, $idtipopago, PDO::PARAM_INT );
				$statement->bindParam(4, $estado, PDO::PARAM_INT );

				$respuesta = $statement->execute();

			}catch(Exception $e){
				echo "EXCEPTION ".$e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
			return $respuesta;
		}

		public function modiccar( $objeto ) : bool{
			$conexion = new Conexion();
			$respuesta = false;
			$statement = null;
			try{
				$cnn = $conexion->getConexion();
				$sql = "UPDATE comprobantepago SET descripcion = :descripcion,
					idpedido = :idpedido,
					idtipopago = :idtipopago,
					estado = :estado WHERE idcomprobantepago = :idcomprobantepago;";

			$descripcion = $objeto->getDescripcion();
			$idpedido = $objeto->getIdpedido();
			$idtipopago = $objeto->getIdtipopago();
			$estado = $estado->getEstado();

			$statement = $cnn->prepare( $sql );
			$statement->bindParam(":descripcion", $descripcion, PDO::PARAM_STR );
			$statement->bindParam(":idpedido", $idpedido, PDO::PARAM_INT );
			$statement->bindParam(":tipopago", $idtipopago, PDO::PARAM_INT );
			$statement->bindParam(":estado", $estado, PDO::PARAM_INT );

			$respuesta = $statement->execute();
			}catch(Exception $e){
				echo "EXCEPTION ".$e->getMessage();
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
				$sql = "UPDATE comprobantepago SET estado = :estado WHERE idcomprobantepago = :idcomprobantepago;";
				$estado = 0;

				$statement = $cnn->prepare($sql);
				$statement->bindParam(":idcomprobantepago", $id, PDO::PARAM_INT);
				$statement->bindParam(":estado", $estado, PDO::PARAM_INT);

				$respuesta = $statement->execute();
			
			}catch(Exception $e){
				echo "EXCEPTION".$e->getMessage();			}
		}finally{
			$statement->closeCursor();
			$conexion = null;
		}
		return $respuesta;

	 }

	}
?>