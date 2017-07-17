<?php

 include (dirname(__FILE__). '/../comunes/Conexion.php'); 
 include (dirname(__FILE__) . '/../comunes/Consultas.php');	


class ClienteDAO implements Consultas{
	private $conexion=null;

		public function listar(){
			$conexion =new Conexion();
			try {

				$cnn=$conexion->getConexion();
				$sql= "SELECT * FROM cliente;";
				$statement=$cnn->prepare($sql);
				$statement->execute();

				$data = [];//arreglo vacio
				while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$data[] = $resultado;
				}
				echo json_encode($data);
			}catch (Throwable $e) {
				echo $e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
		}

		public function registrar($objeto) : bool;
		public function modificar($objeto) : bool;
		public function eliminar(int $id) : bool;
		
}

$prueba = new ClienteDAO();
$prueba->listar();



?>