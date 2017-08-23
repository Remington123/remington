<?php

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');

	class CategoriaProductoDAO implements Consultas{
		private $conexion=null;

		public function listar(){
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
				$sql = "SELECT * FROM categoriaproducto;";
				$statement=$cnn->prepare($sql);
				$statement->execute();

				$data = [];//arreglo vacio
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
		public function registrar($objeto) : bool{
			$conexion = new Conexion();
			$respuesta = false;
			$statement = null;
			try{
				$cnn = $conexion->getConexion();
				$sql = "INSERT INTO categoriaproducto(descripcion, estado)
					VALUES (??);";

			$descripcion = $objeto->getDescripcion();
			$estado = $objeto->getEstado();

			$statement = $cnn->prepare( $sql	 );
			$statement->bindParam(1, $descripcion, PDO::PARAM_STR );
			$statement->bindParam(2, $estado, PDO::PARAM_INT );

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
			$conexion = new Conexion();
			$respuesta = false;
			$statement = null;
			try{
				$cnn = $conexion->getConexion();
				$sql = "UPDATE categoriaproducto SET descripcion = :descripcion,
					estado = :estado WHERE idcategoriaproducto = :idcategoriaproducto;";

			$descripcion = $objeto->getDescripcion();
			$estado = $objeto->getEstado();

			$statement = $cnn->prepare( $sql );
			$statement->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
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
		public function eliminar(int $id) : bool{
			$conexion = null;
			$statement = null;
			$respuesta = false;
			try{
				$conexion = new Conexion();
				$cnn = $conexion->getConexion();
				$sql = "UPDATE categoriaproducto SET estado = :estado WHERE idcategoriaproducto = :idcategoriaproducto;";
				$estado = 0;

				$statement = $cnn->prepare($sql);
				$statement->bindParam(":idcategoriaproducto", $id, PDO::PARAM_INT);
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







