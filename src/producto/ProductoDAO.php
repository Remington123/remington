<?php

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');

	class ProductoDAO implements Consultas{
		private $conexion=null;

		public function listar(){
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
				$sql = "SELECT * FROM producto WHERE estado = 1;";
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
				$sql = "INSERT INTO producto(descripcion, precio, precioventa, stock, stockactual, estado, idmodelo, idtalla, idtela, idcategoriaproducto) VALUES (?,?,?,?,?,?,?,?,?,?);";
				/*Notice: Only variables should be passed by reference*/
				$descripcion = $objeto->getDescripcion();
				$precio = $objeto->getPrecio();
				$precioventa = $objeto->getPrecioventa();
				$stock = $objeto->getStock();
				$stockactual = $objeto->getStockactual();
				$estado = $objeto->getEstado();
				$idmodelo = $objeto->getIdmodelo();
				$idtalla = $objeto->getIdtalla();
				$idtela = $objeto->getIdtela();
				$idcategoriaproducto = $objeto->getIdcategoriaproducto();

				$statement = $cnn->prepare( $sql );
				$statement->bindParam(1, $descripcion, PDO::PARAM_STR );
				$statement->bindParam(2, $precio, PDO::PARAM_INT );
				$statement->bindParam(3, $precioventa, PDO::PARAM_INT );
				$statement->bindParam(4, $stock, PDO::PARAM_INT );
				$statement->bindParam(5, $stockactual, PDO::PARAM_INT );
				$statement->bindParam(6, $estado, PDO::PARAM_INT );
				$statement->bindParam(7, $idmodelo, PDO::PARAM_INT );
				$statement->bindParam(8, $idtalla, PDO::PARAM_INT );
				$statement->bindParam(9, $idtela, PDO::PARAM_INT );
				$statement->bindParam(10, $idcategoriaproducto, PDO::PARAM_INT );

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
								 precio = :precio,
								 precioventa = :precioventa,
								 stock = :stock,
								 stockactual = :stockactual,
								 estado = :estado,
								 idmodelo = :idmodelo,
								 idtalla = :idtalla,
								 idtela = :idtela,
								 idcategoriaproducto = :idcategoriaproducto
						WHERE idproducto = :idproducto;";
				/*Notice: Only variables should be passed by reference*/
				$descripcion = $objeto->getDescripcion();
				$precio = $objeto->getPrecio();
				$precioventa = $objeto->getPrecioventa();
				$stock = $objeto->getStock();
				$stockactual = $objeto->getStockactual();
				$estado = $objeto->getEstado();
				$idmodelo = $objeto->getIdmodelo();
				$idtalla = $objeto->getIdtalla();
				$idtela = $objeto->getIdtela();
				$idcategoriaproducto = $objeto->getIdcategoriaproducto();
				$idproducto = $objeto->getIdproducto();

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