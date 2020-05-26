<?php


class ModeloOrdenes{

static public function mdlMostrarOrdenes($tabla, $item, $valor){

  $sql="SELECT id_venta,resp_venta,hora_venta,fecha_venta,metodo_pago,total,estado_venta FROM $tabla
                ORDER BY id_venta ASC";
  $stmt = Conexion::conectar()->prepare($sql);
	$stmt -> execute();
	return $stmt -> fetchAll();

  $stmt -> close();
  $stmt = null;
  }
}



?>
