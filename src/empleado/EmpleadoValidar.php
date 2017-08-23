<?php 
	include (dirname(__FILE__) . '/../comunes/IValidarDatosObtenidosFormulario.php');

	class EmpleadoValidar implements IValidarDatosObtenidosFormulario{

		public function datosObtenidosFormulario( $accion ) : bool{
			$camposConValores = false;

			if( $accion == "registrar" ){
				if( empty( $_POST["idempleado"] ) )
					$_POST["idempleado"] = "1";
			}

			if( $accion == "modificar" ){
				if( empty( $_POST["idempleado"]) )
					$_POST["idempleado"] = "0";
			}

			if( !empty( $_POST["idempleado"] ) &&
				!empty( $_POST["nombres"] ) &&
				!empty( $_POST["dni"] ) &&
				!empty( $_POST["email"] ) &&
				!empty( $_POST["contrasena"] ) &&
				!empty( $_POST["direccion"] ) &&
				!empty( $_POST["fechanacimiento"] ) &&
				!empty( $_POST["celular"] ) &&
				!empty( $_POST["idtipousuario"] ) ){
				$camposConValores = true;
			}
		}
			public function idPrimarioObtenidoFormulario() : bool{
				$idConValor = false;

				if( !empty( $_POST["idempleado"] ) )
					$idConValor = true;

				return $idConValor;
		}
	}

 ?>