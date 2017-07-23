<?php 

	class Producto {

		private $idproducto;
		private $descripcion;
		private $precio;
		private $precioventa;
		private $stock;
		private $stockactual;
		private $estado;
		private $idmodelo;
		private $idtalla;
		private $idtela;
		private $idcategoriaproducto; 

		public function __construct(){
			$this->idproducto = 0;
			$this->descripcion = "";
			$this->precio = 0;
			$this->precioventa = 0;
			$this->stock = 0;
			$this->stockactual = 0;
			$this->estado = 0;
			$this->idmodelo = 0;
			$this->idtalla = 0;
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

	public function getPrecio() :float{
		return $this->precio;
	}

	public function setPrecio(float $precio){
		$this->precio = $precio;
	}

	public function getPrecioventa() :float{
		return $this->precioventa;
	}

	public function setPrecioventa(float $precioventa){
		$this->precioventa = $precioventa;
	}

	public function getStock() :int{
		return $this->stock;
	}

	public function setStock(int $stock){
		$this->stock = $stock;
	}

	public function getStockactual() :int{
		return $this->stockactual;
	}

	public function setStockactual(int $stockactual){
		$this->stockactual = $stockactual;
	}

	public function getEstado() :int{
		return $this->estado;
	}

	public function setEstado(int $estado){
		$this->estado = $estado;
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