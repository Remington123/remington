<?php 

	class PedidoGeneradorCodigo{

		private $dato = 0;
		private $cont = 1;
		private $num = "";
		private $can = 0;

		/*public function __contruct(){
			$this->dato = 0;
			$this->cont = 1;
			$this->num = "";
			$this->can = 0;
		}*/

		public function generar(int $dato){
			/*Se podría validar con el año, es decir, una vez, que termine un año, vuelva la cuenta en 1: CP00001*/
			$this->dato = $dato;

			if( $this->dato >=9999 && $this->dato < 99999 ){
				$this->can = $this->cont + $this->dato;
				$this->num = "CP". $this->can;
			}
			if( $this->dato >=999 && $this->dato < 9999 ){
				$this->can = $this->cont + $this->dato;
				$this->num = "CP0". $this->can;
			}
			if( $this->dato >=99 && $this->dato < 999 ){
				$this->can = $this->cont + $this->dato;
				$this->num = "CP00". $this->can;
			}
			if( $this->dato >=9 && $this->dato < 99 ){
				$this->can = intval( $this->cont + $this->dato);
				$this->num = "CP000". $this->can;
			}
			if( $this->dato >=1 && $this->dato < 9 ){
				$this->can = $this->cont + $this->dato ;
				$this->num = "CP0000". $this->can;
			}
			if( $this->dato == 0 ){
				$this->can = $this->cont + $this->dato;
				$this->num = "CP0000". $this->can;
			}

		}

		public function serie() : string{
			return $this->num;
		}
	}

 ?>