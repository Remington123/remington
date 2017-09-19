<?php
	include 'DetalleProductoDAO.php';
	include 'DetalleProducto.php';
	//include 'DetalleProductoValidar.php';

	class DetalleProductoBL{
		private $dao = null;
		private $validar = null;

		public function listar(){
			$dao = new DetalleProductoDAO();
			return $dao->listar();
		}

		public function registrar() :string{

			$informacion = [];
			//$validar = new ProductoValidar();
			//if( $validar->datosObtenidosFormulario( "registrar" ) ){
				$items = json_decode( $_POST["items"] );
				//var_dump($items);
				

				$dao = new DetalleProductoDAO();
				$dao->registrar( $items ) ? $informacion["respuesta"] = "bien" : $informacion["respuesta"] = "error";
			//}else{
				//$informacion["respuesta"] = "llenar_datos";
			//}

			return ( json_encode($informacion) );
		}

		public function modificar() :string{

			$informacion = [];
			$validar = new ProductoValidar();
			if( $validar->datosObtenidosFormulario( "modificar" ) ){
				$producto = new Producto();
				$producto->setIdproducto( $_POST["idproducto"] );
				$producto->setDescripcion( $_POST["descripcion"] );
				$producto->setPrecio( $_POST["precio"] );
				$producto->setPrecioventa( $_POST["precioventa"] );
				$producto->setStock( $_POST["stock"] );
				$producto->setStockactual( $_POST["stock"] );
				$producto->setEstado(1);
				$producto->setIdmodelo( $_POST["idmodelo"] );
				$producto->setIdtalla( $_POST["idtalla"] );
				$producto->setIdtela( $_POST["idtela"] );
				$producto->setIdcategoriaproducto( $_POST["idcategoriaproducto"] );
				//agregar url de imagen del producto

				$dao = new DetalleProductoDAO();
				$dao->modificar( $producto ) ? $informacion["respuesta"] = "bien" : $informacion["respuesta"] = "error";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion) );
		}

		public function eliminar() :string{
			$informacion = [];			
			$validar = new ProductoValidar();
			if( $validar->idPrimarioObtenidoFormulario() ){
				$idproducto = $_POST["idproducto"];

				$dao = new DetalleProductoDAO();
				if( $dao->eliminar( $idproducto ) )
					$informacion["respuesta"] = "bien";
				else
					$informacion["respuesta"] = "error";

			}else{
				$informacion["respuesta"] = "id_indefinido";
			}
			
			return ( json_encode($informacion) );
		}

		public function listarProductoDetallePorId() :string{
	    	$idproducto = $_POST["idproducto"];
	    	$dao = new DetalleProductoDAO();
	    	return $dao->listarProductoDetallePorId( $idproducto );	    	
	    }

	}
?>