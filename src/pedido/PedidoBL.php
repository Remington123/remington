<?php

include 'PedidoDAO.php';
include 'Pedido.php';
class PedidoBl{
    private $dao =null;
    public function listar(){
    	$dao =new PedidoDAO();
    	$dao->listar();    	
    }

public function registrar() :string{

	$informacion =[];

	$pedido =new Pedido();
	$pedido->setFecha( $_POST["fecha"]);
	$pedido->setIdpedido( 1 );
	$pedido->setTotal($_POST["total"]);


$dao = new pedidoDAO();
$dao->registrar( $pedido ) ? $informacion["respuesta"] = "ok_registro" : $informacion["respuesta"] = "error_registro";

return ( json_encode($informacion));

}
public function modificar() :string{

$informacion = [];
			$pedido = new Cliente();
			$pedido->setFecha( $_POST["fecha"] );
			$pedido->setIdpedido( 1 );
			$pedido->setTotal( $_POST["total"] );


			$dao =new PedidoDAO();
			if ($dao->modificar($pedido))
				$informacion["respuesta"] = "ok_modificacion";
			else
				$informacion["respuesta"] = "error_modificacion";

  return ( json_encode($informacion) );


}

}


?>














