<?php

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__). '/../comunes/Consultas.php');

	class PermisoDAO implements Consultas{
		private $conexion=null;

		public function listar(){
			//crear un instanacia de la clase Conexion
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
				$sql = "SELECT * FROM permiso;";
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
				$sql = "INSERT INTO permiso(idtipousuario, idmodulo, estado) VALUES (?,?,?);";
				/*Notice: Only variables should be passed by reference*/
				
				$idtipousuario = $objeto->getIdtipousuario();
				$idpagina = $objeto->getIdmodulo();
				$estado = $objeto->getEstado();
				
				$statement = $cnn->prepare( $sql );
				$statement->bindParam(1, $idtipousuario, PDO::PARAM_INT);
				$statement->bindParam(2, $idmodulo, PDO::PARAM_INT);
				$statement->bindParam(3, $estado, PDO::PARAM_INT);
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
				$sql = "UPDATE permiso SET idtipousuario = :idtipousuario, 
											idpagina = :idpagina,			
						WHERE idpermiso = :idpermiso;";

				$idpermiso = $objeto->getIdpermiso();
				$idtipousuario = $objeto->getIdtipousuario();
				$idpagina = $objeto->getIdpagina();
			
				$statement = $cnn->prepare($sql);

				$statement->bindParam(":idpermiso", $idpermisos, PDO::PARAM_INT);
				$statement->bindParam(":idtipousuario", $categoria, PDO::PARAM_INT);
				$statement->bindParam(":idpagina", $paginas, PDO::PARAM_STR);
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