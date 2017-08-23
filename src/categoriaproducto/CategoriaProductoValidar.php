<?php 
	include (dirname(__FILE__) . '/../comunes/IValidarDatosObtenidosFormulario.php');

	class CategoriaProductoValidar implements IValidarDatosObtenidosFormulario{

		public function	datosObtenidosFormulario( $accion ): bool{
			$camposConValores = false;

			if( $accion == "registrar" ){
				if( empty( $_POST["idcategoriaproducto"]) )
					$_POST["idcategoriaproducto"] = "1";
			}

			if( $accion == "modificar" ){
				if( empty( $_POST["idcategoriaproducto"]))
					$_POST["idcategoriaproducto"] = "0";
			} 

			if( !empty( $_POST["idcategoriaproducto"] )
				&&
				!empty( $_POST["descripcion"] )){
				$camposConValores = true;
			}
			return $camposConValores;
		}

		public function idPrimarioObtenidoFormulario() :
			bool{
				$idConValor = false;

				if( !empty( $_POST["idcategoriaproducto"] ) )
					$idConValor = true;

				return $idConValor;
			}
	}

?>