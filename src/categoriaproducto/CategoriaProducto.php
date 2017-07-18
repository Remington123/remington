<?php 
	class CategoriaProducto{
		private $idcategoriaproducto;
		private $descripcion;
		private $estado;
		public fuction __construct(){
			$this->idcategoriaproducto=0;
			$this->descripcion="";
			$this->estado=0;
		}

			public function getIdcategoriaproducto(){
		return $this->idcategoriaproducto;
	}

	public function setIdcategoriaproducto($idcategoriaproducto){
		$this->idcategoriaproducto = $idcategoriaproducto;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}
	}
 ?>