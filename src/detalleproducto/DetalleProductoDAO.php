<?php

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');

	class DetalleProductoDAO implements Consultas{
		private $conexion=null;

		public function listar(){
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
				$sql = "SELECT * FROM detalleproducto WHERE estado = 1;";
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

		public function registrar( $objeto ) : bool{
			$conexion = new Conexion();
			$respuesta = false;
			$statement = null;			
			try{
				$cnn = $conexion->getConexion();
				$sql = "INSERT INTO detalleproducto(idproducto, idmodelo, idtalla, idcolor, urlimagen, stock, precio,estado ) VALUES (?,?,?,?,?,?,?,?);";
				/*Notice: Only variables should be passed by reference*/
				$idproducto = $objeto->getIdproducto();
				$idmodelo = $objeto->getIdmodelo();
				$idtalla = $objeto->getIdtalla();
				$idcolor = $objeto->getIdcolor();
				$urlimagen = $objeto->getUrlimagen();
				$precio = $objeto->getPrecio();				
				$stock = $objeto->getStock();
				$estado = $objeto->getEstado();

				$statement = $cnn->prepare( $sql );
				$statement->bindParam(1, $idproducto, PDO::PARAM_STR );	
				$statement->bindParam(2, $idmodelo, PDO::PARAM_INT );
				$statement->bindParam(3, $idtalla, PDO::PARAM_INT );
				$statement->bindParam(4, $idcolor, PDO::PARAM_INT );
				$statement->bindParam(5, $urlimagen, PDO::PARAM_STR );
				$statement->bindParam(6, $stock, PDO::PARAM_INT );
				$statement->bindParam(7, $precio, PDO::PARAM_INT );			
				$statement->bindParam(8, $estado, PDO::PARAM_INT );

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
								 
								 precio = :precio,
								 
								 stock = :stock,
								 
								 estado = :estado,
								 idmodelo = :idmodelo,
								 idtalla = :idtalla,
								 
								 
						WHERE iddetalleproducto = :iddetalleproducto;";
				/*Notice: Only variables should be passed by reference*/
				$idproducto = $objeto->getIdproducto();
				$idmodelo = $objeto->getIdmodelo();
				$idtalla = $objeto->getIdtalla();
				$idcolor = $objeto->getIdcolor();
				$urlimagen = $objeto->getUrlimagen();
				$precio = $objeto->getPrecio();				
				$stock = $objeto->getStock();
				$estado = $objeto->getEstado();
				$iddetalleproducto = $objeto->getIddetalleproducto();

				$statement = $cnn->prepare( $sql );
				$statement->bindParam(":descripcion", $descripcion, PDO::PARAM_STR );
				$statement->bindParam(":precio", $precio, PDO::PARAM_INT );
				$statement->bindParam(":precioventa", $precioventa, PDO::PARAM_INT );
				$statement->bindParam(":stock", $stock, PDO::PARAM_INT );
				$statement->bindParam(":stockactual", $stockactual, PDO::PARAM_INT );
				$statement->bindParam(":estado", $estado, PDO::PARAM_INT );
				$statement->bindParam(":idmodelo", $idmodelo, PDO::PARAM_INT );
				$statement->bindParam(":idtalla", $idtalla, PDO::PARAM_INT );
				$statement->bindParam(":idtela", $idtela, PDO::PARAM_INT );
				$statement->bindParam(":idcategoriaproducto", $idcategoriaproducto, PDO::PARAM_INT );
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
	}

?>