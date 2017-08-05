<?php 

	class Pagina{
		private $idpagina;
		private $modulo;
		private $pagina;
		private $icono;
		private $estado;

		public function __construct(){
			$this->idpagina = 0;
			$this->modulo = "";
			$this->pagina = "";
			$this->icono = "";
			$this->estado = 0;
		}

		public function getIdpagina() : int{
			return $this->idpagina;
		}

		public function setIdpagina(int $idpagina){
			$this->idpagina = $idpagina;
		}

		public function getModulo() : string{
			return $this->modulo;
		}

		public function setModulo(string $modulo){
			$this->modulo = $modulo;
		}

		public function getPagina() : string{
			return $this->pagina;
		}

		public function setPagina(string $pagina){
			$this->pagina = $pagina;
		}

		public function getIcono() : string{
			return $this->icono;
		}

		public function setIcono(string $icono){
			$this->icono = $icono;
		}

		public function getEstado() : int{
			return $this->estado;
		}

		public function setEstado(int $estado){
			$this->estado = $estado;
		}

	}

 ?>