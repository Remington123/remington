<?php 
	include (dirname(__FILE__) . '/../comunes/IValidarDatosObtenidosFormulario.php');

	class ClienteValidar implements IValidarDatosObtenidosFormulario{

		public function datosObtenidosFormulario( $accion ) : bool{
			$camposConValores = false;

			if ( $accion == "registrar" ){
				if( empty( $_POST["idcliente"]))
					$_POST["idcliente"] = "1";

			}

			if( $accion == "modificar" ){
				if( empty( $_POST["idcliente"]))
					$_POST["idcliente"] = "0";
			}

			if( !empty( $_POST["idcliente"] ) &&
				!empty( $_POST["nombres"] ) &&
				!empty( $_POST["apellidopaterno"]) &&
				!empty( $_POST["apellidomaterno"]) &&
				!empty( $_POST["dni"]) &&
				!empty( $_POST["contrasena"]) &&
				//!empty( $_POST["direccion"])
				!empty( $_POST["email"])){
				$camposConValores = true;
			}
			return $camposConValores;

		}

		public function idPrimarioObtenidoFormulario() :bool{
			$idConValor = false;

			if( !empty( $_POST["idcliente"] ) )
				$idConValor = true;

			return $idConValor;
		}
	}

?>