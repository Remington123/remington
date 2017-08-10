<?php
	include 'ProductoDAO.php';
	include 'Producto.php';
	include 'ProductoValidar.php';

	class ProductoBL{
		private $dao = null;
		private $validar = null;

		public function listar(){
			$dao = new ProductoDAO();
			return $dao->listar();
		}

		public function registrar() :string{

			$informacion = [];
			$validar = new ProductoValidar();
			if( $validar->datosObtenidosFormulario() ){
				$producto = new Producto();
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

				$dao = new ProductoDAO();
				$dao->registrar( $producto ) ? $informacion["respuesta"] = "ok_registro" : $informacion["respuesta"] = "error_registro";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion) );
		}

		public function eliminar() :string{
			$informacion = [];
			$validar = new ProductoValidar();
			if( $validar->idPrimarioObtenidoFormulario() ){
				//ejecutar acción de eliminación
			}else{
				$informacion["respuesta"] = "idproducto_indefinido";
			}
			
			return ( json_encode($informacion) );
		}

	}
?>