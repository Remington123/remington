<?php 

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');
 
	class TelaDAO implements Consultas{
		private $conexion=null;

		public function listar(){
		 	$conexion = new Conexion();
			try {			
				$cnn = $conexion->getConexion();
				$sql = " SELECT * FROM tela WHERE estado = 1;";
				$statement=$cnn->prepare($sql);
				$statement->execute();

				$data["data"] = [];//arreglo vacio
				while ($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$data["data"][] = $resultado;
				}
				echo json_encode($data);
			} catch (Throwable $e) {
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
				$sql = "INSERT INTO tela( descripcion, idcategoriaproducto, estado) VALUES (?,?,?);";

				$descripcion = $objeto->getDescripcion();
				$idcategoriaproducto = $objeto->getIdcategoriaproducto();
				$estado = 1;

				$statement = $cnn->prepare( $sql );
				$statement->bindParam(1, $descripcion, PDO::PARAM_STR);
				$statement->bindParam(2, $idcategoriaproducto, PDO::PARAM_STR);
				$statement->bindParam(3, $estado, PDO::PARAM_STR);
				$respuesta = $statement->execute();

			}catch(Exception $e){
				echo "EXCEPTION ".$e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
			return $respuesta;
		}

		public function modificar($objeto) : bool{
			$conexion = null;
			$statement = null;
			$respuesta = false;
			try{
				$conexion = new Conexion();
				$cnn = $conexion->getConexion();
				$sql = "UPDATE tela SET descripcion = :descripcion WHERE idtela = :idtela";

				$idtela = $objeto->getIdTela();
				$descripcion = $objeto->getDescripcion();
				$statement = $cnn->prepare($sql);

				$statement->bindParam(":idtela", $idtela, PDO::PARAM_INT);
				$statement->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);

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
				$sql = "UPDATE tela SET estado = :estado WHERE idtela = :idtela;";
				$estado = 0;

				$statement = $cnn->prepare($sql);
				$statement->bindParam(":idtela", $id, PDO::PARAM_INT);
				$statement->bindParam(":estado", $estado, PDO::PARAM_INT);

				respuesta = $statement->execute();
			}catch(Exception $e){
				echo "EXCEPTION ".$e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
			return $respuesta;
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