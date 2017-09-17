<?php
	include 'PermisoDAO.php';
	include 'Permiso.php';
	include 'ProductoValidar.php';

	class PermisoBl{
	    private $dao =null;
		private $validar = null;

	    public function listar(){
	    	$dao = new PermisoDAO();
	    	$dao->listar()
	    }

	    public function registrar() : string{

	    	$informacion = [];
			$validar = new PermisoValidar();
			if( $validar->datosObtenidosFormulario( "registrar" ) ){
				$permiso = new Permiso();
				$permiso->setIdtipousuario( $_POST["idtipousuario"] );
				$permiso->setIdmodulo( $_POST["idmodulo"] );
				$producto->setEstado(1);

				//agregar url de imagen del producto

				$dao = new PermisoDAO();
				$dao->registrar( $producto ) ? $informacion["respuesta"] = "ok_registro" : $informacion["respuesta"] = "error_registro";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion) );

		}

		public function modificar() : string{

			$informacion = [];
			$permiso = new PermisoValidar();
			if( $validar->datosObtenidosFormulario( "modificar" ) ){
				$permiso = new Permiso();
				$permiso->setIdpermiso( $_POST["idpermiso"] );
				$permiso->setIdtipousuario( $_POST["idtipousuario"] );
				$permiso->setIdmodulo( $_POST["idmodulo"] );
				$producto->setEstado(1);
				//agregar url de imagen del producto

				$dao = new PermisoDAO();
				$dao->modificar( $permiso ) ? $informacion["respuesta"] = "ok_modificar" : $informacion["respuesta"] = "error_modificar";
			}else{
				$informacion["respuesta"] = "llenar_datos";
			}

			return ( json_encode($informacion) );

		}

		public function eliminar() :string{
			$informacion = [];			
			$validar = new PermisoValidar();
			if( $validar->idPrimarioObtenidoFormulario() ){
				$idpermiso = $_POST["idproducto"];

				$dao = new PermisoDAO();
				if( $dao->eliminar( $idpermiso ) )
					$informacion["respuesta"] = "ok_eliminacion";
				else
					$informacion["respuesta"] = "error_eliminacion";

			}else{
				$informacion["respuesta"] = "idpermiso_indefinido";
			}
			
			return ( json_encode($informacion) );

		}

	}

?>

