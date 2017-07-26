<?php 
	include 'EmpleadoDAO.php';
	include 'Empleado.php';

	class EmpleadoBL{
		private $dao = null;

		public function validarAcceso(){
			$dao = new EmpleadoDAO();
			$empleado = new Empleado();
			$empleado->setEmail( $_POST["email"] );
			$empleado->setContrasena( $_POST["contrasena"] );

			return $dao->validarAcceso( $empleado );
		}

	}

 ?>