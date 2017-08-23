<?php 
	include 'ProductoDAO.php';
	include 'Producto.php';
	include 'ProductoValidar.php';

	class ComprobantePagoBL{
		private $dao = null;
		private $validar = null;

		public function listar(){
			$dao = new ComprobantePagoDAO();
			return $dao->listar();
		}

		public function registrar() :string{

			$informacion = [];
			$validar = new ComprobantePagoValidar();
			if( $validar->datosObtenidosFormulario( "registrar" ) ){
				$comprobantepago = new comprobantepago(); 
				$comprobantepago->setDescripcion( $_POST["descripcion"] );
				$comprobantepago->setIdpedido( $_POST["idpedido"] );
				$comprobantepago->setIdtipopago( $_POST["idtipopago"] );
				$comprobantepago->setEstado(1);

				$dao = new ComprobantePagoDAO();
				$dao->registrar( $comprobantepago ) ? $informacion["respuesta"] = "ok_registro" : $informacion["respuesta"] = "error_registro";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion) );
		}

		public function modificar() :string{

			$informacion = [];
			$validar = new ComprobantePago();
			if( $validar->datosObtenidosFormulario( "modificar") ){
				$comprobantepago = new ComprobantePago();
				$comprobantepago->setIdomprobantepago( $_POST["idcomprobantepgo"] );
				$comprobantepago->setDescripcion( $_POST["descripcion"] );
				$comprobantepago->setIdpedido( $_POST["idpedido"] );
				$comprobantepago->setIdtipopago( $_POST["idtipopago"] );
				$comprobantepago->setEstado(1);


				$dao = new ComprobantePagoDAO();
				$dao->modificar( $comprobantepago ) ? $informacion["respuesta"] = "ok_modificar" : $informacion["respuesta"] = "error_modificar";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion) );
		}

		public function eliminar() :string{
			$informacion = [];
			$validar = new ComprobantePagoValidar();
			if( $validar->idPrimarioObtenidoFormulario() ){
				$idcomprobantepgo = $_POST["idcomprobantepgo"];

				$dao = new ComprobantePago();
				if( $dao->eliminar( $idcomprobantepgo ) )
					$informacion["respuesta"] = "ok_eliminacion";
				else
					$informacion["respuesta"] = "error_eliminacion";

			}else{
				$informacion["respuesta"] = "idcomprobantepgo_indefinido";

			}

			return ( json_encode($informacion )
				);
		}
	}
?>

