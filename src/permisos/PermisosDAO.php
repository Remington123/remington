<?php

include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');

	class PermisosDAO implements Consultas{
		private $conexion=null;

		public function listar(){
			//crear un instanacia de la clase Conexion
			$conexion = new Conexion();

			try {

				$cnn = $conexion->getConexion();
				$sql = "SELECT * FROM permisos;";
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
				$sql = "INSERT INTO permisos(categoria, paginas, nivel) VALUES (?,?,?,?,?,?,?,?,?,?,?);";
				/*Notice: Only variables should be passed by reference*/
				
				$categoria = $objeto->getCategoria();
				$paginas = $objeto->getPaginas();
				$nivel = $objeto->getNivel();
				
							
				

				$statement = $cnn->prepare( $sql );
				$statement->bindParam(1, $categoria, PDO::PARAM_STR);
				$statement->bindParam(2, $paginas, PDO::PARAM_STR);
				$statement->bindParam(3, $nivel, PDO::PARAM_STR);
				

				$respuesta = $statement->execute();
				
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
				$sql = "UPDATE permisos SET  categoria = :categoria, 
											paginas = :paginas, 
											nivel = :nivel,
										
						WHERE idpermisos = :idpermisos;";

				$idpermisos = $objeto->getIdpermisos();
				$categoria = $objeto->getCategoria();
				$paginas = $objeto->getPaginas();
				$nivel = $objeto->getNivel();
			
				$statement = $cnn->prepare($sql);

				$statement->bindParam(":idpermisos", $idpermisos, PDO::PARAM_INT);
				$statement->bindParam(":categoria", $categoria, PDO::PARAM_STR);
				$statement->bindParam(":paginas", $paginas, PDO::PARAM_STR);
				$statement->bindParam(":nivel", $nivel, PDO::PARAM_STR);
			

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