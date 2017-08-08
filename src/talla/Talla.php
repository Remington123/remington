<?php 

	class Talla{
		
		private $idtalla;
		private $descripcion;
		private $estado;
		private $idcategoriaproducto;

		public function __construct(){
			$this->idtalla = 0;
			$this->descripcion = "";
			$this->estado = 0;
			$this->idcategoriaproducto = 0;
		}

		public function getIdtalla() :int{
			return $this->idtalla;
		}

		public function setIdtalla(int $idtalla){
			$this->idtalla = $idtalla;
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