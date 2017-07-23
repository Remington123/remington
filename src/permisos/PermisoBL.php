<?php
include 'PermisoDAO.php';
include 'Permiso.php';

class PedidoBl{
    private $dao =null;
    public function listar(){

    	$dao =new PermisoDAO();
    	$dao->listar()
    }

    public function registrar() :string{

	$informacion =[];

	$permiso =new Pedido();
	$permiso->setCategoria( $_POST["categoria"]);
	$permiso->setPaginas( $_POST["paginas"] );
	$permiso->setNivel($_POST["nivel"]);

	$dao = new PermisoDAO();
    $dao->registrar( $permiso ) ? $informacion["respuesta"] = "ok_registro" : $informacion["respuesta"] = "error_registro";

return ( json_encode($informacion));


}

public function modificar() :string{

$informacion = [];
			$permiso = new Cliente();
			$permiso->setCategoria( $_POST["categoria"] );
			$permiso->setPaginas( $_POST["paginas"] );
			$permiso->setNivel( $_POST["nivel"] );


			$dao =new PermisoDAO();
			if ($dao->modificar($permiso))
				$informacion["respuesta"] = "ok_modificacion";
			else
				$informacion["respuesta"] = "error_modificacion";

  return ( json_encode($informacion) );


}

}

?>

