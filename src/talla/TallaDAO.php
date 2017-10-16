<?php 

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');

	class TallaDAO implements Consultas{
		private $conexion = null;

		public function listar(){
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
				$sql = "SELECT idtalla, t.descripcion, t.idcategoriaproducto, cp.descripcion as categoria, t.estado  		
						FROM talla t 
						INNER JOIN categoriaproducto cp
						ON t.idcategoriaproducto = cp.idcategoriaproducto
						WHERE t.estado = 1;";
				$statement=$cnn->prepare($sql);
				$statement->execute();

				$data["data"] = [];//arreglo vacio
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
			$conexion = new Conexion();
			$respuesta = false;
			$statement = null;

			try{
				$cnn = $conexion->getConexion();
				$sql = "INSERT INTO talla(descripcion, idcategoriaproducto, estado) VALUES (?,?,?);";
				/*Notice: Only variables should be passed by reference*/
				$descripcion = $objeto->getDescripcion();
				$idcategoriaproducto = $objeto->getIdcategoriaproducto();
				$estado = 1;

				$statement = $cnn->prepare( $sql );
				$statement->bindParam(1, $descripcion, PDO::PARAM_STR);
				$statement->bindParam(2, $idcategoriaproducto, PDO::PARAM_STR);
				$statement->bindParam(3, $estado, PDO::PARAM_STR);
				$respuesta = $statement->execute();//devuelve true, si no hubo error.
				
			}catch(Exception $e){
				echo "EXCEPCIÓN ".$e->getMessage();
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
				$sql = "UPDATE talla SET  descripcion = :descripcion WHERE idtalla = :idtalla";

				$idtalla = $objeto->getIdtalla();
				$descripcion = $objeto->getDescripcion();
				$statement = $cnn->prepare($sql);

				$statement->bindParam(":idtalla", $idtalla, PDO::PARAM_INT);
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
			$conexion = null;
			$statement = null;
			$respuesta = false;
			try{
				$conexion = new Conexion();
				$cnn = $conexion->getConexion();
				$sql = "UPDATE talla SET estado = :estado WHERE idtalla = :idtalla;";
				$estado = 0;

				$statement = $cnn->prepare($sql);
				$statement->bindParam(":idtalla", $id, PDO::PARAM_INT);
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

		public function llenarCombo( $idcategoriaproducto ){
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
				$sql = "SELECT * FROM talla WHERE idcategoriaproducto = :idcategoriaproducto AND estado=1;";
				$statement=$cnn->prepare($sql);
				$statement->bindParam(":idcategoriaproducto", $idcategoriaproducto, PDO::PARAM_INT);
				$statement->execute();

				$data["data"] = [];//arreglo vacio
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

		public function llenarComboPorColor( $idcolor, $idproducto ){
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
				$sql = "SELECT dp.idproducto, dp.idtalla, t.descripcion, dp.idcolor, dp.stock, dp.precio
						FROM detalleproducto dp
						INNER JOIN color c
						ON dp.idcolor = c.idcolor
						INNER JOIN talla t
						ON dp.idtalla = t.idtalla
						WHERE dp.idcolor = :idcolor AND dp.idproducto = :idproducto;";
				$statement=$cnn->prepare($sql);
				$statement->bindParam(":idcolor", $idcolor, PDO::PARAM_INT);
				$statement->bindParam(":idproducto", $idproducto, PDO::PARAM_INT);
				$statement->execute();

				$data["data"] = [];//arreglo vacio
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
	}

 ?>