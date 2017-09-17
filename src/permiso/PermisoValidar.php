<?php 
	include (dirname(__FILE__) . '/../comunes/IValidarDatosObtenidosFormulario.php');
	
	class PedidoValidar implements IValidarDatosObtenidosFormulario{

		public function datosObtenidosFormulario( $accion ) : bool{
			$camposConValores = false;
			
			if( $accion == "registrar" ){
				if( empty( $_POST["idpermiso"] ) )
					$_POST["idpermiso"] = "1";				
			}
			
			if( $accion == "modificar" ){
				if( empty( $_POST["idpermiso"] ) )
					$_POST["idpermiso"] = "0";				
			}

			/*Cambiar*/
			if( !empty( $_POST["idpedido"] ) &&
				!empty( $_POST["fecha"] ) &&
				!empty( $_POST["idcliente"] ) &&
				!empty( $_POST["total"] )){
				$camposConValores = true;
			}

			return $camposConValores;
		}

		public function idPrimarioObtenidoFormulario() :bool{
			$idConValor = false;
			
			if( !empty( $_POST["idpermiso"] ) )
				$idConValor = true;			
			
			return $idConValor;
		}
	}

 ?>