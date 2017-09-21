<?php

	 class DetallePedido {

	 	private $iddetallepedido;
	 	private $idpedido;
	 	private $idproducto;
	 	private $descripcion;
	 	private $cantidad;
	 	private $importe;
	 	private $idtalla;
	 	private $idcolor;
	 	private $urlimagen;
	 	private $estado;

	 	public function __construct(){
	 		$this->iddetallepedido = 0;
	 		$this->idpedido = 0;
	 		$this->idproducto = 0;
	 		$this->descripcion = "";
	 		$this->cantidad = 0;
	 		$this->importe = 0.0;
	 		$this->idtalla = 0;
	 		$this->idcolor = 0;
	 		$this->urlimagen = "";
	 		$this->estado = 0;
	 	}

	 	public function getIddetallepedido() :int{
		return $this->iddetallepedido;
		}

		public function setIddetallepedido(int $iddetallepedido){
			$this->iddetallepedido = $iddetallepedido;
		}

		public function getIdpedido() :int{
			return $this->idpedido;
		}

		public function setIdpedido(int $idpedido){
			$this->idpedido = $idpedido;
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

		public function getCantidad() :int{
			return $this->cantidad;
		}

		public function setCantidad(int $cantidad){
			$this->cantidad = $cantidad;
		}

		public function getImporte() :float{
			return $this->importe;
		}

		public function setImporte(float $importe){
			$this->importe = $importe;
		}

		public function getEstado() :int{
			return $this->estado;
		}

		public function setEstado(int $estado){
			$this->estado = $estado;
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

	}


?>