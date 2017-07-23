<?php

	class TipoPago {
		private $idtipopago;
		private $nombre;
		private $descripcion;

		public function __construct(){
			$this->idtipopago = 0;
			$this->nombre = "";
			$this->descripcion = "";
		}

	public function getIdtipopago() :int{
	return $this->idtipopago;
	}

	public function setIdtipopago(int $idtipopago){
		$this->idtipopago = $idtipopago;
	}

	public function getNombre() :string{
		return $this->nombre;
	}

	public function setNombre(string $nombre){
		$this->nombre = $nombre;
	}

	public function getDescripcion() :string{
		return $this->descripcion;
	}

	public function setDescripcion(string $descripcion){
		$this->descripcion = $descripcion;
	}

	}

?>