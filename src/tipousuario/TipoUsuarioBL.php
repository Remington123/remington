<?php 
	include 'TipoUsuarioDAO.php';
	include 'TipoUsuario.php';

	class TipoUsuarioBl{
		private $dao = null;

		public function listar(){
			$dao = new TipoUsuarioDAO();
			return $dao->listar();
		}

		public function registrar() : string{
			return true;
		}

		public function modificar() : string{
			return true;
		}

		public function eliminar(int $id) : string{
			return true;
		}
	}
 ?>