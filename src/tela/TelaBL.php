<?php
	include 'TelaDAO.php';
	include 'Tela.php';
	include 'TelaValidar.php';

	class TelaBL{
		private $dao=null;
		private $validar = null;

		public function listar(){
			$dao = new TelaDAO();
			$dao->listar();
		}

		public function registrar() : string{
			$informacion = [];
			$tela = new Tela();
			$tela->setDescripcion( $_POST["descripcion"] );
			$tela->setIdcategoriaproducto( $_POST["idcategoriaproducto"] );
			$tela->setEstado(1);

			$dao = new TelaDAO();
			$dao->registrar( $tela ) ? $informacion["respuesta"] = "bien" : $informacion["respuesta"] = "error";

			return ( json_encode($informacion) );

		}
		
		public function modificar() : string{
			$informacion = [];
			$tela = new Tela();
			$tela->setIdtela( $_POST["idtela"] );
			$tela->setDescripcion( $_POST["descripcion"] );
			$tela->setEstado(1);

			$dao = new TelaDAO();
			$dao->modificar( $tela ) ? $informacion["respuesta"] = "bien" : $informacion[
				"respuesta"] = "error";
			return ( json_encode($informacion) );
		}

		public function eliminar() : string{
			$informacion = [];
			$validar = new TelaValidar();
			if( $validar->idPrimarioObtenidoFormulario()){
				$idtela = $_POST["idtela"];

				$dao = new TelaDAO();
				if( $dao->eliminar( $idtela ) )
					$informacion["respuesta"] = "bien";
				else
					$informacion["respuesta"] = "error";

			}else{
				$informacion["respuesta"] = "id_indefinido";
			}

			return ( json_encode($informacion) );

		}

		public function llenarCombo(){
			$dao = new TelaDAO();
			$idcategoriaproducto = $_POST["idcategoriaproducto"];
			return $dao->llenarComboPorCategoria( $idcategoriaproducto );

		}
	}
?>
