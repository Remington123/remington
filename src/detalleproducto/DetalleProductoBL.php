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

		public function listarDetalleProducto() :string{
	    	$informacion = [];

	    	$dao = new DetalleProductoDAO();
	    	$idproducto = $_POST["idproducto"];
	    	return $dao->listarDetalleProducto( $idproducto );    	
	    }

		public function registrar() :string{

			$informacion = [];			
			$items = json_decode( $_POST["items"] );
			$dao = new DetalleProductoDAO();
			$dao->registrar( $items ) ? $informacion["respuesta"] = "bien" : $informacion["respuesta"] = "error";
			return ( json_encode($informacion) );
		}

		public function modificar() :string{

			$informacion = [];			
			$detalleProducto = new DetalleProducto();
			$detalleProducto->setIdproducto( $_POST["id_producto"] );
			//$detalleProducto->setDescripcion( $_POST["descripcion"] );
			$detalleProducto->setPrecio( $_POST["precio"] );
			$detalleProducto->setStock( $_POST["stock"] );
			//$detalleProducto->setEstado(1);
			//$detalleProducto->setIdmodelo( $_POST["idmodelo"] );
			//$detalleProducto->setIdtalla( $_POST["idtalla"] );
			$detalleProducto->setIddetalleproducto( $_POST["iddetalleproducto"] );
			//agregar url de imagen del producto

			$dao = new DetalleProductoDAO();
			$dao->modificar( $detalleProducto ) ? $informacion["respuesta"] = "bien" : $informacion["respuesta"] = "error";

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