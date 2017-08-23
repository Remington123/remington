<?php 
	include 'PaginaDAO.php';
	include 'Pagina.php';
	include 'PaginaValidar.php';

	class PaginaBL{
		private $dao = null;
		private $validar = null;

		public function listar(){
			$dao = new PaginaDAO();
			return $dao->listar();
		}

		public function registrar($objeto) : string{

			$informacion = [];
			$validar = new PaginaValidar();
			if( $validar->datosObtenidosFormulario( "registrar" ) ){
				$pagina = new Pagina();
				$pagina->setPagina( $_POST["pagina"] );
				$pagina->setIcono( $_POST["icono"] );
				$pagina->setEstado(1);
				//agregar url de imagen del producto

				$dao = new PaginaDAO();
				$dao->registrar( $pagina ) ? $informacion["respuesta"] = "ok_registro" : $informacion["respuesta"] = "error_registro";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion) );
						
		}

		public function modificar($objeto) : string{

			$informacion = [];
			$validar = new PaginaValidar();
			if( $validar->datosObtenidosFormulario( "modificar" ) ){
				$pagina = new pagina();
				$pagina->setIdpagina( $_POST["idpagina"] );
				$pagina->setIdmodulo( $_POST["idmodulo"] );
				$pagina->setPagina( $_POST["pagina"] );
				$pagina->setIcono( $_POST["icono"] );
				$producto->setEstado(1);
				//agregar url de imagen del producto

				$dao = new PaginaDAO();
				$dao->modificar( $pagina ) ? $informacion["respuesta"] = "ok_modificar" : $informacion["respuesta"] = "error_modificar";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion) );
			
		}

		public function eliminar(int $id) : string{

			$informacion = [];			
			$validar = new PaginaValidar();
			if( $validar->idPrimarioObtenidoFormulario() ){
				$idpagina = $_POST["idpagina"];

				$dao = new PaginaDAO();
				if( $dao->eliminar( $idpagina ) )
					$informacion["respuesta"] = "ok_eliminacion";
				else
					$informacion["respuesta"] = "error_eliminacion";

			}else{
				$informacion["respuesta"] = "idpagina_indefinido";
			}
			
			return ( json_encode($informacion) );
			
		}

	}
 ?>