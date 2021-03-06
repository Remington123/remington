<?php 
	include 'EmpleadoDAO.php';
	include 'Empleado.php';
	include 'EmpleadoValidar.php';

	class EmpleadoBL{
		private $dao = null;
		private $validar = null;

		public function listar(){
			$dao = new EmpleadoDAO();
			return $dao->listar();
		}

		public function registrar() :string{

			$informacion = [];
			$validar = new EmpleadoValidar();
			if( $validar->datosObtenidosFormulario("registrar") ){
				$empleado = new Empleado();
				$empleado->setNombre( $_POST["nombres"] );
				$empleado->setApellidopaterno( $_POST["apellidopaterno"] );
				$empleado->setApellidomaterno( $_POST["apellidomaterno"]);
				$empleado->setDni( $_POST["dni"] );
				$empleado->setEmail( $_POST["email"] );
				$empleado->setContrasena( $_POST["contrasena"] );
				$empleado->setDireccion( $_POST["direccion"] );
				$empleado->setFechanacimiento( date( 'Y/m/d', strtotime( $_POST["fechanacimiento"]) ) );
				$empleado->setCelular( $_POST["celular"] );
				$empleado->setIdtipousuario( $_POST["idtipousuario"] );
				$empleado->setEstado(1);

				$dao = new EmpleadoDAO();
				$dao->registrar( $empleado ) ? $informacion["respuesta"] = "bien" : $informacion["respuesta"] = "error";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion) );
		}

		public function modificar() : string{
			$informacion = [];
			$validar = new EmpleadoValidar();
			if( $validar->datosObtenidosFormulario("modificar" ) ){
				$empleado = new Empleado();
				$empleado->setIdempleado( $_POST["idempleado"] );
				$empleado->setNombre( $_POST["nombres"] );
				$empleado->setApellidopaterno( $_POST["apellidopaterno"] );
				$empleado->setApellidomaterno( $_POST["apellidomaterno"] );
				//$empleado->setDni( $_POST["dni"] );
				$empleado->setEmail( $_POST["email"] );
				//$empleado->setContrasena( $_POST["contrasena"] );
				//$empleado->setDireccion( $_POST["direccion"] );
				//$empleado->setFechanacimiento( $_POST["fechanacimiento"] );
				$empleado->setCelular( $_POST["celular"] );
				/*$empleado->setIdtipousuario( $_POST["idtipousuario"] );
				$empleado->setEstado(1);*/

				$dao = new EmpleadoDAO();
				$dao->modificar( $empleado) ? $informacion["respuesta"] = "bien" : $informacion["respuesta"] = "error";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}
			return ( json_encode($informacion) );
		}

		public function eliminar() :string{
			$informacion = [];
			$validar = new EmpleadoValidar();
			if( $validar->idPrimarioObtenidoFormulario() ){
				$idempleado = $_POST["idempleado"];

				$dao = new EmpleadoDAO();
				if( $dao->eliminar( $idempleado ) )
					$informacion["respuesta"] = "bien";
				else
					$informacion["respuesta"] = "error";

			}else{
				$informacion["respuesta"] = "id_indefinido";
			}

			return ( json_encode($informacion) );
		}

		public function validarAcceso(){
			$dao = new EmpleadoDAO();
			$empleado = new Empleado();
			$empleado->setEmail( $_POST["email"] );
			$empleado->setContrasena( $_POST["contrasena"] );

			return $dao->validarAcceso( $empleado );
		}

		public function cerrarSesion(){
			$dao = new EmpleadoDAO();
			return $dao->cerrarSesion();
		}

	}

 ?>