<?php

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');

	class ProductoDAO implements Consultas{
		private $conexion=null;

		public function listar(){
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
				$sql = "SELECT * FROM producto WHERE estado = 1 OR estado = 2;";
				$statement=$cnn->prepare($sql);
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

		public function listarProducto( $idproducto ){
			$conexion =new Conexion();
			$statement = null;
			try{
				$cnn =$conexion->getConexion();
				$sql =" SELECT p.idproducto, p.descripcion AS producto, p.idcategoriaproducto,
						cp.descripcion AS categoria, p.idtela, t.descripcion AS tela, p.estado
						FROM producto p
						INNER JOIN categoriaproducto cp
						ON p.idcategoriaproducto = cp.idcategoriaproducto
						INNER JOIN tela t
						ON t.idtela = p.idtela
						WHERE p.idproducto = ?; ";

				$statement=$cnn->prepare($sql);
				$statement->bindParam(1, $idproducto, PDO::PARAM_INT);
				$statement->execute();

				$data["data"] = [];//arreglo vacio
				while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$data["data"][] = $resultado;
				}
				return json_encode($data);
		    }catch (throwable $e){
		    	echo $e->getMessage();
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
				$sql = "INSERT INTO producto(descripcion, estado, idcategoriaproducto, idtela ) VALUES (?,?,?,?);";
				/*Notice: Only variables should be passed by reference*/
				$idcategoriaproducto = $objeto->getIdcategoriaproducto();
				$descripcion = $objeto->getDescripcion();
				$idtela = $objeto->getIdtela();
				$estado = $objeto->getEstado();

				$statement = $cnn->prepare( $sql );
				$statement->bindParam(1, $descripcion, PDO::PARAM_STR );
				$statement->bindParam(2, $estado, PDO::PARAM_INT );
				$statement->bindParam(3, $idcategoriaproducto, PDO::PARAM_INT );
				$statement->bindParam(4, $idtela, PDO::PARAM_INT );

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
			$conexion = new Conexion();
			$respuesta = false;
			$statement = null;			
			try{
				$cnn = $conexion->getConexion();
				$sql = "UPDATE producto SET 
								 descripcion = :descripcion,
								 estado = :estado,
								 idcategoriaproducto = :idcategoriaproducto,
								 idtela = :idtela
						WHERE idproducto = :idproducto;";
				/*Notice: Only variables should be passed by reference*/
				$descripcion = $objeto->getDescripcion();				
				$estado = $objeto->getEstado();
				$idcategoriaproducto = $objeto->getIdcategoriaproducto();
				$idtela = $objeto->getIdtela();
				$idproducto = $objeto->getIdproducto();

				$statement = $cnn->prepare( $sql );
				$statement->bindParam(":descripcion", $descripcion, PDO::PARAM_STR );	
				$statement->bindParam(":estado", $estado, PDO::PARAM_INT );
				$statement->bindParam(":idcategoriaproducto", $idcategoriaproducto, PDO::PARAM_INT );				
				$statement->bindParam(":idtela", $idtela, PDO::PARAM_INT );
				$statement->bindParam(":idproducto", $idproducto, PDO::PARAM_INT);

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
				$sql = "UPDATE producto SET  estado = :estado 
						WHERE idproducto = :idproducto;";
				$estado = 0;

				$statement = $cnn->prepare($sql);
				$statement->bindParam(":idproducto", $id, PDO::PARAM_INT);
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

		public function listarProductoCompleto(){
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
					$sql = "SELECT p.idproducto, p.descripcion, p.estado, dp.urlimagen, 
							dp.precio FROM producto p
							INNER JOIN detalleproducto dp
							ON p.idproducto = dp.idproducto
							WHERE p.estado = 2
							GROUP BY p.idproducto";
				$statement=$cnn->prepare($sql);
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

		public function listarPorCategoria(int $idcategoriaproducto){
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
					$sql = "SELECT p.idproducto, p.descripcion, p.estado, dp.urlimagen, 
							dp.precio FROM producto p
							INNER JOIN detalleproducto dp
							ON p.idproducto = dp.idproducto
							WHERE p.estado = 2 AND p.idcategoriaproducto = :idcategoriaproducto
							GROUP BY p.idproducto";
				$statement=$cnn->prepare($sql);
				$statement->bindParam(":idcategoriaproducto", $idcategoriaproducto, PDO::PARAM_INT );
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

		public function listarPorColor(int $idcolor){
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
					$sql = "SELECT p.idproducto, p.descripcion, t.descripcion as talla, stock, precio
							FROM detalleproducto dp
							INNER JOIN talla t
							ON t.idtalla = dp.idtalla
							INNER JOIN producto p
							ON p.idproducto = dp.idproducto
							WHERE p.estado = 2 AND idcolor= :idcolor";
				$statement=$cnn->prepare($sql);
				$statement->bindParam(":idcolor", $idcolor, PDO::PARAM_INT );
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

		public function buscar( $descripcion ){
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
				
				//$comodin = "'%$descripcion%'";
				$sql = "SELECT p.idproducto, p.descripcion, p.estado, 
						p.idcategoriaproducto, p.idtela, cp.descripcion AS categoria FROM producto p
						INNER JOIN categoriaproducto cp
						ON p.idcategoriaproducto = cp.idcategoriaproducto
						WHERE p.descripcion LIKE :descripcion AND p.estado = 1;";
				$statement=$cnn->prepare($sql);
				$comodin = "%".$descripcion."%";//ver esto
				$statement->bindParam(":descripcion", $comodin, PDO::PARAM_STR);
				$statement->execute();

				$data["data"] = [];//arreglo vacio
				//$filas = $statement->rowCount();
				//if( $filas > 0 ){
					while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
						$data["data"][] = $resultado;
					}
				//}

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