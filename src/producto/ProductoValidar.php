<?php 
	include (dirname(__FILE__) . '/../comunes/IValidarDatosObtenidosFormulario.php');
	
	class ProductoValidar implements IValidarDatosObtenidosFormulario{

		public function datosObtenidosFormulario() : bool{
			$camposConValores = false;
			//Si no pasar a este método como parámetro una acción, es decir modificar o registrar por el ID
			isset( $_POST["idproducto"] ) ? $_POST["idproducto"] : 0;

			if( !empty( $_POST["idproducto"] ) &&
				!empty( $_POST["descripcion"] ) &&
				!empty( $_POST["precio"] ) &&
				!empty( $_POST["precioventa"] ) &&
				!empty( $_POST["stock"] ) &&
				!empty( $_POST["stock"] ) &&
				!empty( $_POST["idmodelo"] ) &&
				!empty( $_POST["idtalla"] ) &&
				!empty( $_POST["idtela"] ) &&
				!empty( $_POST["idcategoriaproducto"] ) ){
				$camposConValores = true;
			}
			return $camposConValores;
		}

		public function idPrimarioObtenidoFormulario() :bool{
			$idConValor = false;
			
			if( !empty( $_POST["idproducto"] )	$idConValor = true;
			
			return $idConValor;
		}
	}

 ?>