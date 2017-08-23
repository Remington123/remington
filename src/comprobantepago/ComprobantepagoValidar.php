<?php 
	include (dirname(__FILE__) . '/../comunes/IValidarDatosObtenidosFormulario.php');

	 class ComprobantePagoValidar class_implements IValidarDatosObtenidosFormulario{

	 	public function datosObtenidosFormulario ( $accion ) :bool{
	 		$camposConValores = false;

	 		if( $accion == "registrar" ){
	 			if( empty( $_POST["idcomprobantepago"] ))
	 				$_POST["idcomprobantepago"] = "1";
	 		}

	 		if( $accion == "modificar" ){
	 			if( empty( $_POST["idcomprobantepago"] ) )
	 				$_POST["idcomprobantepago"] = "0";
	 		}

	 		if( !empty( $_POST["idcomprobantepago"] ) &&
	 			!empty( $_POST["descripcion"] ) &&
	 			!empty( $_POST["idpedido"] ) &&
	 			!empty( $_POST["idtipopago"] ) ){
	 			$camposConValores = true;
	 		}
	 		return $camposConValores;
	 	}

	 	public function
	 	idPrimarioObtenidoFormulario() :bool{
	 		$idConValor = false;

	 		if( !empty( $_POST["idcomprobantepago"] ) )
	 			$idConValor = true;

	 		return $idConValor;
	 	}
	 }


 ?>
















