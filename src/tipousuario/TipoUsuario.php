<?php 
	
	class TipoUsuario{
		private $idusuario;
		private $descripcion;
		private $nivel;

		public function __construct(){
			$this->idusuario = 0;
			$this->descripcion = "";
			$this->nivel = 1;
		}

		public function getIdusuario() : int{
			return $this->idusuario;
		}

		public function setIdusuario(int $idusuario){
			$this->idusuario = $idusuario;
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