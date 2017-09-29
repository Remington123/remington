<?php

	class Pedido {
		private $idpedido;
		private $fecha;
		private $idcliente;
		private $total;

		public function __construct(){
			$this->idpedido = "";
			$this->fecha = "";
			$this->idcliente = 0;
			$this->total = 0;
		}

		public function getIdpedido() :string{
		return $this->idpedido;
		}

		public function setIdpedido(string $idpedido){
			$this->idpedido = $idpedido;
		}

		public function getFecha() :string{
			return $this->fecha;
		}

		public function setFecha(string $fecha){
			$this->fecha = $fecha;
		}

		public function getIdcliente() :int{
			return $this->idcliente;
		}

		public function setIdcliente(int $idcliente){
			$this->idcliente = (int) trim($idcliente);
		}

		public function getTotal() :float{
			return $this->total;
		}

		public function setTotal(float $total){
			$this->total = $total;
		}
	}

?>