<?php 

	class Producto {

		private $idproducto;
		private $descripcion;		
		private $estado;/*(0:eliminado, 1: nuevo, 2: asignado)*/
		private $idtela;
		private $idcategoriaproducto; 

		public function __construct(){
			$this->idproducto = 0;
			$this->descripcion = "";
			$this->estado = 0;			
			$this->idtela = 0;
			$this->idcategoriaproducto = 0;
		}

		public function getIdproducto() :int{
			return $this->idproducto;
		}

		public function setIdproducto(int $idproducto){
			$this->idproducto = $idproducto;
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

		public function getIdtela() :int{
			return $this->idtela;
		}

		public function setIdtela(int $idtela){
			$this->idtela = $idtela;
		}

		public function getIdcategoriaproducto() :int{
			return $this->idcategoriaproducto;
		}

		public function setIdcategoriaproducto(int $idcategoriaproducto){
			$this->idcategoriaproducto = $idcategoriaproducto;
		}
	}

 ?>