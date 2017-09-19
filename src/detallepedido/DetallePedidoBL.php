<?php
	include 'DetallePedidoDAO.php';
	include 'DetallePedido.php';
	include 'Item.php';
	include 'DetallePedidoValidar.php';

	class DetallePedidoBL{

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
		    	return $dao->listarDetallePedido( $idpedido );
	    	}else{
	    		$informacion["respuesta"] = "id_indefinido";
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
				$dao->registrar( $detallepedido ) ? $informacion["respuesta"] = "bien" : $informacion["respuesta"] = "error";
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
					$informacion["respuesta"] = "bien";
				else
					$informacion["respuesta"] = "error";
				
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
					$informacion["respuesta"] = "bien";
				else
					$informacion["respuesta"] = "error";

			}else{
				$informacion["respuesta"] = "id_indefinido";
			}
			
			return ( json_encode($informacion) );
		}

		public function agregarItem(){
			$validar = new DetallePedidoValidar();
			//if( $validar->datosCarrito() ){
				$dao = new DetallePedidoDAO();
				$item = new Item();				
				$item->idproducto = intval( $_POST["idproducto"] );
				$item->descripcion = $_POST["descripcion"];
				$item->cantidad = intval( $_POST["cantidad"] );
				$item->precio = floatval( $_POST["item_precio"] );
				$item->importe = floatval( $item->precio * $item->cantidad );
				$item->estado = 1;

				return $dao->agregarItem( $item );
			//}
		}

		public function eliminarItem(){
			if( isset( $_POST["indice"] ) ){
				$dao = new DetallePedidoDAO();				
				$indice = intval( $_POST["indice"] );

				return $dao->eliminarItem( $indice );
			}
		}

		public function actualizarCarrito(){
			
				$dao = new DetallePedidoDAO();				
				$carrito = json_decode( $_POST["data"] );
				$arrayItems = [];
				foreach ($carrito->{'pedido'} as $pedido) {
					//recibir la cantidad, el precio y el idproducto para validar
					$item = new Item();
					$item->cantidad = $pedido[0];	
					$item->idproducto = $pedido[1];
					$item->precio = $pedido[3];
					$item->importe = $pedido[4];
					array_push($arrayItems, $item);
				}				
				//var_dump($arrayItems);
				return $dao->actualizarCarrito( $arrayItems );			
		}

	}
?>














