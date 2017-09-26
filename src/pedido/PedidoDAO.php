<?php
	include (dirname(__FILE__). '/../comunes/Conexion.php'); 
	include (dirname(__FILE__) . '/../comunes/Consultas.php');
	include 'PedidoGeneradorCodigo.php';

	class PedidoDAO implements Consultas{

		public function listar(){
			$conexion =new Conexion();
			try{
				$cnn =$conexion->getConexion();
				$sql ="SELECT * FROM  pedido;";
				$statement=$cnn->prepare($sql);
				$statement->execute();

				$data["data"] = [];//arreglo vacio
				while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$data["data"][] = $resultado;
				}
				return json_encode($data);
		    }catch (throwable $e){
		    	echo $e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
		}

		public function listarPedido( $idpedido ){
			$conexion =new Conexion();
			$statement = null;
			try{
				$cnn =$conexion->getConexion();
				$sql =" SELECT p.idpedido, fecha, total, p.idcliente, 
				CONCAT( nombres, ' ', apellidopaterno, ' ', apellidomaterno ) AS cliente
						FROM pedido p
						INNER JOIN cliente c
						ON p.idcliente = c.idcliente
						WHERE p.idpedido = ? ";

				$statement=$cnn->prepare($sql);
				$statement->bindParam(1, $idpedido, PDO::PARAM_INT);
				$statement->execute();

				$data["data"] = [];//arreglo vacio
				while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$data["data"][] = $resultado;
				}
				return json_encode($data);
		    }catch (throwable $e){
		    	echo $e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
		}
		
		public function obtenerCodigoGenerado( $cnn ) :string{
			$codigoGenerado = "";

			$sql = "SELECT MAX(idpedido) AS idpedido FROM pedido";
			$statement=$cnn->prepare($sql);
			$statement->execute();
			$idpedido = 0;
			$codigoGenerado = "";
			while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
				$idpedido = $resultado["idpedido"];
			}

			if( $idpedido == null ){
					$codigoGenerado = "CP00001";				
			}else{
				$codigoGenerado = $idpedido;
				$subcadena = substr($codigoGenerado, 2, 6);
				$numero = intval( $subcadena );
				$codigo = new PedidoGeneradorCodigo();
				$codigo->generar( $numero );
				$codigoGenerado = $codigo->serie();
			}				
			return $codigoGenerado;
		}

		public function guardarDetalle($idpedido, $detalle, $cnn ) :bool{
			$respuesta = false;
			foreach ( $detalle as $item ) {

				$sql = "INSERT INTO detallepedido(idpedido, idproducto, descripcion, cantidad, importe, idtalla, idcolor, urlimagen, estado) VALUES (?,?,?,?,?,?,?,?,?);";

				$idproducto = $item->getIdproducto();
				$descripcion = $item->getDescripcion();
				$cantidad = $item->getCantidad();
				$importe = $item->getImporte();
				$idtalla = $item->getIdtalla();
				$idcolor = $item->getIdcolor();
				$urlimagen = $item->getUrlimagen();
				$estado = 1;

				$statement = $cnn->prepare($sql);

				$statement->bindParam(1, $idpedido, PDO::PARAM_STR);//idpedido de la cabecera
				$statement->bindParam(2, $idproducto, PDO::PARAM_INT);
				$statement->bindParam(3, $descripcion, PDO::PARAM_STR);
				$statement->bindParam(4, $cantidad, PDO::PARAM_INT);
				$statement->bindParam(5, $importe, PDO::PARAM_INT);
				$statement->bindParam(6, $idtalla, PDO::PARAM_INT);
				$statement->bindParam(7, $idcolor, PDO::PARAM_INT);
				$statement->bindParam(8, $urlimagen, PDO::PARAM_STR);
				$statement->bindParam(9, $estado, PDO::PARAM_INT);

				$respuesta = $statement->execute();

				$this->descontarStock( $respuesta, $item, $cnn );
			}
			return $respuesta;
		}

		public function descontarStock( $resultado, $item, $cnn ){
			$respuesta = false;
			if( $resultado ){

				$sql = "SELECT iddetalleproducto, stock FROM detalleproducto 
						WHERE idproducto = :idproducto AND idcolor = :idcolor AND idtalla = :idtalla; ";

				$statement=$cnn->prepare($sql);

				$idproducto = $item->getIdproducto();
				$idcolor = $item->getIdcolor();
				$idtalla = $item->getIdtalla();

				$statement->bindParam(":idproducto", $idproducto , PDO::PARAM_INT);
				$statement->bindParam(":idcolor", $idcolor , PDO::PARAM_INT);
				$statement->bindParam(":idtalla", $idtalla , PDO::PARAM_INT);
				$statement->execute();

				$stockActual = 0;
				$iddetalleproducto = 0;
				while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$stockActual = $resultado["stock"];
					$iddetalleproducto = $resultado["iddetalleproducto"];
				}
				$stockActual = $stockActual - $item->getCantidad();
				


				$sql2 = "UPDATE detalleproducto SET stock =:stock
						WHERE iddetalleproducto =:iddetalleproducto;";//implementar
				$statement = $cnn->prepare($sql2);
				
				$statement->bindParam(":stock", $stockActual , PDO::PARAM_INT);
				$statement->bindParam(":iddetalleproducto", $iddetalleproducto , PDO::PARAM_INT);
				$respuesta = $statement->execute();
			}

			return $respuesta;
		}

		public function guardarPedido($cabecera, $detalle) :bool{
			$conexion = new Conexion();
			$respuesta = false;
			$respuestadetalle = false;
			$statement = null;
			try{				
				$cnn = $conexion->getConexion();				
				$codigoGenerado = $this->obtenerCodigoGenerado( $cnn );
				$cabecera->setIdpedido( $codigoGenerado );//setear codigo autogenerado
				

				$sql = "INSERT INTO pedido(idpedido, fecha, idcliente, total) VALUES (?,?,?,?);";
				$idpedido = $cabecera->getIdpedido();
				$fecha =$cabecera->getFecha();
				$idcliente = $cabecera->getIdcliente();
				$total =$cabecera->getTotal();

				$statement = $cnn->prepare($sql);
				
				$statement->bindParam(1, $idpedido, PDO::PARAM_STR);
				$statement->bindParam(2, $fecha, PDO::PARAM_STR);
				$statement->bindParam(3, $idcliente, PDO::PARAM_INT);
				$statement->bindParam(4, $total, PDO::PARAM_INT);

				$respuesta = $statement->execute();

				if( $respuesta ){
					$respuestadetalle = $this->guardarDetalle($idpedido, $detalle, $cnn);
					/*if( $respuestadetalle ){						
							$_SESSION["carrito"] = array();
							unset($_SESSION["carrito"]);
					}*/
				}


			}catch(Exception $e){
				echo "EXCEPCIÓN ".$e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
			return $respuestadetalle; 
		}

		public function registrar($objeto) :bool{
			$conexion = new Conexion();
			$respuesta = false;
			$statement = null;
			try{


				/*$cnn = $conexion->getConexion();

				$sql = "SELECT MAX(idpedido) AS idpedido FROM pedido";
				$statement=$cnn->prepare($sql);
				$statement->execute();
				$idpedido = 0;
				$codigoGenerado = "";
				while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
					$idpedido = $resultado["idpedido"];
				}
				$codigoGenerado = $this->obtenerCodigoGenerado( $idpedido );
				echo $codigoGenerado;
				
				//Meter transacciones, commit, rollback

				$sql = "INSERT INTO pedido(idpedido, fecha, idcliente, total) VALUES (?,?,?,?);";
				$fecha =$objeto->getFecha();
				$idcliente = $objeto->getIdcliente();
				$total =$objeto->getTotal();

				$statement = $cnn->prepare($sql);
				
				$statement->bindParam(1, $codigoGenerado, PDO::PARAM_STR);
				$statement->bindParam(2, $fecha, PDO::PARAM_STR);
				$statement->bindParam(3, $idcliente, PDO::PARAM_INT);
				$statement->bindParam(4, $total, PDO::PARAM_INT);

				$respuesta = $statement->execute();*/

			}catch(Exception $e){
				echo "EXCEPCIÓN ".$e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
			return $respuesta; 
		}

		public function modificar($objeto) :bool{
			$conexion = new Conexion();
			$respuesta = false;
			$statement = null;
			try{
				$cnn = $conexion->getConexion();
				$sql = "UPDATE pedido SET fecha := fecha,
										  idcliente := idcliente,
										  total := total
						WHERE idpedido := idpedido";
				$fecha =$objeto->getFecha();
				$idcliente = $objeto->getIdcliente();
				$total =$objeto->getTotal();

				$statement = $cnn->prepare($sql);

				$statement->bindParam(":fecha", $fecha, PDO::PARAM_STR);
				$statement->bindParam(":idcliente", $idcliente, PDO::PARAM_INT);
				$statement->bindParam(":total", $total, PDO::PARAM_INT);
				$statement->bindParam(":idpedido", $total, PDO::PARAM_INT);

				$respuesta = $statement->execute();

			}catch(Exception $e){
				echo "EXCEPCIÓN ".$e->getMessage();
			}finally{
				$statement->closeCursor();
				$conexion = null;
			}
			return $respuesta; 
		}

		public function eliminar(int $id) : bool{
			$respuesta = false;			
			return $respuesta; 
		}
	}


?>