<?php 
	include (dirname(__FILE__) . '/../comunes/IValidarDatosObtenidosFormulario.php');
	
	class ProductoValidar implements IValidarDatosObtenidosFormulario{

		public function datosObtenidosFormulario( $accion ) : bool{
			$camposConValores = false;
			
			if( $accion == "registrar" ){
				if( empty( $_POST["idproducto"] ) )
					$_POST["idproducto"] = "1";
				if( empty( $_POST["stockactual"] ) )
					$_POST["stockactual"] = "1";
			}
			
			if( $accion == "modificar" ){
				if( empty( $_POST["idproducto"] ) )
					$_POST["idproducto"] = "0";
				if( empty( $_POST["stockactual"] ) )
					$_POST["stockactual"] = "0";
			}

			if( !empty( $_POST["idproducto"] ) &&
				!empty( $_POST["descripcion"] ) &&
				/*!empty( $_POST["precio"] ) &&				
				!empty( $_POST["stock"] ) &&				
				!empty( $_POST["idmodelo"] ) &&
				!empty( $_POST["idtalla"] ) &&*/
				!empty( $_POST["idtela"] ) &&
				!empty( $_POST["idcategoriaproducto"] ) ){
				$camposConValores = true;
			}
			return $camposConValores;
		}

		public function idPrimarioObtenidoFormulario() :bool{
			$idConValor = false;
			
			if( !empty( $_POST["idproducto"] ) )
				$idConValor = true;			
			
			return $idConValor;
		}
	}

 ?>