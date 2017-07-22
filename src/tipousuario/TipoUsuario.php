<?php 
	
	class TipoUsuario{
		private $idtipousuario;
		private $descripcion;
		private $nivel;

		public function __construct(){
			$this->idtipousuario = 0;
			$this->descripcion = "";
			$this->nivel = 1;
		}

		public function getIdtipousuario() : int{
			return $this->idtipousuario;
		}

		public function setIdtipousuario(int $idtipousuario){
			$this->idtipousuario = $idtipousuario;
		}

		public function getDescripcion() : string{
			return $this->descripcion;
		}

		public function setDescripcion(string $descripcion){
			$this->descripcion = $descripcion;
		}

		public function getNivel() : int{
			return $this->nivel;
		}

		public function setNivel(int $nivel){
			$this->nivel = $nivel;
		}

		public function __toString(){
			return $this->descripcion;
		}
	}

 ?>