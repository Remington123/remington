<?php 

	class DetalleProducto{
		private $iddetalleproducto;
		private $idproducto;
		private $idmodelo;
		private $idtalla;
		private $idcolor;
		private $urlimagen;
		private $stock;
		private $precio;
		private $estado;

		public function __contruct(){
			$this->iddetalleproducto = 0;
			$this->idproducto = 0;
			$this->idmodelo = 0;
			$this->idtalla = 0;
			$this->idcolor = 0;
			$this->urlimagen = "";
			$this->stock = 0;
			$this->precio = 0;
			$this->estado = 0;
		}

		public function getIddetalleproducto() :int{
			return $this->iddetalleproducto;
		}

		public function setIddetalleproducto(int $iddetalleproducto){
			$this->iddetalleproducto = $iddetalleproducto;
		}

		public function getIdproducto() :int{
			return $this->idproducto;
		}

		public function setIdproducto(int $idproducto){
			$this->idproducto = $idproducto;
		}

		public function getIdmodelo() :int{
			return $this->idmodelo;
		}

		public function setIdmodelo(int $idmodelo){
			$this->idmodelo = $idmodelo;
		}

		public function getIdtalla() :int{
			return $this->idtalla;
		}

		public function setIdtalla(int $idtalla){
			$this->idtalla = $idtalla;
		}

		public function getIdcolor() :int{
			return $this->idcolor;
		}

		public function setIdcolor(int $idcolor){
			$this->idcolor = $idcolor;
		}

		public function getUrlimagen() :string{
			return $this->urlimagen;
		}

		public function setUrlimagen(string $urlimagen){
			$this->urlimagen = $urlimagen;
		}

		public function getStock() :int{
			return $this->stock;
		}

		public function setStock(int $stock){
			$this->stock = $stock;
		}

		public function getPrecio() :float{
			return $this->precio;
		}

		public function setPrecio(float $precio){
			$this->precio = $precio;
		}

		public function getEstado() :int{
			return $this->estado;
		}

		public function setEstado(int $estado){
			$this->estado = $estado;
		}
	}
 ?>