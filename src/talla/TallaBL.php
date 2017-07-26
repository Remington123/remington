<?php
	include 'TallaDAO.php';
	include 'Talla.php';

	class TallaBL{
		private $dao=null;

		public function listar(){
			$dao = new TallaDAO();
			$dao->listar();
		}

		public function registrar() : string{
			$informacion = [];

			$talla = new Talla();
			//Agregar los datos del formulario al objeto
			$talla->setNombre( $_POST["nombre"] );
			$talla->setAcronimo( $_POST["acronimo"] );
			$talla->setEstado(1);//por defecto uno

			$dao = new TallaDAO();
			$dao->registrar( $talla ) ? $informacion["respuesta"] = "ok_registro" : $informacion["respuesta"] = "error_registro";

			return ( json_encode($informacion) );		
		}
		
		public function modificar() : string{
			$informacion = [];
			$talla = new Talla();
			$talla->setIdtalla( $_POST["idtalla"] );
			$talla->setNombre( $_POST["nombre"] );
			$talla->setAcronimo( $_POST["acronimo"] );
			$cliente->setEstado(1);//por defecto uno

			$dao = new TallaDAO();
			
			if( $dao->modificar( $talla ) )
				$informacion["respuesta"] = "ok_modificacion";
			else
				$informacion["respuesta"] = "error_modificacion";

			return ( json_encode($informacion) );
		}
	}
?>