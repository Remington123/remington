<?php 
	
	class Tela {

		private $idtela;
		private $descripcion;
		private $color;
		private $estado;

		public function __construct(){
			$this->idtela = 0;
			$this->descripcion = "";
			$this->color = "";
			$this->estado = 0;
		}


	public function getIdtela() :int{
	return $this->idtela;
	}

	public function setIdtela(int $idtela){
		$this->idtela = $idtela;
	}

	public function getDescripcion() :string{
		return $this->descripcion;
	}

	public function setDescripcion(string $descripcion){
		$this->descripcion = $descripcion;
	}

	public function getColor() :string{
		return $this->color;
	}

	public function setColor(string $color){
		$this->color = $color;
	}

	public function getEstado() :int{
		return $this->estado;
	}

	public function setEstado(int $estado){
		$this->estado = $estado;
	}

	}

?>