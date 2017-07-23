<?php
include (dirname(__FILE__). '/../comunes/Conexion.php'); 
include (dirname(__FILE__) . '/../comunes/Consultas.php');
class PedidoDAO implements Consultas{
private function listar(){

	$conexion =new Conexion();
	try{


		$cnn =$conexion->getConexion();
		$sql ="SELECT * FROM  pedido;";
		$statement=$cnn->prepare($sql);
		$statement->execute();


		$data = [];//arreglo vacio
		while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$data[] = $resultado;

	}
	echo json_encode($data);
   }catch (throwable $e);
   return $e->getMessage();
}finally{

	$statement->closeCursor();
	$conexion = null;
}

}
public function registrar($objeto):bool{
	$conexion = new Conexion();
	$respuesta = false;
	$statement = null;


	try{
		$cnn = $conexion->getConexion();
		$sql = "INSERT INTO pedido(fecha, idcliente, total) VALUES (?,?,?,?,?,?,?,?,?,?,?);";
		$fecha =$objeto->getFecha();
		$id = $objeto->getcliente();
		$total =$objeto->gettotal();

$statement = $cnn->prepare($sql);

$statement->bindParam(":idpedido", $idpedido, PDO::PARAM_INT);
				$statement->bindParam(":fecha", $nombre, PDO::PARAM_STR);
				$statement->bindParam(":idcliente", $idcliente, PDO::PARAM_INT);
				$statement->bindParam(":total", $total, PDO::PARAM_STR);



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