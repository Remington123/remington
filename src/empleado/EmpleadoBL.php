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
			if( $validar->datosObtenidosFormulario("registrar" ) ){
				$empleado = new Empleado();
				$empleado->setNombres( $_POST["nombres"] );
				$empleado->setApellidopaterno( $_POST["apellidopaterno"] );
				$empleado->setApellidomaterno( $_POST["apellidomaterno"]);
				$empleado->setDni( $_POST["dni"] );
				$empleado->setEmai( $_POST["email"] );
				$empleado->setContraseña( $_POST["contraseña"] );
				$empleado->setDireccion( $_POST["direccion"] );
				$empleado->setFechanacimiento( $_POST["fechanacimiento"]);
				$empleado->setCelular( $_POST["celuar"] );
				$empleado->setIdtipousuario( $_POST["tipousuario"] );
				$empleado->setEstado(1);


				$dao = new EmpleadoDAO();
				$dao->registrar( $empleado ) ? $informacion["respuesta"] = "ok_registro" : $informacion["respuesta"] = "error_registro";
			}else{
				$informacion[respuesta] = "llenar_datos";
			}

			return ( json_encode($informacion) );
		}

		public function modificar() : string{

			$informacion = [];
			$validar = new EmpleadoValidar();
			if( $validar->datosObtenidosFormulario("modificar" ) ){
				$empleado = new Empleado();
				$empleado->setIdempleado( $_POST["idempledo"] );
				$empleado->setNombres( $_POST["nombres"] );
				$empleado->setApellidopaterno( $_POST["apellidopaterno"] );
				$empleado->setApellidomaterno( $_POST["apellidomaterno"] );
				$empleado->setDni( $_POST["dni"] );
				$empleado->setEmail( $_POST["email"] );
				$empleado->setContrasena( $_POST["contrasena"] );
				$empleado->setDireccion( $_POST["direccion"] );
				$empleado->setFechanacimiento( $_POST["fechanacimiento"] );
				$empleado->setCelular( $_POST["celular"] );
				$empleado->setIdtipousuario( $_POST["idtipousuario"] );
				$empleado->setEstado(1);


				$dao = new Empleado();
				$dao->modificar( $empleado) ? $informacion["respuesta"] = "ok_modificar" : $informacion["respuesta"] = "error_modificar";
		}else{
			$informacion["respuesta"] = "llenar_datos";
		}

		return ( json_encode($informacion) );

	}

	public function eliminar() :string{
		$informacion = [];
		$validar = new EmpleadoValidar();
		if( $validar->idPrimarioObtenidoFormulario() ){
			$idempledo = $_POST["idempledo"];

			$dao = new EmpleadoDAO();
			if( $dao->eliminar( $idempledo ) )
				$informacion["respuesta"] = "ok_eliminacion";
			else
				$informacion["respuesta"] = "error_eliminacion";

		}else{
			$informacion["respuesta"] = "idempledo_indefinido";
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

	}

 ?>