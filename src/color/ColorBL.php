<?php
	include 'ColorDAO.php';
	include 'Color.php';

	class ColorBL{
		private $dao=null;
		private $validar = null;

		public function listar(){
			$dao = new ColorDAO();
			$dao->listar();
		}

		public function registrar() : string{
			return "";					
		}
		
		public function modificar() : string{
			return "";
		}

		public function eliminar() :string{
			return "";
		}

		public function llenarCombo(){
			$dao = new ColorDAO();
			return $dao->llenarCombo();
		}
	}
?>