<?php 
	include 'ConfeccionDAO.php';
	include 'Confeccion.php';
	include 'ConfeccionValidar.php';

	class ConfeccionBL{
		private $dao = null;
		private $validar = null;

		public function listar(){
			$dao = new ConfeccionDAO();
			return $dao->listar();
		}

		public function registrar() :string{

			$informacion = [];
			$validar = new ConfeccionValidar();
			if( $validar->datosObtenidosFormulario( "registrar") ){
				$confeccion = new Confeccion();
				$confeccion->setDescripcion( $_POST["descripcion"] );
				$confeccion->setFecha( $_POST["fecha"] );
				$confeccion->setIdcliente( $_POST["idcliente"] );
				$confeccion->setEstado(1);


				$dao = new ConfeccionDAO();
				$dao->registrar( $confeccion ) ? $informacion["respuesta"] = "ok_registro" : $informacion["respuesta"] = "error_registro";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion) );
		}

		public function modificar() :string{

			$informacion = [];
			$validar = new ConfeccionValidar();
			if( $validar->datosObtenidosFormulario( "modificar" ) ){
				$confeccion = new Confeccion();
				$confeccion->setIdconfeccion( $_POST["idconfeccion"]);
				$confeccion->setDescripcion( $_POST["descripcion"] );
				$confeccion->setFecha( $_POST["fecha"] );
				$confeccion->setIdcliente( $_POST["idcliente"] );
				$confeccion->setEstado(1);

				$dao = new ConfeccionDAO();
				$dao->modificar( $confeccion) ? $informacion["respuesta"] = "ok_modificar" : $informacion["respuesta"] = "error_modificar";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion) );
		}

		public function eliminar() :string{
			$informacion = [];
			$validar = new ConfeccionValidar();
			if( $validar->idPrimarioObtenidoFormulario() ){
				$idconfeccion = $_POST["idconfeccion"];

				$dao = new ConfeccionDAO();
				if( $dao->eliminar( $idconfeccion ) )
					$informacion["respuesta"] = "ok_eliminacion";
				else
					$informacion["respuesta"] = "error_eliminacion";

			}else{
				$informacion["respuesta"] = "idconfeccion_indefinido";
			}

			return ( json_encode($informacion) );
		}
	}


 ?>




















