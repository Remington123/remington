<?php
	include 'ClienteDAO.php';
	include 'Cliente.php';

	class ClienteBL{
		private $dao=null;

		public function listar(){
			$dao = new ClienteDAO();
			$dao->listar();
		}

		public function registrar() : string{
			$informacion = [];

			$cliente = new Cliente();
			//Agregar los datos del formulario al objeto
			$cliente->setNombre( $_POST["nombre"] );
			$cliente->setApellidopaterno( $_POST["apellidopaterno"] );
			$cliente->setApellidomaterno( $_POST["apellidomaterno"] );
			$cliente->setDni( $_POST["dni"] );
			$cliente->setEmail( $_POST["email"] );
			$cliente->setCelular( $_POST["celular"] );
			$cliente->setDireccion( $_POST["direccion"] );
			$cliente->setRuc( $_POST["ruc"] );
			$cliente->setIdtipousuario( 1 );
			$cliente->setEstado(1);//por defecto uno

			$dao = new ClienteDAO();
			$dao->registrar( $cliente ) ? $informacion["respuesta"] = "ok_registro" : $informacion["respuesta"] = "error_registro";

			return ( json_encode($informacion) );		
		}
		
		public function modificar() : string{
			$informacion = [];
			$cliente = new Cliente();
			$cliente->setIdcliente( $_POST["idcliente"] );
			$cliente->setNombre( $_POST["nombre"] );
			$cliente->setApellidopaterno( $_POST["apellidopaterno"] );
			$cliente->setApellidomaterno( $_POST["apellidomaterno"] );
			$cliente->setDni( $_POST["dni"] );
			$cliente->setCelular( $_POST["celular"] );
			$cliente->setDireccion( $_POST["direccion"] );
			$cliente->setRuc( $_POST["ruc"] );
			$cliente->setIdtipousuario( 1 );
			$cliente->setEstado(1);//por defecto uno

			$dao = new ClienteDAO();
			
			if( $dao->modificar( $cliente ) )
				$informacion["respuesta"] = "ok_modificacion";
			else
				$informacion["respuesta"] = "error_modificacion";

			return ( json_encode($informacion) );
		}
	}
?>