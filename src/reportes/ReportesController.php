<?php 

	include 'ReportesBL.php';

	$opcion = $_POST["opcion"];
	$reportesBL = null;

	switch ( $opcion ) {
		case 'pedidosPorRangoFechas':
			$reportesBL = new ReportesBL();
			echo $reportesBL->reportePedidos();
		break;

		case 'clientesQueNoRealizaronPedidos':
			$reportesBL = new ReportesBL();
			echo $reportesBL->reporteClientes();
		break;
	}


 ?>