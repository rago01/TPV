<?php

require_once "conexion.php";

class ModeloVentas{

  /*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function mdlMostrarVentas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE
        $item = :$item ORDER BY fecha_venta DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY fecha_venta ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

}




?>
