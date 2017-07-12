<?php

include (dirname(__FILE__) . '/../comunes/Conexion.php'); 
//include (dirname(__FILE__) . '/../comunes/Consultas.php');	


/*class DAOCurso{
	private $conexion=null;

		public function listar(){
			$conexion =new Conexion();
			try {
				$cnn=$conexion -> getConexion();
				$sql= "SELECT * FROM cliente;";
				$statement=$cnn->prepare($sql);
				$statement->execute();
				$data = [];
				while($resultado=$statement->fetch(PDO::FETCH_ASSOC)){
					$data[]=$resultado;
				}
				echo json_encode($data);
			}catch (Throwable $e) {
				echo $e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
		}
		
}*/



?>