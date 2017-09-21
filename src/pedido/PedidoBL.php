<?php
	include 'PedidoDAO.php';
	include 'Pedido.php';
	include 'PedidoValidar.php';
	include '../detallepedido/DetallePedido.php';

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
				return $informacion["respuesta"] = "id_indefinido";
			}    	 	
	    }

	    public function guardarPedido() :string{
			$informacion =[];

			$carrito =  json_decode( $_POST["data"] );
			
			$detalle = [];
			foreach ($carrito->{'pedido'} as $pedido) {
				//recibir la cantidad, el precio y el idproducto para validar
				$item = new DetallePedido();
				$item->setCantidad( $pedido[0] );	
				$item->setIdproducto( $pedido[1] );
				$item->setDescripcion( $pedido[2] );
				//$item->setPrecio( $pedido[3] );
				$item->setImporte( $pedido[4] );
				$item->setUrlimagen( $pedido[5] );
				$item->setIdtalla( $pedido[6] );
				$item->setIdcolor( $pedido[7] );
				array_push($detalle, $item);
			}	

			$pedido = new Pedido();
			$fecha_actual = date( 'Y/m/d', time() );
			$pedido->setFecha( $fecha_actual );
			$pedido->setIdcliente( 3 );//por el momento

			//$pedido->setIdcliente( $_POST["idcliente"] );
			//$pedido->setTotal( $carrito->{'idcliente'} );
			$pedido->setTotal( $carrito->{'total'} );


			$dao = new PedidoDAO();
			$dao->guardarPedido( $pedido, $detalle ) ? $informacion["respuesta"] = "bien" : $informacion["respuesta"] = "error";

			return ( json_encode($informacion));
		}

		public function registrar() :string{
			$informacion =[];
			$validar = new PedidoValidar();
			//if( $validar->datosObtenidosFormulario( "registrar" ) ){

				$carrito =  json_decode( $_POST["data"] );
				//var_dump($carrito);

				$arrayItems = [];
				foreach ($carrito->{'pedido'} as $pedido) {
					//recibir la cantidad, el precio y el idproducto para validar
					$detallePedido = new DetallePedido();
					$detallePedido->setCantidad( $pedido[0] );	
					$detallePedido->setIdproducto( $pedido[1] );
					$detallePedido->setDescripcion( $pedido[2] );
					//$detallePedido->setPrecio( $pedido[3] );
					$detallePedido->setImporte( $pedido[4] );
					$detallePedido->setUrlimagen( $pedido[5] );
					$detallePedido->setIdtalla( $pedido[6] );
					$detallePedido->setIdcolor( $pedido[7] );
					array_push($arrayItems, $detallePedido);
				}	

				$pedido = new Pedido();
				$fecha_actual = date( 'Y/m/d', time() );
				$pedido->setFecha( $fecha_actual );
				$pedido->setIdcliente( 1 );//por el momento

				//$pedido->setIdcliente( $_POST["idcliente"] );
				//$pedido->setTotal( $carrito->{'idcliente'} );
				$pedido->setTotal( $carrito->{'total'} );
				//array_push($arrayItems, $pedido);


				//$mipedido = ["pedido" => $pedido, "detallepedido" => $detalle];

				//var_dump($mipedido);
				//var_dump($mipedido["pedido"]->getTotal());


				$mipedido = ["pedido" => $pedido, "detallepedido" => $arrayItems];

				/*$dao = new PedidoDAO();
				$dao->registrar( $pedido ) ? $informacion["respuesta"] = "bien" : $informacion["respuesta"] = "error";*/

			//}else{
				//$informacion["respuesta"] = "llenar_datos";
			//}

			//return ( json_encode($informacion));
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
					$informacion["respuesta"] = "bien";
				else
					$informacion["respuesta"] = "error";
				
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














