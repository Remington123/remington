<?php 
	include (dirname(__FILE__) . '/../comunes/IValidarDatosObtenidosFormulario.php');
	
	class TallaValidar implements IValidarDatosObtenidosFormulario{

		public function datosObtenidosFormulario( $accion ) : bool{
			$camposConValores = false;
			
			if( $accion == "registrar" ){
				if( empty( $_POST["idtalla"] ) )
					$_POST["idtalla"] = "1";
			}
			
			if( $accion == "modificar" ){
				if( empty( $_POST["idtalla"] ) )
					$_POST["idtalla"] = "0";
			}

			if( !empty( $_POST["idtalla"] ) &&
				!empty( $_POST["descripcion"] ) &&
				!empty( $_POST["idcategoriaproducto"] ) ){
				$camposConValores = true;
			}
			return $camposConValores;
		}

		public function idPrimarioObtenidoFormulario() :bool{
			$idConValor = false;
			
			if( !empty( $_POST["idtalla"] ) )
				$idConValor = true;			
			
			return $idConValor;
		}
	}

 ?>