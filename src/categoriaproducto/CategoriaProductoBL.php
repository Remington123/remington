<?php 	

	include 'CategoriaProductoDAO.php';
	include 'CategoriaProducto.php';
	include 'CategoriaProductoValidar.php';

class CategoriaProductoBL{
	private $dao = null;
	private $validar = null;

	public function listar(){
		$dao = new CategoriaProductoDAO();
		return $dao->listar();
	}

	public function registrar() :string{
		$informacion = [];
		$validar = new CategoriaProductoValidar();
		if( $validar->datosObtenidosFormularario("registrar") ){
			$categoriaproducto = new producto();
			$categoriaproducto->setDescripcion( $_POST["descripcion"] );
			$producto->setEstado(1);

			$dao = new CategoriaProductoDAO();
			$dao->registrar( $categoriaproducto ) ? 
				$informacion["respuesta"] = "ok_registro" : $informacion["respuesta"] = "error_registro";
		}else{
			$informacion["respuesta"] = "llenar_datos";
		}

		return ( json_encode($informacion));
		}

	public function modificar() :string{
		$informacion = [];
		$validar = new CategoriaProducto();
		if( $validar->datosObtenidosFormularario("modificar") ) { 		$categoriaproducto = new  CategoriaProducto();
		$categoriaproducto->setIdcategoriaProducto( $_POST["descripcion"] );
		$categoriaproducto->setEstado(1);

		$dao = new CategoriaProductoDAO();
		$dao->modificar( $producto ) ? $informacion["respuesta"] = "ok_modificar" : $informacion["respuesta"] = "error_modificar";
	}else{
		$informacion["respuesta"] = "llenar_datos";
	}

	return ( json_encode($informacion));

	}

	public function eliminar() :string{
		$informacion = [];
		$validar = new CategoriaProducto();
		if( $validar->idPrimarioObtenidoFormulario()){
			$idcategoriaproducto = $_POST[
			"idcategoriaproducto"];

		$dao = new CategoriaProducto();

		if( $dao->eliminar( $idcategoriaproducto ) )
			$informacion["respuesta"] = "ok_eliminacion";
		else
			$informacion["respuesta"] = "error_eliminacion";

		}else{
			$informacion["respuesta"] = "idcategoriaproducto_indefinido";
		}

		return ( json_encode($informacion) );
	}
}

 ?>