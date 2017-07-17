<?php 

	interface Consultas{
		public function listar();
		public function registrar($objeto) : bool;
		public function modificar($objeto) : bool;
		public function eliminar(int $id) : bool;
	}
