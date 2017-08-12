<?php 

	interface IValidarDatosObtenidosFormulario{
		public function datosObtenidosFormulario( $accion ) : bool;
		public function idPrimarioObtenidoFormulario() : bool;
	}

 ?>