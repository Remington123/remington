<?php 
	
	class Cliente{
		private $idcliente;
		private $nombre;
		private $apellidopaterno;
		private $apellidomaterno;
		private $dni;
		private $direccion;
		private $celular;
		private $ruc;
		private $idtipousuario;
		private $estado;
	}

	public function __construct(){
		$this->idcliente = 0;
		$this->nombre = "";
		$this->apellidopaterno = "";
		$this->apellidomaterno = "";
		$this->dni = "";
		$this->direccion = "";
		$this->celular = "";
		$this->ruc = "";
		$this->idtipousuario = null;
		$this->estado = 0;
	}

	public function getIdcliente() : int{
		return $this->idcliente;
	}

	public function setIdcliente(int $idcliente){
		$this->idcliente = $idcliente;
	}

	public function getNombre() : string{
		return $this->nombre;
	}

	public function setNombre(string $nombre){
		$this->nombre = $nombre;
	}

	public function getApellidopaterno() : string{
		return $this->apellidopaterno;
	}

	public function setApellidopaterno(string $apellidopaterno){
		$this->apellidopaterno = $apellidopaterno;
	}

	public function getApellidomaterno() : string{
		return $this->apellidomaterno;
	}

	public function setApellidomaterno(string $apellidomaterno){
		$this->apellidomaterno = $apellidomaterno;
	}

	public function getDni() : string {
		return $this->dni;
	}

	public function setDni(string $dni){
		$this->dni = $dni;
	}

	public function getDireccion() : string{
		return $this->direccion;
	}

	public function setDireccion(string $direccion){
		$this->direccion = $direccion;
	}

	public function getCelular() : string{
		return $this->celular;
	}

	public function setCelular(string $celular){
		$this->celular = $celular;
	}

	public function getRuc() : string{
		return $this->ruc;
	}

	public function setRuc(string $ruc){
		$this->ruc = $ruc;
	}

	public function getIdtipousuario() : int{
		return $this->idtipousuario;
	}

	public function setIdtipousuario(int $idtipousuario){
		$this->idtipousuario = $idtipousuario;
	}

	public function getEstado() : int{
		return $this->estado;
	}

	public function setEstado(int $estado){
		$this->estado = $estado;
	}
?>
