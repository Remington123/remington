<?php

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');

	class ClienteDAO implements Consultas{
		private $conexion=null;

		public function listar(){
			$conexion =new Conexion();
			try {
				$cnn = $conexion->getConexion();
				$sql = "SELECT * FROM cliente;";
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

		public function registrar($objeto) : bool{
			$conexion = new Conexion();
			$respuesta = false;
			$statement = null;
			try{
				$cnn = $conexion->getConexion();
				$sql = "INSERT INTO cliente(nombres, apellidopaterno, apellidomaterno, dni, direccion, celular, ruc, idtipousuario, estado) VALUES (?,?,?,?,?,?,?,?,?);";
				/*Notice: Only variables should be passed by reference*/
				$nombre = $objeto->getNombre();
				$apellidopaterno = $objeto->getApellidopaterno();
				$apellidomaterno = $objeto->getApellidomaterno();
				$dni = $objeto->getDni();				
				$direccion = $objeto->getDireccion();
				//$email = $objeto->getEmail();
				//$created_at = $objeto->getCreated_at();
				$celular = $objeto->getCelular();
				$ruc = $objeto->getRuc();
				$idtipousuario = $objeto->getIdtipousuario();
				$estado = $objeto->getEstado();				

				$statement = $cnn->prepare( $sql );
				$statement->bindParam(1, $nombre, PDO::PARAM_STR);
				$statement->bindParam(2, $apellidopaterno, PDO::PARAM_STR);
				$statement->bindParam(3, $apellidomaterno, PDO::PARAM_STR);
				$statement->bindParam(4, $dni, PDO::PARAM_STR);
				$statement->bindParam(5, $direccion, PDO::PARAM_STR);
				$statement->bindParam(6, $celular, PDO::PARAM_STR);
				$statement->bindParam(7, $ruc, PDO::PARAM_STR);
				$statement->bindParam(8, $idtipousuario, PDO::PARAM_INT);
				$statement->bindParam(9, $estado, PDO::PARAM_INT);

				/*$statement = $cnn->prepare( $sql );
				$statement->bindParam(1, $objeto->getNombre(), PDO::PARAM_STR);
				$statement->bindParam(2, $objeto->getApellidopaterno(), PDO::PARAM_STR);
				$statement->bindParam(3, $objeto->getApellidomaterno(), PDO::PARAM_STR);
				$statement->bindParam(4, $objeto->getDni(), PDO::PARAM_STR);
				$statement->bindParam(5, $objeto->getDireccion(), PDO::PARAM_STR);
				$statement->bindParam(6, $objeto->getCelular(), PDO::PARAM_STR);
				$statement->bindParam(7, $objeto->getRuc(), PDO::PARAM_STR);
				$statement->bindParam(8, $objeto->getIdtipousuario(), PDO::PARAM_INT);
				$statement->bindParam(9, $objeto->getEstado(), PDO::PARAM_INT);*/
				
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
			return true; 
		}

		public function eliminar(int $id) : bool{
			return true; 
		}			
	}

?>