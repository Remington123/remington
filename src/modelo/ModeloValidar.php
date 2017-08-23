<?php 
	include (dirname(__FILE__) . '/../comunes/IValidarDatosObtenidosFormulario.php');
	
	class ModeloValidar implements IValidarDatosObtenidosFormulario{

		public function datosObtenidosFormulario( $accion ) : bool{
			$camposConValores = false;
			
			if( $accion == "registrar" ){
				if( empty( $_POST["idmodelo"] ) )
					$_POST["idmodelo"] = "1";
			}
			
			if( $accion == "modificar" ){
				if( empty( $_POST["idmodelo"] ) )
					$_POST["idmodelo"] = "0";
			}

			if( !empty( $_POST["idmodelo"] ) &&
				!empty( $_POST["descripcion"] ) &&
				!empty( $_POST["idcategoriaproducto"] ) ){
				$camposConValores = true;
			}
			return $camposConValores;
		}

		public function idPrimarioObtenidoFormulario() :bool{
			$idConValor = false;
			
			if( !empty( $_POST["idmodelo"] ) )
				$idConValor = true;			
			
			return $idConValor;
		}
	}

 ?>