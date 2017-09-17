<?php 
	include (dirname(__FILE__) . '/../comunes/IValidarDatosObtenidosFormulario.php');
<<<<<<< HEAD

	class PermisoValidar implements IValidarDatosObtenidosFormulario{

		public function IValidarDatosObtenidosFormulario( $aaccion ) : bool{
			$camposConValores = false;

			if ( $accion == "registrar" ){
				if( empty( $_POST["idpermiso"]))
					$_POST["idpermiso"] = "1";

			}

			if( $accion == "modificar" ){
				if( empty( $_POST["idpermiso"]))
					$_POST["idpermiso"] = "0";
			}

			if( !empty( $_POST["idpermiso"] ) &&
				!empty( $_POST["idtipousuario"] ) &&
				!empty( $_POST{"idmodulo"}) ){
				$camposConValores = true;
			}
			return $camposConValores;

=======
	
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
>>>>>>> b3c2c67eddaf0f611a49c4a5bab97bc61b14be5f
		}

		public function idPrimarioObtenidoFormulario() :bool{
			$idConValor = false;
<<<<<<< HEAD

			if( !empty( $_POST["idpermiso"] ) )
				$idConValor = true;

=======
			
			if( !empty( $_POST["idpermiso"] ) )
				$idConValor = true;			
			
>>>>>>> b3c2c67eddaf0f611a49c4a5bab97bc61b14be5f
			return $idConValor;
		}
	}

<<<<<<< HEAD
?>
=======
 ?>
>>>>>>> b3c2c67eddaf0f611a49c4a5bab97bc61b14be5f
