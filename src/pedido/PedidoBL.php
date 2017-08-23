<?php
	include 'PedidoDAO.php';
	include 'Pedido.php';
	include 'PedidoValidar.php';

	class PedidoBL{

	    private $dao =null;
	    private $validar = null;

	    public function listar(){
	    	$dao = new PedidoDAO();
	    	return $dao->listar();    	
	    }

	    public function listarPedido(){
	    	$informacion = [];
	    	$validar = new PedidoValidar();
			if( $validar->idPrimarioObtenidoFormulario() ){
				$idpedido = $_POST["idpedido"];
	    		$dao = new PedidoDAO();
				return $dao->listarPedido( $idpedido );
			}else{
				return $informacion["respuesta"] = "idproducto_indefinido";
			}    	 	
	    }

		public function registrar() :string{
			$informacion =[];
			$validar = new PedidoValidar();
			if( $validar->datosObtenidosFormulario( "registrar" ) ){
				$pedido = new Pedido();
				$pedido->setFecha( $_POST["fecha"] );
				$pedido->setIdcliente( $_POST["idcliente"] );
				$pedido->setTotal( $_POST["total"] );

				$dao = new PedidoDAO();
				$dao->registrar( $pedido ) ? $informacion["respuesta"] = "ok_registro" : $informacion["respuesta"] = "error_registro";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion));
		}

		public function modificar() :string{
			$informacion = [];
			$validar = new PedidoValidar();
			if( $validar->datosObtenidosFormulario( "modificar" ) ){
				$pedido = new Pedido();
				$pedido->setIdpedido( $_POST["idpedido"] );
				$pedido->setFecha( $_POST["fecha"] );
				$pedido->setIdcliente( $_POST["idcliente"] );	
				$pedido->setTotal( $_POST["total"] );

				$dao =new PedidoDAO();
				if ($dao->modificar($pedido))
					$informacion["respuesta"] = "ok_modificacion";
				else
					$informacion["respuesta"] = "error_modificacion";
				
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion) );
		}

		public function eliminar() :string{
			return "Eliminar";
		}
	}
?>














