<?php 

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');

	class DetalleConfeccionDAO implements Consultas{
		private $conexion = null;

		public function listar(){
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
				$sql = "SELECT * FROM detalleconfeccion WHERE estado = 1;";
				$statement=$cnn->prepare( $sql);
				$statement->execute();

				$data["data"] = [];//arreglo vacio

				while($resultado = $statement->fetch(PDO::FETCH_ASSOC) ){
					$data["data"][] = $resultado;
				}
				return json_encode($data);
			}catch (Throwable $e){
				return $e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
		}

		public function registrar( $objeto ) . bool{
			$conexion = new Conexion();
			$respuesta = false;
			$statement = null;
			try{
				$cnn = $conexion->getConexion();
				$sql = "INSERT INTO detalleconfeccion( nombre, medida, idconfeccion) VALUES (?,?,?);";

				$nombre = $objeto->getNombre();
				$medida = $objeto->getMedida();
				$idconfeccion = $objeto->getIdconfeccion();

				$statement = $cnn->prepare( $sql );
				$statement->bindParam(1, $nombre, PDO::PARAM_STR );
				$statement->bindParam(2, $medida, PDO::PARAM_STR );
				$statement->bindParam(3, $idconfeccion, PDO::PARAM_INT);

				$respuesta = $statement->execute();

			}catch(Exception $e){
				echo "EXCEPTION ".$e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
			return $respuesta;
		}

		public function modificar( $objeto ) : bool{
			$conexion = new Conexion();
			$respuesta = false;
			$statement = null;
			try{
				$cnn = $conexion->getConexion();
				$sql = "UPDATE detalleconfeccion SET 
						nombre = :nombre,
						medida = :medida,
						idconfeccion = :idconfeccion WHERE iddetalleconfeccion = :iddetalleconfeccion;";


			$nombre = $objeto->getNombre();
			$medida = $objeto->getMedida();
			$idconfeccion = $objeto->getIdconfeccion();

			$statement = $cnn->prepare( $sql );
			$statement->bindParam(":nombre", PDO::PARAM_STR );
			$statement->bindParam(":medida", PDO::PARAM_STR );
			$statement->bindParam(":idconfeccion", PDO::PARAM_INT);

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
				$sql = "UPDATE detalleconfeccion SET estado = :estado WHERE iddetalleconfeccion = :iddetalleconfeccion;";
				$estado = 0;

				$statement = $cnn->prepare($sql);
				$statement->bindParam(":iddetalleconfeccion", id, PDO::PARAM_INT);
				$statement->bindParam("estado", $estado, PDO::PARAM_INT);

				$respuesta = $statement->execute();

			}catch(Exception $e){
				echo "EXCEPTION ".$e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
			return $respuesta;
		}
	}

 ?>