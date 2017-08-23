<?php 
	include 'DetalleConfeccionDAO.php';
	include 'DetalleConfeccion.php';
	include 'DetalleConfeccionValidar.php';

	class DetalleConfeccionBL{
		private $dao = null;
		private $validar = null;

		public function listar(){
			$dao = new DetalleConfeccionDAO();
			return $dao->listar();
		}

		public function registrar() :string{

			$informacion = [];
			$validar = new DetalleConfeccionValidar();
			if( $validar->
			datosObtenidosFormulario("registrar")  {
				$detalleconfeccion = new DetalleConfeccion();
				$detalleconfeccion->setNombre( $_POST["nombre"] );
				$detalleconfeccion->setMedida( $_POST["medida"] );
				$detalleconfeccion->setIdconfeccion( $_POST["setidconfeccion"] );


				$dao = new DetalleConfeccionDAO();
				$dao->registrar( $detalleconfeccion ) ? $informacion["respuesta"] = "ok_registro" : $informacion["respuesta"] = "error_registro";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion));
		}

		public function modificar() :string{

			$informacion = [];
			$validar = new DetalleConfeccionValidar();
			if( $validar->datosObtenidosFormulario( "modificar") ){
				$detalleconfeccion = new DetalleConfeccion();
				$detalleconfeccion->setIddetalleconfeccion( $_POST["setiddetalleconfeccion"] );
				$detalleconfeccion->setNombre( $_POST["nombre"] );
				$detalleconfeccion->setMedida( $_POST["medida"] );
				$detalleconfeccion->setIdconfeccion( $_POST["idconfeccion"] );

				$dao = new DetalleConfeccionDAO();
				$dao->modificar( $detalleconfeccion) ? $informacion["respuesta"] = "ok_modificar" : $informacion["respuesta"] = "error_modificar";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion) );
		}

		public function eliminar() :string{
			$informacion = [];
			$validar = new DetalleConfeccionValidar();
			if( $validar->idPrimarionObtenidoFormulario() ){
				$setIddetalleconfeccion = $_POST["setIddetalleconfeccion"];

				$dao = new DetalleConfeccionDAO();
				if( $dao->eliminar( $idproducto))
					$informacion["respuesta"] = "ok_eliminacion";
				else
					$informacion["respuesta"] = "error_eliminacion";
			}else{
				$informacion["respuesta"] = "iddetalleconfeccion_indefinido";
			}

			return ( json_encode( $informacion) );
		}
	}



 ?>


















