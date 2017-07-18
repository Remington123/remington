<?php 
	class CategoriaProducto{

		private $idcategoriaproducto;
		private $descripcion;
		private $estado;

		public function __construct(){
			$this->idcategoriaproducto=0;
			$this->descripcion="";
			$this->estado=0;
		}

		public function getIdcategoriaproducto() : int{
			return $this->idcategoriaproducto;
		}

		public function setIdcategoriaproducto(int $idcategoriaproducto){
			$this->idcategoriaproducto = $idcategoriaproducto;
		}

		public function getDescripcion() : string{
			return $this->descripcion;
		}

		public function setDescripcion(string $descripcion){
			$this->descripcion = $descripcion;
		}

		public function getEstado() : int{
			return $this->estado;
		}

		public function setEstado(int $estado){
			$this->estado = $estado;
		}
	}
 ?>