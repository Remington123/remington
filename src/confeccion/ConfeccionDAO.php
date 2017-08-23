<?php 

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');

	class ConfeccionDAO implements Consultas{
		private $conexion=null;

		public function listar(){
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
				$sql = "SELECT * FROM confeccion WHERE estado = 1;";
				$statement=$cnn->prepare($sql);
				$statement->execute();

				$data = [];
				while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$data["data"][] = $resultado;
				}
				return json_encode($data);
			}catch (throwable $e) {
				return $e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
		}

		public function registrar( $objeto ) : bool{
			$conexion = new Conexion();
			$respuesta = false;
			$statement = null;
			try{
				$cnn = $conexion->getConexion();
				$sql = "INSERT INTO confeccion(descripcion, fecha, idcliente, estado) VALUES (?,?,?,?);";

				$descripcion = $objeto->getDescripcion();
				$fecha = $objeto->getFecha();
				$idcliente = $objeto->getIdcliente();
				$estado = $objeto->getEstado();

				$statement = $cnn->prepare( $sql );
				$statement->bindParam(1, $descripcion, PDO::PARAM_STR);
				$statement->bindParam(2, $fecha, PDO::PARAM_STR);
				$statement->bindParam(3, $idcliente, PDO::PARAM_INT);
				$statement->bindParam(4, $estado, PDO::PARAM_INT);

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
				$sql = "UPDATE confeccion SET descripcion = :descripcion,
					fecha = :fecha,
					idcliente = :idcliente,
					estado = :estado WHERE idconfeccion = :idconfeccion;";

				$descripcion = $objeto->getDescripcion();
				$fecha = $objeto->getFecha();
				$idcliente = $objeto->getIdcliente();
				$estado = $estado->getEstado();

				$statement = $cnn->prepare( $sql);
				$statement->bindParam(":descripcion", $descripcion, PDO::PARAM_STR );
				$statement->bindParam(":fecha", $fecha, PDO::PARAM_STR );
				$statement->bindParam(":idcliente", $idcliente, PDO::PARAM_INT );
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
				$sql = "UPDATE confeccion SET estado = :estado WHERE idconfeccion = :idconfeccion;";
				$estado = 0;

				$statement = $cnn->prepare($sql);
				$statement->bindParam(":idconfeccion", $id, PDO::PARAM_INT);
				$statement->bindParam(":estado", $estado, PDO::PARAM_INT);

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























