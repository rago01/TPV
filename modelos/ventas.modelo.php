<?php

require_once "conexion.php";

class ModeloVentas{

  /*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function mdlMostrarVentas($tabla, $item, $valor){

		if($item != null){
			$sql ="SELECT * FROM $tabla
				 WHERE $item = :$item ORDER BY fecha_venta DESC";
			$stmt = Conexion::conectar()->prepare($sql);
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();

		}else{
			$sql ="SELECT v.id_venta,resp_venta,hora_venta,fecha_venta,metodo_pago,total,u.id_user id_user,u.nombres nombres_usuario,u.apellidos apellidos_usuario,
										c.id_cliente id_cliente,c.nombres nombres_cliente,c.apellidos apellidos_cliente,compras
											FROM $tabla v INNER JOIN users u on u.id_user=v.resp_venta
											INNER JOIN clientes c on c.id_cliente=v.id_cliente ORDER BY fecha_venta ASC";
			$stmt = Conexion::conectar()->prepare($sql);
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close();
		$stmt = null;
	}

	/*=============================================
	REGISTRO DE VENTA
	=============================================*/

	static public function mdlIngresarVenta($tabla, $datos){


		$sql ="INSERT INTO $tabla(id_cliente, resp_venta, hora_venta, fecha_venta, productos, metodo_pago, total, estado_venta)
		 VALUES ( :id_cliente, :resp_venta, :hora_venta,:fecha_venta, :productos,:metodo_pago, :total, :estado_venta)";
		$stmt = Conexion::conectar()->prepare($sql);

		$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
		$stmt->bindParam(":resp_venta", $datos["resp_venta"], PDO::PARAM_INT);
		$stmt->bindParam(":hora_venta", $datos["hora_venta"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha_venta", $datos["fecha_venta"], PDO::PARAM_INT);
		$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
		$stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
		$stmt->bindParam(":estado_venta", $datos["estado_venta"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return $sql;

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR VENTA
	=============================================*/

	static public function mdlEditarVenta($tabla, $datos){


		$sql ="UPDATE $tabla SET id_cliente = :id_cliente, resp_venta = :resp_venta, hora_venta= :hora_venta,
		fecha_venta = :fecha_venta, productos = :productos, metodo_pago = :metodo_pago, total = :total,
		estado_venta= :estado_venta WHERE id_venta = :id_venta";

		$stmt = Conexion::conectar()->prepare($sql);

		$stmt->bindParam(":id_venta", $datos["id_venta"], PDO::PARAM_INT);
		$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
		$stmt->bindParam(":resp_venta", $datos["resp_venta"], PDO::PARAM_INT);
		$stmt->bindParam(":hora_venta", $datos["hora_venta"], PDO::PARAM_INT);
		$stmt->bindParam(":fecha_venta", $datos["fecha_venta"], PDO::PARAM_INT);
		$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
		$stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
		$stmt->bindParam(":estado_venta", $datos["estado_venta"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return $sql;

		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
ELIMINAR VENTA
=============================================*/

static public function mdlEliminarVenta($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_venta = :id_venta");
	$stmt -> bindParam(":id_venta", $datos, PDO::PARAM_INT);
	if($stmt -> execute()){
		return "ok";
	}else{
		return $sql;
	}

	$stmt -> close();
	$stmt = null;
	}

	/*=============================================
RANGO FECHAS
=============================================*/

static public function mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal){

	if($fechaInicial == null){
		$sql = "SELECT v.id_venta,hora_venta,fecha_venta,metodo_pago,total,u.nombres nombres_usuario,u.apellidos apellidos_usuario,
									 c.nombres nombres_cliente,c.apellidos apellidos_cliente
									 FROM $tabla v INNER JOIN users u on u.id_user=v.resp_venta
									 INNER JOIN clientes c on c.id_cliente=v.id_cliente ORDER BY id_venta ASC";
		$stmt = Conexion::conectar()->prepare($sql);
		$stmt -> execute();
		return $stmt -> fetchAll();

	}else if($fechaInicial == $fechaFinal){

		$sql = "SELECT v.id_venta,hora_venta,fecha_venta,metodo_pago,total,u.nombres nombres_usuario,u.apellidos apellidos_usuario,
									 c.nombres nombres_cliente,c.apellidos apellidos_cliente
									 FROM $tabla v INNER JOIN users u on u.id_user=v.resp_venta
									 INNER JOIN clientes c on c.id_cliente=v.id_cliente WHERE fecha_venta like '%$fechaFinal%'";
		$stmt = Conexion::conectar()->prepare($sql);
		$stmt -> bindParam(":fecha_venta", $fechaFinal, PDO::PARAM_STR);
		$stmt -> execute();

		return $stmt -> fetchAll();

	}else{

		$fechaActual = new DateTime();
		$fechaActual ->add(new DateInterval("P1D"));
		$fechaActualMasUno = $fechaActual->format("Y-m-d");

		$fechaFinal2 = new DateTime($fechaFinal);
		$fechaFinal2 ->add(new DateInterval("P1D"));
		$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

		if($fechaFinalMasUno == $fechaActualMasUno){
			$sql="SELECT v.id_venta,hora_venta,fecha_venta,metodo_pago,total,u.nombres nombres_usuario,u.apellidos apellidos_usuario,
										c.nombres nombres_cliente,c.apellidos apellidos_cliente
											FROM $tabla v INNER JOIN users u on u.id_user=v.resp_venta
											INNER JOIN clientes c on c.id_cliente=v.id_cliente WHERE fecha_venta BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'";
			$stmt = Conexion::conectar()->prepare($sql);

		}else{

			$sql="SELECT v.id_venta,hora_venta,fecha_venta,metodo_pago,total,u.nombres nombres_usuario,u.apellidos apellidos_usuario,
										c.nombres nombres_cliente,c.apellidos apellidos_cliente FROM $tabla v INNER JOIN users u on u.id_user=v.resp_venta
											INNER JOIN clientes c on c.id_cliente=v.id_cliente WHERE fecha_venta BETWEEN '$fechaInicial' AND '$fechaFinal'";
			$stmt = Conexion::conectar()->prepare($sql);

		}
		$stmt -> execute();
		return $stmt -> fetchAll();
	}

}

/*=============================================
SUMAR EL TOTAL DE VENTAS
=============================================*/

static public function mdlSumaTotalVentas($tabla){
	$stmt = Conexion::conectar()->prepare("SELECT SUM(total) as total FROM $tabla");
	$stmt -> execute();
	return $stmt -> fetch();
	$stmt -> close();
	$stmt = null;

}
}




?>
