<?php 

	class ComprobantePago {

		private $idcomprobantepago;
		private $descripcion;
		private $idpedido;
		private $idtipopago;
		private $estado;

		public function __construct(){
			$this->idcomprobantepago = 0;
			$this->descripcion = "";
			$this->idpedido = 0;
			$this->idtipopago = 0;
			$this->estado = 0;
		}


	public function getIdcomprobantepago() :int{
		return $this->idcomprobantepago;
	}

	public function setIdcomprobantepago(int $idcomprobantepago){
		$this->idcomprobantepago = $idcomprobantepago;
	}

	public function getDescripcion() :string{
		return $this->descripcion;
	}

	public function setDescripcion(string $descripcion){
		$this->descripcion = $descripcion;
	}

	public function getIdpedido() :int{
		return $this->idpedido;
	}

	public function setIdpedido(int $idpedido){
		$this->idpedido = $idpedido;
	}

	public function getIdtipopago() :int{
		return $this->idtipopago;
	}

	public function setIdtipopago(int $idtipopago){
		$this->idtipopago = $idtipopago;
	}

	public function getEstado() :int{
		return $this->estado;
	}

	public function setEstado(int $estado){
		$this->estado = $estado;
	}

	}


 ?>