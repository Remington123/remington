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

		public function listarDetalleProducto( $idproducto ){
			$conexion =new Conexion();
			try{
				$cnn =$conexion->getConexion();
				$sql ="SELECT dp.iddetalleproducto, dp.idproducto, dp.idmodelo, m.descripcion AS modelo, dp.idtalla, t.descripcion AS talla, dp.idcolor, c.nombre AS color, dp.urlimagen, dp.stock,	dp.precio
						FROM detalleproducto dp
						INNER JOIN modelo m
						ON m.idmodelo = dp.idmodelo
						INNER JOIN talla t
						ON t.idtalla = dp.idtalla
						INNER JOIN color c
						ON c.idcolor = dp.idcolor
						WHERE dp.idproducto = ?;";
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
				$sql = "INSERT INTO detalleproducto(idproducto, idmodelo, idtalla, idcolor, urlimagen, stock, precio, estado ) VALUES (?,?,?,?,?,?,?,?);";
				
				$statement = $cnn->prepare( $sql );
				$estado = 1;
				$idproducto = 0;
				foreach ( $objeto->{"data"} as $item ) {
					$statement->bindParam(1, $item->{"idproducto"}, PDO::PARAM_INT );	
					$statement->bindParam(2, $item->{"idmodelo"}, PDO::PARAM_INT );
					$statement->bindParam(3, $item->{"idtalla"}, PDO::PARAM_INT );
					$statement->bindParam(4, $item->{"idcolor"}, PDO::PARAM_INT );
					$statement->bindParam(5, $item->{"urlimagen"}, PDO::PARAM_STR );
					$statement->bindParam(6, $item->{"stock"}, PDO::PARAM_INT );
					$statement->bindParam(7, $item->{"precio"}, PDO::PARAM_INT );			
					$statement->bindParam(8, $estado, PDO::PARAM_INT );
					$idproducto = $item->{"idproducto"};
					$respuesta = $statement->execute();		
				}
				/*Estados de un prpducto:
					0: Eliminado
					1: Nuevo
					2: Completo (producto con una o "n" tallas asignadas)
				*/	
				$cnn_modificar = $conexion->getConexion();
				$this->cambiarEstadoCompleto($respuesta, $idproducto, $cnn_modificar);

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
				$sql = "UPDATE detalleproducto SET 								 
								 precio = :precio,								 
								 stock = :stock								 
						WHERE iddetalleproducto = :iddetalleproducto AND idproducto = :idproducto;";
				/*Notice: Only variables should be passed by reference*/
				$idproducto = $objeto->getIdproducto();
				//$idmodelo = $objeto->getIdmodelo();
				//$idtalla = $objeto->getIdtalla();
				//$idcolor = $objeto->getIdcolor();
				//$urlimagen = $objeto->getUrlimagen();
				$precio = $objeto->getPrecio();				
				$stock = $objeto->getStock();
				//$estado = $objeto->getEstado();
				$iddetalleproducto = $objeto->getIddetalleproducto();

				$statement = $cnn->prepare( $sql );
				//$statement->bindParam(":descripcion", $descripcion, PDO::PARAM_STR );
				$statement->bindParam(":precio", $precio, PDO::PARAM_INT );
				$statement->bindParam(":stock", $stock, PDO::PARAM_INT );
				//$statement->bindParam(":estado", $estado, PDO::PARAM_INT );
				//$statement->bindParam(":idmodelo", $idmodelo, PDO::PARAM_INT );
				//$statement->bindParam(":idtalla", $idtalla, PDO::PARAM_INT );
				//$statement->bindParam(":idtela", $idtela, PDO::PARAM_INT );
				$statement->bindParam(":iddetalleproducto", $iddetalleproducto, PDO::PARAM_INT );
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

		public function listarProductoDetallePorId( $idproducto ){
			$conexion =new Conexion();
			try{
				$cnn =$conexion->getConexion();
				$sql ="SELECT  dp.idcolor, c.nombre, dp.urlimagen
						FROM detalleproducto dp
						INNER JOIN color c
						ON dp.idcolor = c.idcolor
						WHERE dp.idproducto = ?
						GROUP BY dp.idcolor";
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

		public function cambiarEstadoCompleto( bool $respuesta, int $idproducto, $cnn ){
			if( $respuesta ){				
				$sql = "UPDATE producto SET estado =:estado
						WHERE idproducto =:idproducto";
				$statement = $cnn->prepare($sql);
				$estado = 2;//estado completo
				$statement->bindParam(":idproducto", $idproducto, PDO::PARAM_INT);
				$statement->bindParam(":estado", $estado, PDO::PARAM_INT);
				$statement->execute();
			}
		}
	}

?>