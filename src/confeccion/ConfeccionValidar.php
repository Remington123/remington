<?php 
	include (dirname(__FILE__) . '/../comunes/IValidarDatosObtenidosFormulario.php');

	class ConfeccionValidar implements IValidarDatosObtenidosFormulario{

		public function datosObtenidosFormulario( $accion ) : bool{
			$camposConValores = false;

			if( $accion == "registrar" ){
				if( empty( $_POST["idconfeccion"] ) )
					$_POST["idconfeccion"] = "1";
			}

			if( $accion == "modificar" ){
				if( empty( $_POST["idconfeccion"] ) )
					$_POST["idconfeccion"] = "0";
			}

			if( !empty( $_POST["idconfeccion"]) &&
				!empty( $_POST["descripcion"] ) &&
				!empty( $_POST["fecha"] ) &&
				!empty( $_POST["idcliente"] ) ){
				$camposConValores = true;
			}
			return $camposConValores;
		}

		public function idPrimarioObtenidoFormulario() : bool{
			$idConValor = false;

			if( !empty( $_POST["idconfeccion"]))
				$idConValor = true;

			return $idConValor;
		}
	}

?>



















