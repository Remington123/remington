<?php 

	class Permiso {

		private $idpermiso;
		private $idtipousuario;
		private $idpagina;

		public function __construct(){
			$this->idpermiso = 0;
			$this->idtipousuario = 0;
			$this->idpagina = 0;
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

		public function getIdpagina() :int{
			return $this->idpagina;
		}

		public function setIdpagina(int $idpagina){
			$this->idpagina = $idpagina;
		}
	}

 ?>