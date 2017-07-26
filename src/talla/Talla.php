<?php 

	class Talla{
		
		private $idtalla;
		private $nombre;
		private $acronimo;
		private $estado;

		public function __construct(){
			$this->idtalla = 0;
			$this->nombre = "";
			$this->acronimo = "";
			$this->estado = 0;
		}

	public function getIdtalla() :int{
		return $this->idtalla;
	}

	public function setIdtalla(int $idtalla){
		$this->idtalla = $idtalla;
	}

	public function getNombre() :string{
		return $this->nombre;
	}

	public function setNombre(string $nombre){
		$this->nombre = $nombre;
	}

	public function getAcronimo() :string{
		return $this->acronimo;
	}

	public function setAcronimo(string $acronimo){
		$this->acronimo = $acronimo;
	}

	public function getEstado() :int{
		return $this->estado;
	}

	public function setEstado(int $estado){
		$this->estado = $estado;
	}

	}

 ?>