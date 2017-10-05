<?php 

	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');

	class ReportesDAO{
		private $conexion = null;

		public function reportePedidos( $fechaInicio, $fechaFin ){
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
				$sql = "SELECT idpedido, p.idcliente, nombres, CONCAT(apellidopaterno,' ',apellidomaterno) AS apellidos, email,total, p.fecha 
						FROM pedido p
						INNER JOIN cliente c
						ON p.idcliente = c.idcliente
						WHERE p.fecha between ? AND ?;";
				$statement=$cnn->prepare($sql);
				$statement->bindParam(1, $fechaInicio, PDO::PARAM_STR);
				$statement->bindParam(2, $fechaFin, PDO::PARAM_STR);
				$statement->execute();

				$data["data"] = [];//arreglo vacio
				while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$data["data"][] = $resultado;
				}
				return json_encode($data);
			}catch (Throwable $e) {
				return $e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
		}

		public function reporteProductos( $fechaInicio, $fechaFin ){
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
				$sql = "SELECT pr.idproducto, pr.descripcion, p.fecha , SUM(dp.cantidad) AS cantidad ,SUM(dp.importe) AS total
						FROM pedido p
						INNER JOIN detallepedido dp
						ON p.idpedido = dp.idpedido
						INNER JOIN producto pr
						ON dp.idproducto = pr.idproducto
						WHERE fecha between ? AND ?
						GROUP BY pr.descripcion;";
				$statement=$cnn->prepare($sql);
				$statement->bindParam(1, $fechaInicio, PDO::PARAM_STR);
				$statement->bindParam(2, $fechaFin, PDO::PARAM_STR);
				$statement->execute();

				$data["data"] = [];//arreglo vacio
				while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$data["data"][] = $resultado;
				}
				return json_encode($data);
			}catch (Throwable $e) {
				return $e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}			
		}

		public function reporteClientes( $fechaInicio, $fechaFin ){
			$conexion = new Conexion();
			try {
				$cnn = $conexion->getConexion();
				$sql = "SELECT c.idcliente, nombres, CONCAT(apellidopaterno,' ',apellidomaterno) AS apellidos, dni, email, c.fecha FROM cliente c
						LEFT JOIN pedido p
						ON c.idcliente = p.idcliente
						WHERE (c.fecha between ? AND ? ) AND p.idcliente is null;";
				$statement=$cnn->prepare($sql);
				$statement->bindParam(1, $fechaInicio, PDO::PARAM_STR);
				$statement->bindParam(2, $fechaFin, PDO::PARAM_STR);
				$statement->execute();

				//$f1 = date( 'Y/m/d', $fechaInicio );
				//$f2 = date( 'Y/m/d', strtotime($fechaFin) );		

				$data["data"] = [];//arreglo vacio
				while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$data["data"][] = $resultado;
				}

				return json_encode($data);
			}catch (Throwable $e) {
				return $e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
		}
	}

 ?>