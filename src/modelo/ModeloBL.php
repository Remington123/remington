<?php
	include 'ModeloDAO.php';
	include 'Modelo.php';

	class ModeloBL{
		
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

		public function llenarCombo(){
	        $dao = new ModeloDAO();
			$idcategoriaproducto = $_POST["idcategoriaproducto"];
			return $dao->llenarCombo( $idcategoriaproducto );
		}

	}











?>
