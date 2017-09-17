<?php 
	include (dirname(__FILE__) . '/../comunes/IValidarDatosObtenidosFormulario.php');

	class PermisoValidar implements IValidarDatosObtenidosFormulario{

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

			if( !empty( $_POST["idpedido"] ) &&
				!empty( $_POST["idtipousuario"] ) &&
				!empty( $_POST["idmodulo"] ) ){
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

