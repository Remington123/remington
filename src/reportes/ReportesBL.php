<?php 

	include 'ReportesDAO.php';

	class ReportesBL{
		private $dao=null;

		public function reportePedidos(){
			$dao = new ReportesDAO();
			$fechaInicio = $_POST["fechaInicio"];
			$fechaFin = $_POST["fechaFin"];
			return $dao->reportePedidos( $fechaInicio, $fechaFin );
		}

		public function reporteProductos(){
			$dao = new ReportesDAO();
			$fechaInicio = $_POST["fechaInicio"];
			$fechaFin = $_POST["fechaFin"];
			return $dao->reporteProductos( $fechaInicio, $fechaFin );
		}

		public function reporteClientes(){
			$dao = new ReportesDAO();
			$fechaInicio = $_POST["fechaInicio"];
			$fechaFin = $_POST["fechaFin"];
			return $dao->reporteClientes( $fechaInicio, $fechaFin );
		}
	}

 ?>