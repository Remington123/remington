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
			$talla = new Talla();
			$talla->setDescripcion( $_POST["descripcion"] );
			$talla->setIdcategoriaproducto( $_POST["idcategoriaproducto"] );
			$talla->setEstado(1);//por defecto uno

			$dao = new TallaDAO();
			$dao->registrar( $talla ) ? $informacion["respuesta"] = "bien" : $informacion["respuesta"] = "error";			

			return ( json_encode($informacion) );					
		}
		
		public function modificar() : string{
			$informacion = [];
			$talla = new Talla();
			$talla->setIdtalla( $_POST["idtalla"] );
			$talla->setDescripcion( $_POST["descripcion"] );
			$talla->setEstado(1);

			$dao = new TallaDAO();
			$dao->modificar( $talla ) ? $informacion["respuesta"] = "bien" : $informacion["respuesta"] = "error";
			return ( json_encode($informacion) );
		}

		public function eliminar() :string{
			$informacion = [];			
			$validar = new TallaValidar();
			if( $validar->idPrimarioObtenidoFormulario() ){
				$idtalla = $_POST["idtalla"];

				$dao = new TallaDAO();
				if( $dao->eliminar( $idtalla ) )
					$informacion["respuesta"] = "bien";
				else
					$informacion["respuesta"] = "error";

			}else{
				$informacion["respuesta"] = "id_indefinido";
			}
			
			return ( json_encode($informacion) );

		}

		public function llenarCombo(){
			$dao = new TallaDAO();
			$idcategoriaproducto = $_POST["idcategoriaproducto"];
			return $dao->llenarCombo( $idcategoriaproducto );
		}

		public function llenarComboPorColor(){
			$dao = new TallaDAO();
			$idcolor = $_POST["idcolor"];
			$idproducto = $_POST["idproducto"];
			return $dao->llenarComboPorColor( $idcolor, $idproducto );
		}
	}
?>