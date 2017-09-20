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
			$modelo->setIdcategoriaproducto($_POST["idcategoriaproducto"]);

			$dao = new ModeloDAO();
			$dao->registrar( $modelo) ? $informacion["respuesta"] = "bien" : $informacion["respuesta"] = "error";
			return (json_encode($informacion));
		}
		 
		public function modificar() :string{
			$informacion =[];
			$modelo =new Modelo();
			$modelo->setIdmodelo($_POST["idmodelo"]);
			$modelo->setDescripcion($_POST["descripcion"]);
			//$modelo->setEstado($_POST["estado"]);
			$dao =new ModeloDAO();
					
			if( $dao->modificar( $modelo ) )
				$informacion["respuesta"] = "bien";
			else
				$informacion["respuesta"] = "error";

			return ( json_encode($informacion) );
		}

		public function eliminar() :string{
			$informacion = [];			
			$validar = new ModeloValidar();
			if( $validar->idPrimarioObtenidoFormulario() ){
				$idmodelo = $_POST["idmodelo"];

				$dao = new  ModeloDAO();
				if( $dao->eliminar( $idmodelo ) )
					$informacion["respuesta"] = "bien";
				else
					$informacion["respuesta"] = "error";

			}else{
				$informacion["respuesta"] = "id_indefinido";
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
