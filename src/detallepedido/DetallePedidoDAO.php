<?php
	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');

	class DetallePedidoDAO implements Consultas{

		public function listar(){
			return "lista Detalle Pedido";
		}

		public function listarDetallePedido( $idpedido ){
			$conexion =new Conexion();
			try{
				$cnn =$conexion->getConexion();
				$sql ="SELECT dp.iddetallepedido, dp.idpedido, dp.idproducto, pro.descripcion as producto,
								cantidad, importe FROM detallepedido dp
								INNER JOIN pedido p
								ON dp.idpedido = p.idpedido
								INNER JOIN producto pro
								ON dp.idproducto = pro.idproducto
								WHERE p.idpedido :=idpedido and dp.estado = 1;";
				$statement=$cnn->prepare($sql);
				
				$statement->bindParam(":idpedido", $idpedido, PDO::PARAM_INT)
				$statement->execute();

				$data = [];//arreglo vacio
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
		
		public function registrar($objeto) :bool{
			$conexion = new Conexion();
			$respuesta = false;
			$statement = null;
			try{
				$cnn = $conexion->getConexion();
				$sql = "INSERT INTO detallepedido(idpedido, idproducto, cantidad, importe) VALUES (?,?,?,?);";
				$idpedido =$objeto->getIdpedido();
				$idproducto = $objeto->getIdproducto();
				$cantidad =$objeto->getCantidad();
				$importe =$objeto->getImporte();

				$statement = $cnn->prepare($sql);

				$statement->bindParam(1, $idpedido, PDO::PARAM_INT);
				$statement->bindParam(2, $idproducto, PDO::PARAM_INT);
				$statement->bindParam(3, $cantidad, PDO::PARAM_INT);
				$statement->bindParam(4, $importe, PDO::PARAM_INT);

				$respuesta = $statement->execute();

			}catch(Exception $e){
				echo "EXCEPCIÓN ".$e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
			return $respuesta; 
		}

		public function modificar($objeto) :bool{
			$conexion = new Conexion();
			$respuesta = false;
			$statement = null;
			try{
				$cnn = $conexion->getConexion();
				$sql = "UPDATE detallepedido SET idpedido := idpedido,
										  idproducto := idproducto,
										  cantidad := cantidad,
										  importe := importe,
						WHERE iddetallepedido := iddetallepedido";

				$idpedido =$objeto->getIdpedido();
				$idproducto = $objeto->getIdproducto();
				$cantidad =$objeto->getCantidad();
				$importe =$objeto->getImporte();
				$iddetallepedido =$objeto->getIddetallepedido();

				$statement = $cnn->prepare($sql);

				$statement->bindParam(":idpedido", $idpedido, PDO::PARAM_INT);
				$statement->bindParam(":idproducto", $idproducto, PDO::PARAM_INT);
				$statement->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
				$statement->bindParam(":importe", $importe, PDO::PARAM_INT);
				$statement->bindParam(":iddetallepedido", $iddetallepedido, PDO::PARAM_INT);

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
			$respuesta = false;
			/*En discusión*/
			return $respuesta; 
		}
}
?>