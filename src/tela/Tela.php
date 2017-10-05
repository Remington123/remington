<?php 
	
	class Tela {
		private $idtela;
		private $descripcion;
		private $idcategoriaproducto;
		private $estado;

		public function __construct(){
			$this->idtela = 0;
			$this->descripcion = "";
			$this->$idcategoriaproducto = 0;
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

		public function getIdcategoriaproducto() :string{
			return $this->Idcategoriaproducto;
		}

		public function setColor(string $idcategoriaproducto){
			$this->Idcategoriaproducto = $Idcategoriaproducto;
		}

		public function getEstado() :int{
			return $this->estado;
		}

		public function setEstado(int $estado){
			$this->estado = $estado;
		}

	}

?>