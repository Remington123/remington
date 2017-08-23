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
				$cliente->setNombre( $_POST["nombre"] );
				$cliente->setApellidopaterno( $_POST["apellidopaterno"] );
				$cliente->setApellidomaterno( $_POST["apellidomaterno"] );
				$cliente->setDni( $_POST["dni"] );
				$cliente->setEmail( $_POST["email"] );
				$cliente->setCelular( $_POST["celular"] );
				$cliente->setDireccion( $_POST["direccion"] );
				$cliente->setRuc( $_POST["ruc"] );
				$cliente->setIdtipousuario( 1 );
				$cliente->setEstado(1);

			$dao = new ClienteDAO();
			$dao->registrar( $cliente ) ? $informacion["respuesta"] = "ok_registro" : $informacion["respuesta"] = "error_registro";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion) );		
		}
		
		public function modificar() : string{
			
			$informacion = [];
			$cliente = new ClienteValidar();
			if( $validar->datosObtenidosFormulario("modificar") ){
			$cliente->setIdcliente( $_POST["idcliente"] );
			$cliente->setNombre( $_POST["nombre"] );
			$cliente->setApellidopaterno( $_POST["apellidopaterno"] );
			$cliente->setApellidomaterno( $_POST["apellidomaterno"] );
			$cliente->setDni( $_POST["dni"] );
			$cliente->setCelular( $_POST["celular"] );
			$cliente->setDireccion( $_POST["direccion"] );
			$cliente->setRuc( $_POST["ruc"] );
			$cliente->setIdtipousuario( 1 );
			$cliente->setEstado(1);

			
			$dao = new ClienteDAO();
			$dao->modificar( $cliente ) ?
				$informacion["respuesta"] = "ok_modificacion" : $informacion["respuesta"]= "error_modificacion";
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
				$informacion["respuesta"] = "ok_eliminacion";
			else
				$informacion["respuesta"] = "error_eliminacion";

		}else{
			$informacion["respuesta"] = "idcliente_indefinido";
		}

			return ( json_encode($informacion) );
		}
	}
?>