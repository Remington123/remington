<?php
	include 'ClienteDAO.php';
	include 'Cliente.php';
	include 'ClienteValidar.php';

	class ClienteBL{
		private $dao=null;
		private $validar = null;

		public function listar(){
			$dao = new ClienteDAO();
			return $dao->listar();
		}

		public function registrar() : string{
			
			$informacion = [];
			$validar = new ClienteValidar();
			if( $validar->datosObtenidosFormulario("registrar" ) ){
				$cliente = new Cliente();
				$cliente->setNombre( $_POST["nombres"] );
				$cliente->setApellidopaterno( $_POST["apellidopaterno"] );
				$cliente->setApellidomaterno( $_POST["apellidomaterno"] );
				$cliente->setDni( $_POST["dni"] );
				$cliente->setEmail( $_POST["email"] );
				$cliente->setCelular( $_POST["celular"] );
				$cliente->setDireccion( $_POST["direccion"] );
				$cliente->setContrasena( $_POST["contrasena"] );
				//$cliente->setRuc( $_POST["ruc"] );
				$cliente->setIdtipousuario( 1 );
				$cliente->setEstado(1);

			$dao = new ClienteDAO();
			$dao->registrar( $cliente ) ? $informacion["respuesta"] = "bien" : $informacion["respuesta"] = "error";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion) );		
		}
		
		public function modificar() : string{
			
			$informacion = [];
			$validar = new ClienteValidar();
			if( $validar->datosObtenidosFormulario("modificar") ){
			$cliente = new Cliente();
			$cliente->setIdcliente( $_POST["idcliente"] );
			$cliente->setNombre( $_POST["nombres"] );
			$cliente->setApellidopaterno( $_POST["apellidopaterno"] );
			$cliente->setApellidomaterno( $_POST["apellidomaterno"] );
			$cliente->setDni( $_POST["dni"] );
			$cliente->setEmail( $_POST["email"] );
			$cliente->setCelular( $_POST["celular"] );
			$cliente->setDireccion( $_POST["direccion"] );
			$cliente->setContrasena( $_POST["contrasena"] );
			$cliente->setIdtipousuario( 1 );
			$cliente->setEstado(1);

			
			$dao = new ClienteDAO();
			$dao->modificar( $cliente ) ?
				$informacion["respuesta"] = "bien" : $informacion["respuesta"]= "error";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion) );
		}

		public function eliminar() : string{
			$informacion = [];
			$validar = new ClienteValidar();
			if( $validar->idPrimarioObtenidoFormulario() ){
				$idcliente = $_POST["idcliente"];

			$dao = new ClienteDAO();

			if( $dao->eliminar( $idcliente ) )
				$informacion["respuesta"] = "bien";
			else
				$informacion["respuesta"] = "error";

		}else{
			$informacion["respuesta"] = "id_indefinido";
		}

			return ( json_encode($informacion) );
		}

		public function validarAcceso(){

			$dao = new ClienteDAO();
			$cliente = new Cliente();
			$cliente->setEmail( $_POST["email"] );
			$cliente->setContrasena( $_POST["contrasena"] );

			$existe = $dao->existeCliente( $cliente );

			if( $existe ){
				$dao->validarAcceso( $cliente );
				return header('Location: ../../tienda/index.php');
			}else{
				return header('Location: ../../tienda/index.php');
			}

		}

		public function cerrarSesion(){
			$dao = new ClienteDAO();
			return $dao->cerrarSesion();
		}
	}
?>