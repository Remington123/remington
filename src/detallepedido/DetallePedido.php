<?php

 class DetallePedido {

 	private $iddetallepedido;
 	private $idpedido;
 	private $idproducto;
 	private $cantidad;
 	private $importe;

 	public function __construct(){
 		$this->iddetallepedido = 0;
 		$this->idpedido = 0;
 		$this->idproducto = 0;
 		$this->cantidad = 0;
 		$this->importe = 0;
 	}

 	public function getIddetallepedido() :int{
	return $this->iddetallepedido;
	}

	public function setIddetallepedido(int $iddetallepedido){
		$this->iddetallepedido = $iddetallepedido;
	}

	public function getIdpedido() :int{
		return $this->idpedido;
	}

	public function setIdpedido(int $idpedido){
		$this->idpedido = $idpedido;
	}

	public function getIdproducto() :int{
		return $this->idproducto;
	}

	public function setIdproducto(int $idproducto){
		$this->idproducto = $idproducto;
	}

	public function getCantidad() :int{
		return $this->cantidad;
	}

	public function setCantidad(int $cantidad){
		$this->cantidad = $cantidad;
	}

	public function getImporte() :float{
		return $this->importe;
	}

	public function setImporte(float $importe){
		$this->importe = $importe;
	}
 }


?>