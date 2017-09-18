<?php

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');

	class ClienteDAO implements Consultas{
		private $conexion=null;

		public function listar(){
			//crear un instanacia de la clase Conexion
			$conexion = new Conexion();

			try {

				$cnn = $conexion->getConexion();
				$sql = "SELECT idcliente, nombres, apellidopaterno, apellidomaterno, email, celular FROM cliente;";
				$statement=$cnn->prepare($sql);
				$statement->execute();

				$data["data"] = [];//arreglo vacio
				while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$data["data"][] = $resultado;
				}
				echo json_encode($data);
			}catch (Throwable $e) {
				return $e->getMessage();
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
				$sql = "INSERT INTO cliente(nombres, apellidopaterno, apellidomaterno, dni, email, contrasena, direccion, celular, ruc, idtipousuario, estado) VALUES (?,?,?,?,?,?,?,?,?,?,?);";
				/*Notice: Only variables should be passed by reference*/
				$nombre = $objeto->getNombre();
				$apellidopaterno = $objeto->getApellidopaterno();
				$apellidomaterno = $objeto->getApellidomaterno();
				$dni = $objeto->getDni();				
				$email = $objeto->getEmail();
				$contrasena = $objeto->getContrasena();
				$direccion = $objeto->getDireccion();
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
				$statement->bindParam(5, $email, PDO::PARAM_STR);
				$statement->bindParam(6, $contrasena, PDO::PARAM_STR);
				$statement->bindParam(7, $direccion, PDO::PARAM_STR);
				$statement->bindParam(8, $celular, PDO::PARAM_STR);
				$statement->bindParam(9, $ruc, PDO::PARAM_STR);
				$statement->bindParam(10, $idtipousuario, PDO::PARAM_INT);
				$statement->bindParam(11, $estado, PDO::PARAM_INT);

				$respuesta = $statement->execute();//devuelve true, si no hubo error.
				
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
			$statement = false;
			$respuesta = null;
			try{
				$conexion = new Conexion();
				$cnn = $conexion->getConexion();
				$sql = "UPDATE cliente SET  nombres = :nombres, 
											apellidopaterno = :apellidopaterno, 
											apellidomaterno = :apellidomaterno,
											dni = :dni, 
											direccion = :direccion,
											celular = :celular,
											ruc = :ruc,
											idtipousuario = :idtipousuario,
											estado = :estado 
						WHERE idcliente = :idcliente;";

				$idcliente = $objeto->getIdcliente();
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

				$statement = $cnn->prepare($sql);

				$statement->bindParam(":idcliente", $idcliente, PDO::PARAM_INT);
				$statement->bindParam(":nombres", $nombre, PDO::PARAM_STR);
				$statement->bindParam(":apellidopaterno", $apellidopaterno, PDO::PARAM_STR);
				$statement->bindParam(":apellidomaterno", $apellidomaterno, PDO::PARAM_STR);
				$statement->bindParam(":dni", $dni, PDO::PARAM_STR);
				$statement->bindParam(":direccion", $direccion, PDO::PARAM_STR);
				$statement->bindParam(":celular", $celular, PDO::PARAM_STR);
				$statement->bindParam(":ruc", $ruc, PDO::PARAM_STR);
				$statement->bindParam(":idtipousuario", $idtipousuario, PDO::PARAM_INT);
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

		public function eliminar(int $id) : bool{
			$conexion = null;
			$statement = null;
			$respuesta = false;
			try{
				$conexion = new Conexion();
				$cnn = $conexion->getConexion();
				$sql = "UPDATE cliente SET  estado = :estado 
						WHERE idcliente = :idcliente;";
				$estado = 0;

				$statement = $cnn->prepare($sql);
				$statement->bindParam(":idcliente", $id, PDO::PARAM_INT);
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