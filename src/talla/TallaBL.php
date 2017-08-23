<?php
	include 'TallaDAO.php';
	include 'Talla.php';
	include 'TallaValidar.php';

	class TallaBL{
		private $dao=null;
		private $validar = null;

		public function listar(){
			$dao = new TallaDAO();
			$dao->listar();
		}

		public function registrar() : string{
			$informacion = [];
			$validar = new TallaValidar();
			if( $validar->datosObtenidosFormulario( "registrar" ) ){
				$talla = new Talla();
				$talla->setNombre( $_POST["nombre"] );
				$talla->setAcronimo( $_POST["acronimo"] );
				$talla->setEstado(1);//por defecto uno

				$dao = new TallaDAO();
				$dao->registrar( $talla ) ? $informacion["respuesta"] = "ok_registro" : $informacion["respuesta"] = "error_registro";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion) );
					
		}
		
		public function modificar() : string{
			$informacion = [];
			$talla = new Talla();
			if( $validar->datosObtenidosFormulario( "modificar" ) ){
				$talla = new Talla();
				$talla->setIdtalla( $_POST["idtalla"] );
				$talla->setNombre( $_POST["nombre"] );
				$talla->setAcronimo( $_POST["acronimo"] );
				$talla->setEstado(1);

			$dao = new TallaDAO();
			$dao->modificar( $talla ) ? $informacion["respuesta"] = "ok_modificacion" : $informacion["respuesta"] = "error_modificacion";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion) );
		}

			public function eliminar() :string{
			$informacion = [];			
			$validar = new ProductoValidar();
			if( $validar->idPrimarioObtenidoFormulario() ){
				$idtalla = $_POST["idtalla"];

				$dao = new TallaDAO();
				if( $dao->eliminar( $idtalla ) )
					$informacion["respuesta"] = "ok_eliminacion";
				else
					$informacion["respuesta"] = "error_eliminacion";

			}else{
				$informacion["respuesta"] = "idtalla_indefinido";
			}
			
			return ( json_encode($informacion) );


		}	
		public function llenarCombo(){
			$dao = new TallaDAO();
			$idcategoriaproducto = $_POST["idcategoriaproducto"];
			return $dao->llenarCombo( $idcategoriaproducto );
		}
	}
?>