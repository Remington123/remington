<?php 
	include (dirname(__FILE__) . '/../comunes/IValidarDatosObtenidosFormulario.php');
	
	class PaginaValidar implements IValidarDatosObtenidosFormulario{

		public function datosObtenidosFormulario( $accion ) : bool{
			$camposConValores = false;
			
			if( $accion == "registrar" ){
				if( empty( $_POST["idpagina"] ) )
					$_POST["idpagina"] = "1";

			}
			
			if( $accion == "modificar" ){
				if( empty( $_POST["idpagina"] ) )
					$_POST["idpagina"] = "0";

			}

			if( !empty( $_POST["idpagina"] ) &&
				!empty( $_POST["idmodulo"] ) &&
				!empty( $_POST["pagina"] ) &&
				!empty( $_POST["icono"] ) ){
				$camposConValores = true;
			}
			return $camposConValores;
		}

		public function idPrimarioObtenidoFormulario() :bool{
			$idConValor = false;
			
			if( !empty( $_POST["idpagina"] ) )
				$idConValor = true;			
			
			return $idConValor;
		}
	}

 ?>