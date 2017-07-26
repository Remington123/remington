<?php

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');

	class CategoriaProductoDAO implements Consultas{

		public function listar(){

			//crear un instanacia de la clase Conexion
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
			return false;
		}
	}

	

 ?>