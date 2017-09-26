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
		if( $validar->datosObtenidosFormulario("registrar") ){
			$categoriaproducto = new CategoriaProducto();
			$categoriaproducto->setDescripcion( $_POST["descripcion"] );
			$categoriaproducto->setEstado(1);

			$dao = new CategoriaProductoDAO();
			$dao->registrar( $categoriaproducto ) ? 
				$informacion["respuesta"] = "bien" : $informacion["respuesta"] = "error";
		}else{
			$informacion["respuesta"] = "llenar_datos";
		}

		return ( json_encode($informacion));
		}

	public function modificar() :string{
		$informacion = [];
		$validar = new CategoriaProductoValidar();
		if( $validar->datosObtenidosFormulario("modificar") ) { 		
		$categoriaproducto = new  CategoriaProducto();
		$categoriaproducto->setIdcategoriaproducto( $_POST["idcategoriaproducto"] );
		$categoriaproducto->setDescripcion( $_POST["descripcion"] );
		$categoriaproducto->setEstado(1);

		$dao = new CategoriaProductoDAO();
		$dao->modificar( $categoriaproducto ) ? $informacion["respuesta"] = "bien" : $informacion["respuesta"] = "error";
	}else{
		$informacion["respuesta"] = "llenar_datos";
	}

	return ( json_encode($informacion));

	}

	public function eliminar() :string{
		$informacion = [];
		$validar = new CategoriaProducto();
		if( $validar->idPrimarioObtenidoFormulario()){
			$idcategoriaproducto = $_POST["idcategoriaproducto"];

		$dao = new CategoriaProducto();

		if( $dao->eliminar( $idcategoriaproducto ) )
			$informacion["respuesta"] = "bien";
		else
			$informacion["respuesta"] = "error";

		}else{
			$informacion["respuesta"] = "id_indefinido";
		}

		return ( json_encode($informacion) );
	}
}

 ?>