<?php

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');

	class ModeloDAO implements Consultas{
		private $conexion=null;

		public function listar(){
			//crear un instanacia de la clase Conexion
			$conexion = new Conexion();

			try {

				$cnn = $conexion->getConexion();
				$sql = "SELECT * FROM modelo;";
				$statement=$cnn->prepare($sql);
				$statement->execute();

				$data = [];//arreglo vacio
				while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$data[] = $resultado;
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
			$conexion = new Conexion();
			$respuesta = false;
			$statement = null;
			
			try{
				$cnn = $conexion->getConexion();
				$sql = "INSERT INTO modelo(descripcion) VALUES (?,?,?,?,?,?,?,?,?,?,?);";
				/*Notice: Only variables should be passed by reference*/
				$descripcion = $objeto->getDescripcion();
								

				$statement = $cnn->prepare( $sql );
				$statement->bindParam(1, $descripcion, PDO::PARAM_STR);
				

				$respuesta = $statement->execute();//devuelve true, si no hubo error.
				
			}catch(Exception $e){
				echo "EXCEPCIÓN ".$e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
			return $respuesta;
		}

		public function modificar( $objeto ) : bool{
			$conexion = null;
			$statement = null;
			$respuesta = false;
			try{
				$conexion = new Conexion();
				$cnn = $conexion->getConexion();
				$sql = "UPDATE cliente SET  nombres = :nombres;";

				$idmodelo = $objeto->getIdmodelo();
				$descripcion = $objeto->getDescripcion();
				

				$statement = $cnn->prepare($sql);

				$statement->bindParam(":idmodelo", $idmodelo, PDO::PARAM_INT);
				$statement->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
				

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
			return true;
		}			
	}

?>