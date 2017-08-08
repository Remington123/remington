<?php 

	class Modelo{

		private $idmodelo;
		private $descripcion;
		private $estado;
		private $idcategoriaproducto;

		public function __construct(){
			$this->idmodelo = 0;
			$this->descripcion = "";
			$this->estado = 0;
			$this->idcategoriaproducto = 0;
		}

		public function getIdmodelo() :int{
		return $this->idmodelo;
		}

		public function setIdmodelo(int $idmodelo){
			$this->idmodelo = $idmodelo;
		}

		public function getDescripcion() :string{
			return $this->descripcion;
		}

		public function setDescripcion(string $descripcion){
			$this->descripcion = $descripcion;
		}

		public function getEstado() :int{
			return $this->estado;
		}

		public function setEstado(int $estado){
			$this->estado = $estado;
		}

		public function getIdcategoriaproducto() :int{
				return $this->idcategoriaproducto;
		}

		public function setIdcategoriaproducto(int $idcategoriaproducto){
			$this->idcategoriaproducto = $idcategoriaproducto;
		}

	}
 ?>