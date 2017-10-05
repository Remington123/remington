<?php 
	include (dirname(__FILE__) . '/../comunes/IValidarDatosObtenidosFormulario.php');
	
	class TelaValidar implements IValidarDatosObtenidosFormulario{

		public function datosObtenidosFormulario( $accion ) : bool{
			$camposConValores = false;
			
			if( $accion == "registrar" ){
				if( empty( $_POST["idtela"] ) )
					$_POST["idtela"] = "1";
			}
			
			if( $accion == "modificar" ){
				if( empty( $_POST["idtela"] ) )
					$_POST["idtela"] = "0";
			}

			if( !empty( $_POST["idtela"] ) &&
				!empty( $_POST["descripcion"] ) &&
				!empty( $_POST["idcategoriaproducto"] ) ){
				$camposConValores = true;
			}
			return $camposConValores;
		}

		public function idPrimarioObtenidoFormulario() :bool{
			$idConValor = false;
			
			if( !empty( $_POST["idtela"] ) )
				$idConValor = true;			
			
			return $idConValor;
		}
	}

 ?>