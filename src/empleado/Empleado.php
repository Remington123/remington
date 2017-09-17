<?php 

	class Empleado{
		
		private $idempleado;
		private $nombre;
		private $apellidopaterno;
		private $apellidomaterno;
		private $dni;
		private $email;
		private $contrasena;
		private $direccion;
		private $celular;
		private $fechanacimiento;
		private $idtipousuario;
		private $estado;

		public function __construct(){
			$this->idempleado = 0;
			$this->nombre = "";
			$this->apellidopaterno = "";
			$this->apellidomaterno = "";
			$this->dni = "";
			$this->email = "";
			$this->contrasena = "";
			$this->direccion = "";
			$this->celular = "";
			$this->fechanacimiento = date( 'Y/m/d', time() );
			$this->idtipousuario = 1;
			$this->estado = 0;
		}

		public function getIdempleado() : int{
			return $this->idempleado;
		}

		public function setIdempleado(int $idempleado){
			$this->idempleado = $idempleado;
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

		public function getEmail() :string{
			return $this->email;
		}

		public function setEmail(string $email){
			$this->email = $email;
		}

		public function getContrasena() : string {
			return $this->contrasena;
		}

		public function setContrasena(string $dni){
			$this->contrasena = $dni;
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

		public function getFechanacimiento() : string{
			return $this->fechanacimiento;
		}

		public function setFechanacimiento(string $fechanacimiento){
			$this->fechanacimiento = $fechanacimiento;
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

		public function __toString(){
			return $this->nombre;
		}
	}
 ?>