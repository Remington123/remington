<?php 
	include (dirname(__FILE__) . '/../comunes/IValidarDatosObtenidosFormulario.php');

	class ClienteValidar implements IValidarDatosObtenidosFormulario{

		public function datosObtenidosFormulario( $aaccion ) : bool{
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
				!empty( $_POST["email"]) &&
				!empty( $_POST["contraseña"]) &&
				!empty( $_POST["direccion"]) &&
				!empty( $_POST{"celular"}) &&
				!empty( $_POST{"ruc"}) &&
				!empty( $_POST{"idtipousuario"}) ){
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