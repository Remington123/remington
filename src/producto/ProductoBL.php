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
			if( $validar->datosObtenidosFormulario( "registrar" ) ){
				$producto = new Producto();
				$producto->setDescripcion( $_POST["descripcion"] );
				$producto->setEstado(1);
				$producto->setIdtela( $_POST["idtela"] );
				$producto->setIdcategoriaproducto( $_POST["idcategoriaproducto"] );
				$dao = new ProductoDAO();
				$dao->registrar( $producto ) ? $informacion["respuesta"] = "bien" : $informacion["respuesta"] = "error";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion) );
		}

		public function listarProducto(){

			$idpedido = $_POST["idproducto"];
    		$dao = new ProductoDAO();
			return $dao->listarProducto( $idpedido );
	    }

		public function modificar() :string{

			$informacion = [];
			$validar = new ProductoValidar();
			if( $validar->datosObtenidosFormulario( "modificar" ) ){
				$producto = new Producto();
				$producto->setIdproducto( $_POST["idproducto"] );
				$producto->setDescripcion( $_POST["descripcion"] );
				$producto->setEstado(1);
				$producto->setIdcategoriaproducto( $_POST["idcategoriaproducto"] );
				$producto->setIdtela( $_POST["idtela"] );
				$dao = new ProductoDAO();
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

				$dao = new ProductoDAO();
				if( $dao->eliminar( $idproducto ) )
					$informacion["respuesta"] = "bien";
				else
					$informacion["respuesta"] = "error";

			}else{
				$informacion["respuesta"] = "id_indefinido";
			}
			
			return ( json_encode($informacion) );
		}

		public function listarProductoCompleto(){
			$dao = new ProductoDAO();
			return $dao->listarProductoCompleto();
		}

		public function listarPorCategoria(){
			$dao = new ProductoDAO();
			$idcategoriaproducto = $_POST["idcategoriaproducto"];
			return $dao->listarPorCategoria( $idcategoriaproducto );
		}

		public function buscar(){
			$dao = new ProductoDAO();
			$descripcion = $_POST["descripcion"];
			return $dao->buscar( $descripcion );
		}

		public function asignar(){
			$dao = new ProductoDAO();
			$items = $_POST["items"];
			return $dao->asignar( $items );
		}

	}
?>