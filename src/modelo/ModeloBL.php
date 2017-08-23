<?php
	include 'ModeloDAO.php';
	include 'Modelo.php';
	include 'ModeloValidar.php';

	class ModeloBL{
		private $dao = null;
		private $validar = null;
		
		public function listar(){
	        $dao = new ModeloDAO();
			$dao->listar();
		}

		public function registrar() : string{
			$informacion =[];
			$modelo =new Modelo();
			$modelo->setDescripcion($_POST["descripcion"]);

			$dao = new ModeloDAO();
			$dao->registrar( $modelo) ? $informacion["respuesta"] = "ok_registro" : $informacion["respuesta"] = "error_registro";
			return (json_encode($informacion));
		}
		 
		public function modificar() :string{
			$informacion =[];
			$modelo =new Modelo();
			$modelo->setDescripcion($_POST["descripcion"]);
			$dao =new ModeloDAO();
					
			if( $dao->modificar( $modelo ) )
				$informacion["respuesta"] = "ok_modificacion";
			else
				$informacion["respuesta"] = "error_modificacion";

			return ( json_encode($informacion) );
		}

		public function eliminar() :string{
			$informacion = [];			
			$validar = new ModeloValidar();
			if( $validar->idPrimarioObtenidoFormulario() ){
				$idmodelo = $_POST["idmodelo"];

				$dao = new  ModeloDAO();
				if( $dao->eliminar( $idmodelo ) )
					$informacion["respuesta"] = "ok_eliminacion";
				else
					$informacion["respuesta"] = "error_eliminacion";

			}else{
				$informacion["respuesta"] = "idmodelo_indefinido";
			}
			
			return ( json_encode($informacion) );
		}

		public function llenarCombo(){
	        $dao = new ModeloDAO();
			$idcategoriaproducto = $_POST["idcategoriaproducto"];
			return $dao->llenarCombo( $idcategoriaproducto );
		}

	}











?>
