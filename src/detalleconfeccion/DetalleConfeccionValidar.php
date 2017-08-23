<?php 	
	include (dirname(__FILE__) . '/../comunes/IValidarDatosObtenidosFormulario.php');

	class DetalleConfeccionValidar implements IValidarDatosObtenidosFormulario{

		public function datosObtenidosFormulario( $accion ) : bool{
			$camposConValores = false;

			if( $accion == "registrar" ){
				if( empty( $_POST["iddetalleconfeccion"] ) )
					$_POST["iddetalleconfeccion"] = "1";
			}

			if( $accion == "modificar" ){
				if( empty( $_POST["iddetalleconfeccion"] ) )
					$_POST["iddetalleconfeccion"] = "0";
			}

			if( !empty( $_POST["iddetalleconfeccion"] ) &&
				!empty( $_POST["nombre"] ) &&
				!empty( $_POST["medida"] ) &&
				!empty( $_POST["idconfeccion"]) ){
				$camposConValores = true;
			} 
			return $camposConValores;
		}

		public function idPrimarioObtenidoFormulario() : bool{
				$idConValor = false;

				if( !empty( $_POST["iddetalleconfeccion"] ) )
					$idConValor = true;

				return $idConValor;
			}
	}



 ?>