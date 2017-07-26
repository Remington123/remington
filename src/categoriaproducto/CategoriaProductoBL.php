<?php 	

class CategoriaProductoBL{
	private $dao=null;

	public function listar(){
		$dao = new CategoriaProductoDAO();
		$dao->listar();
	}

	public function registrar() :string{
		$informacion = [];

		$categoriaproducto = new CategoriaProducto();

		$categoriaproducto->setDescripcion( $_POST["descripcion"] );
		$estado->setEstado(1);

		$dao = new CategoriaProductoDAO();
		$dao->registrar( $categoriaproducto ) ? $informacion["respuesta"] = "ok_registro" : $informacion["respuesta"] = "error_registro";

		return ( jason_encode($informacion) );



	}

	public function modificar() :string{
		$informacion = [];
		$categoriaproducto = new  CategoriaProducto();
		$categoriaproducto->setIdcategoriaProducto( $_POST["descripcion"] );
		$categoriaproducto->setEstado(1);


		$dao = new CategoriaProducto();

		if( $dao->modificar( $categoriaproducto ) )
			$informacion["respuesta"] = "ok_modificacion";

		return ( jason_encode($informacion) );
	}
}

 ?>