<?php

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');
	//include 'Empleado.php';

	class EmpleadoDAO implements Consultas{
		private $conexion=null;

		public function listar(){			
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
				$sql = "SELECT idempleado ,nombres, apellidopaterno, apellidomaterno, email, celular FROM empleado;";
				$statement=$cnn->prepare($sql);
				$statement->execute();

				$data = [];//arreglo vacio
				while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$data["data"][] = $resultado;
				}
				//var_dump($data);
				return json_encode($data);
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
				$sql = "INSERT INTO empleado(nombres, apellidopaterno, apellidomaterno, dni, email, contrasena, direccion, fechanacimiento, celular, idtipousuario, estado) VALUES (?,?,?,?,?,?,?,?,?,?,?);";
				/*Notice: Only variables should be passed by reference*/
				$nombre = $objeto->getNombre();
				$apellidopaterno = $objeto->getApellidopaterno();
				$apellidomaterno = $objeto->getApellidomaterno();
				$dni = $objeto->getDni();				
				$email = $objeto->getEmail();
				$contrasena = $objeto->getContrasena();
				$direccion = $objeto->getDireccion();
				//$created_at = $objeto->getCreated_at();
				$fechanacimiento = $objeto->getFechanacimiento();
				$celular = $objeto->getCelular();
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
				$statement->bindParam(8, $fechanacimiento, PDO::PARAM_STR);
				$statement->bindParam(9, $celular, PDO::PARAM_STR);
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
			$conexion = null;
			$statement = null;
			$respuesta = false;
			try{
				$conexion = new Conexion();
				$cnn = $conexion->getConexion();
				$sql = "UPDATE empleado SET  nombres = :nombres, 
											apellidopaterno = :apellidopaterno, 
											apellidomaterno = :apellidomaterno,
											dni = :dni, 
											direccion = :direccion,
											fechanacimiento = :fechanacimiento,
											celular = :celular,
											idtipousuario = :idtipousuario,
											estado = :estado 
						WHERE idcliente = :idcliente;";

				$idcliente = $objeto->getIdcliente();
				$nombre = $objeto->getNombre();
				$apellidopaterno = $objeto->getApellidopaterno();
				$apellidomaterno = $objeto->getApellidomaterno();
				$dni = $objeto->getDni();				
				$direccion = $objeto->getDireccion();
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
			return true;
		}

		public function validarAcceso( $objeto ){
			$conexion =new Conexion();
			$statement=null; 
			try {
				$cnn=$conexion -> getConexion();
				$sql= "SELECT e.idempleado, nombres, CONCAT(apellidopaterno,' ',apellidomaterno) AS apellidos, email,
								e.idtipousuario, tu.descripcion, p.idmodulo 
						FROM empleado e 
						INNER JOIN tipousuario tu ON e.idtipousuario = tu.idtipousuario
						INNER JOIN permiso p ON tu.idtipousuario = p.idtipousuario
						WHERE email = :email and contrasena = :contrasena and p.estado = 1; ";
				$statement=$cnn->prepare($sql);

				$email = $objeto->getEmail();
				$contrasena = $objeto->getContrasena();

				$statement->bindParam(":email", $email, PDO::PARAM_STR);
				$statement->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);

				$statement->execute();
				//var_dump($statement->execute());
				$arrayEmpleado = [];
				$empleadoSesion = null;
				while($resultado=$statement->fetch(PDO::FETCH_ASSOC)){
					//$arrayEmpleado = $resultado;
					$_SESSION["idempleado"] = $resultado["idempleado"];
					$_SESSION["nombres"] = $resultado["nombres"];
					$_SESSION["apellidos"] = $resultado["apellidos"];
					$_SESSION["email"] = $resultado["email"];
					$_SESSION["idtipousuario"] = $resultado["idtipousuario"];
					$_SESSION["descripcion"] = $resultado["descripcion"];
					$modulos[] = $resultado["idmodulo"];
					//$empleadoSesion = new EmpleadoSesion( $arrayEmpleado );
				}
				$_SESSION["idmodulo"] = $modulos;
				return $_SESSION;
				//var_dump($_SESSION);
				//echo json_encode($data);
			}catch (Throwable $e) {
				echo $e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
		}

		public function cerrarSesion(){
			$_SESSION["idempleado"] = array();
			$_SESSION["nombres"] = array();
			$_SESSION["apellidos"] = array();
			$_SESSION["email"] = array();
			$_SESSION["idtipousuario"] = array();
			$_SESSION["descripcion"] = array();
			$_SESSION["idmodulo"] = array();
			return $_SESSION;			
		}

	}

?>