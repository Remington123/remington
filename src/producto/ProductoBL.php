<?php
	include 'ProductoDAO.php';
	include 'Producto.php';

	class ProductoBL{
		private $dao=null;

		public function listar(){
			$dao = new ProductoDAO();
			return $dao->listar();
		}

	}
?>