<?php 

	class Permiso {

		private $idpermiso;
		private $idtipousuario;
		private $idmodulo;
		private $estado;

		public function __construct(){
			$this->idpermiso = 0;
			$this->idtipousuario = 0;
			$this->idmodulo = 0;
			$this->estado = 0;
		}

		public function getIdpermiso() :int{
		return $this->idpermiso;
		}

		public function setIdpermiso(int $idpermiso){
			$this->idpermiso = $idpermiso;
		}

		public function getIdtipousuario() :int{
			return $this->idtipousuario;
		}

		public function setIdtipousuario(int $idtipousuario){
			$this->idtipousuario = $idtipousuario;
		}


		public function getIdmodulo() :int{
			return $this->idpagina;
		}

		public function setIdmodulo(int $idpagina){
			$this->idpagina = $idpagina;
		}

		public function getEstado() : int
			{
				return $this->estado;
			}

		public function getIdmodulo() : int{
			return $this->idmodulo;
		}

		public function setIdmodulo(int $idmodulo){
			$this->idmodulo = $idmodulo;
		}

		public function getEstado() : int{
			return $this->estado;
		}


		public function setEstado(int $estado){
			$this->estado = $estado;
		}

	}

 ?>