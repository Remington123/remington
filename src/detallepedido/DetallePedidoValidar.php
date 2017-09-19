<?php 
	include (dirname(__FILE__) . '/../comunes/IValidarDatosObtenidosFormulario.php');
	
	class DetallePedidoValidar implements IValidarDatosObtenidosFormulario{

		public function datosObtenidosFormulario( $accion ) : bool{
			$camposConValores = false;
			
			if( $accion == "registrar" ){
				if( empty( $_POST["iddetallepedido"] ) )
					$_POST["iddetallepedido"] = "1";				
			}
			
			if( $accion == "modificar" ){
				if( empty( $_POST["iddetallepedido"] ) )
					$_POST["iddetallepedido"] = "0";				
			}

			if( !empty( $_POST["iddetallepedido"] ) &&
				!empty( $_POST["idpedido"] ) &&
				!empty( $_POST["idproducto"] ) &&
				!empty( $_POST["cantidad"] ) &&
				!empty( $_POST["importe"] ) ){
				$camposConValores = true;
			}
			return $camposConValores;
		}

		public function idPrimarioObtenidoFormulario() :bool{
			$idConValor = false;
			
			if( !empty( $_POST["iddetallepedido"] ) )
				$idConValor = true;			
			
			return $idConValor;
		}

		/*Función agregada para validar el idpedido, y de esta manera listar el detalle correspondiente.*/
		public function idPrimarioPedido() :bool{
			$idPedidoConValor = false;

			if( !empty( $_POST["idpedido"] ))
				$idPedidoConValor = true;

			return $idPedidoConValor;
		}

		public function datosCarrito(){
			$camposConValores = false;

			if( !empty( $_POST["idproducto"] ) &&
				!empty( $_POST["cantidad"] ) &&
				!empty( $_POST["item_precio"] )){
				$_POST["importe"] = floatval( $_POST["item_precio"] ) * intval( $_POST["cantidad"] );
				$camposConValores = true;
			}
			return $camposConValores;
		}
	}

 ?>