<?php
	include 'TelaDAO.php';
	include 'Tela.php';

	class TelaBL{
		private $dao=null;

		public function listar(){
			$dao = new TelaDAO();
			return $dao->listar();
		}

		public function registrar() : string{
			$informacion = [];
			return true;	
		}
		
		public function modificar() : string{
			$informacion = [];
			return true;
		}

		public function eliminar() : string{
			$informacion = [];
			return true;
		}

		public function llenarCombo(){
			$dao = new TelaDAO();
			return $dao->llenarCombo();
		}
	}
?>