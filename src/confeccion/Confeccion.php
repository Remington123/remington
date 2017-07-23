<?php

	class Confeccion {

		private $idconfeccion;
		private $descripcion;
		private $fecha;
		private $idcliente;
		private $estado;

		public function __construct(){
			$this->idconfeccion = 0;
			$this->descripcion = "";
			$this->fecha = "";
			$this->idcliente = 0;
			$this->estado = 0;
		}

	
	public function getIdconfeccion() :int{
	return $this->idconfeccion;
	}

	public function setIdconfeccion(int $idconfeccion){
		$this->idconfeccion = $idconfeccion;
	}

	public function getDescripcion() :string{
		return $this->descripcion;
	}

	public function setDescripcion(string $descripcion){
		$this->descripcion = $descripcion;
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
		$this->idcliente = $idcliente;
	}

	public function getEstado() :int{
		return $this->estado;
	}

	public function setEstado(int $estado){
		$this->estado = $estado;
	}
	}
 

?>