<?php
	include 'PermisoDAO.php';
	include 'Permiso.php';

	class PermisoBl{
	    private $dao =null;

	    public function listar(){
	    	$dao = new PermisoDAO();
	    	$dao->listar()
	    }

	    public function registrar() : string{
			$informacion =[];
			$permiso = new Pedido();
			$permiso->setIdtipousuario( $_POST["idtipousuario"] );
			$permiso->setIdpagina( $_POST["idpagina"] );

			$dao = new PermisoDAO();
		    $dao->registrar( $permiso ) ? $informacion["respuesta"] = "ok_registro" : $informacion["respuesta"] = "error_registro";

			return ( json_encode($informacion));
		}

		public function modificar() : string{
			$informacion = [];
			$permiso = new Permiso();
			$permiso->setIdpermiso( $_POST["idpermiso"] );
			$permiso->setIdtipousuario( $_POST["idtipousuario"] );
			$permiso->setIdpagina( $_POST["idpagina"] );

			$dao = new PermisoDAO();
			if ($dao->modificar($permiso))
				$informacion["respuesta"] = "ok_modificacion";
			else
				$informacion["respuesta"] = "error_modificacion";

			return ( json_encode($informacion) );
		}

	}

?>

