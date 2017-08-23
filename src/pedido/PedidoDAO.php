<?php
	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');

	class PedidoDAO implements Consultas{

		public function listar(){
			$conexion =new Conexion();
			try{
				$cnn =$conexion->getConexion();
				$sql ="SELECT * FROM  pedido;";
				$statement=$cnn->prepare($sql);
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

		public function listarPedido( $idpedido ){
			$conexion =new Conexion();
			$statement = null;
			try{
				$cnn =$conexion->getConexion();
				$sql =" SELECT p.idpedido, fecha, total, p.idcliente, 
				CONCAT( nombres, ' ', apellidopaterno, ' ', apellidomaterno ) AS cliente
						FROM pedido p
						INNER JOIN cliente c
						ON p.idcliente = c.idcliente
						WHERE p.idpedido = ? ";

				$statement=$cnn->prepare($sql);
				$statement->bindParam(1, $idpedido, PDO::PARAM_INT);
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
				$sql = "INSERT INTO pedido(fecha, idcliente, total) VALUES (?,?,?);";
				$fecha =$objeto->getFecha();
				$idcliente = $objeto->getIdcliente();
				$total =$objeto->getTotal();

				$statement = $cnn->prepare($sql);

				$statement->bindParam(1, $fecha, PDO::PARAM_STR);
				$statement->bindParam(2, $idcliente, PDO::PARAM_INT);
				$statement->bindParam(3, $total, PDO::PARAM_INT);

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
				$sql = "UPDATE pedido SET fecha := fecha,
										  idcliente := idcliente,
										  total := total
						WHERE idpedido := idpedido";
				$fecha =$objeto->getFecha();
				$idcliente = $objeto->getIdcliente();
				$total =$objeto->getTotal();

				$statement = $cnn->prepare($sql);

				$statement->bindParam(":fecha", $fecha, PDO::PARAM_STR);
				$statement->bindParam(":idcliente", $idcliente, PDO::PARAM_INT);
				$statement->bindParam(":total", $total, PDO::PARAM_INT);
				$statement->bindParam(":idpedido", $total, PDO::PARAM_INT);

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
			return $respuesta; 
		}

}
?>