<?php

	class DetalleConfeccion {

		private $iddetalleconfeccion;
		private $nombre;
		private $medida;
		private $idconfeccion;

		public function __construct(){
			$this->iddetalleconfeccion = 0;
			$this->nombre = "";
			$this->medida = "";
			$this->idconfeccion = 0;
		}

	public function getIddetalleconfeccion() :int{
	return $this->iddetalleconfeccion;
	}

	public function setIddetalleconfeccion(int $iddetalleconfeccion){
		$this->iddetalleconfeccion = $iddetalleconfeccion;
	}

	public function getNombre() :string{
		return $this->nombre;
	}

	public function setNombre(string $nombre){
		$this->nombre = $nombre;
	}

	public function getMedida() :string{
		return $this->medida;
	}

	public function setMedida(string $medida){
		$this->medida = $medida;
	}

	public function getIdconfeccion() :int{
		return $this->idconfeccion;
	}

	public function setIdconfeccion(int $idconfeccion){
		$this->idconfeccion = $idconfeccion;
	}
	}

?>