<?php
	include 'DetallePedidoDAO.php';
	include 'DetallePedido.php';
	include 'DetallePedidoValidar.php';

	class PedidoBL{

	    private $dao =null;
	    private $validar = null;

	    public function listar(){
	    	$dao = new DetallePedidoDAO();
	    	return $dao->listar();    	
	    }

	    public function listarDetallePedido() :string{
	    	$informacion = [];

	    	$validar = new DetallePedidoValidar();
	    	if( $validar->idPrimarioPedido() ){
		    	$dao = new DetallePedidoDAO();
		    	$idpedido = $_POST["idpedido"];
		    	$dao->listarDetallePedido( $idpedido );
		    	return $dao;
	    	}else{
	    		$informacion["respuesta"] = "idpedido_indefinido";
	    		return ( json_encode($informacion));
	    	}
	    }

		public function registrar() :string{
			$informacion =[];
			$validar = new DetallePedidoValidar();
			if( $validar->datosObtenidosFormulario( "registrar" ) ){
				$detallepedido = new DetallePedido();
				$detallepedido->setIdpedido( $_POST["idpedido"] );
				$detallepedido->setIdproducto( $_POST["idproducto"] );
				$detallepedido->setCantidad( $_POST["cantidad"] );
				$detallepedido->setImporte( $_POST["importe"] );
				$detallepedido->setEstado( 1 );

				$dao = new DetallePedidoDAO();
				$dao->registrar( $detallepedido ) ? $informacion["respuesta"] = "ok_registro" : $informacion["respuesta"] = "error_registro";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion));
		}

		public function modificar() :string{
			$informacion = [];
			$validar = new DetallePedidoValidar();
			if( $validar->datosObtenidosFormulario( "modificar" ) ){
				$detallepedido = new DetallePedido();
				$detallepedido->setIddetallepedido( $_POST["iddetallepedido"] );
				$detallepedido->setIdpedido( $_POST["idpedido"] );
				$detallepedido->setIdproducto( $_POST["idproducto"] );
				$detallepedido->setCantidad( $_POST["cantidad"] );
				$detallepedido->setImporte( $_POST["importe"] );
				$detallepedido->setEstado( $_POST["estado"] );

				$dao =new DetallePedidoDAO();
				if ($dao->modificar($detallepedido))
					$informacion["respuesta"] = "ok_modificacion";
				else
					$informacion["respuesta"] = "error_modificacion";
				
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion) );
		}

		public function eliminar() :string{
			$informacion = [];			
			$validar = new DetallePedidoValidar();
			if( $validar->idPrimarioObtenidoFormulario() ){
				$iddetallepedido = $_POST["iddetallepedido"];

				$dao = new DetallePedidoDAO();
				if( $dao->eliminar( $iddetallepedido ) )
					$informacion["respuesta"] = "ok_eliminacion";
				else
					$informacion["respuesta"] = "error_eliminacion";

			}else{
				$informacion["respuesta"] = "iddetallepedido_indefinido";
			}
			
			return ( json_encode($informacion) );
		}
	}
?>














