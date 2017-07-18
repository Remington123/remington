<?php

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');
	include 'CategoriaProducto.php';

	class CategoriaProductoDAO implements Consultas{

		public function listar(){
			echo "listar";
		}
		public function registrar($objeto) : bool{
			return true;
		}
		public function modificar($objeto) : bool{
			return true;
		}
		public function eliminar(int $id) : bool{
			return false;
		}
	}

	//Instanciando un objeto de la clase CategoriaProductoDAO
	$dao = new CategoriaProductoDAO();
	//Crear un objeto de la CategoriaProducto (Entidad)
	$categoria = new CategoriaProducto();
	//Seteando al objeto $categoria
	$categoria->setIdcategoriaproducto( 100 );
	$categoria->setDescripcion("Camisas");
	$categoria->setEstado( 1 );

	print_r($categoria);
	//Acceder al método registrar y a la vez, voy a pasar como parámetro el objeto $categoria;
	//$dao->registrar( $categoria );

	//Para hacer pequras pruebas usar el var_dump() o  print_r();
	//var_dump( $dao->registrar( $categoria ) );


 ?>