<?php 
	include 'PaginaDAO.php';
	include 'Pagina.php';

	class PaginaBL{
		private $dao = null;

		public function listar(){
			$dao = new PaginaDAO();
			return $dao->listar();
		}

		public function registrar($objeto) : bool{
			return true;			
		}

		public function modificar($objeto) : bool{
			return true;
		}

		public function eliminar(int $id) : bool{
			return true;
		}

	}
 ?>