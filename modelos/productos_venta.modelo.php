<?php

require_once "conexion.php";

class ModeloProductosVenta{

  /*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

		static public function mdlMostrarProductosVenta($tabla, $item, $valor, $orden){

			if($item != null){

	      $sql="SELECT * FROM $tabla WHERE $item = :$item";

				$stmt = Conexion::conectar()->prepare($sql);
				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
				$stmt -> execute();
				return $stmt -> fetch();
			}else{
				$sql="SELECT p.*,c.id_categoria_producto,nombre_categoria_producto categoria FROM
	            $tabla p INNER JOIN  categorias_productos c on c.id_categoria_producto=p.id_categoria
	                  ORDER BY $orden DESC ";
				$stmt = Conexion::conectar()->prepare($sql);
				$stmt -> execute();
				return $stmt -> fetchAll();
			}
			$stmt -> close();
			$stmt = null;

	}

/*=============================================
REGISTRO DE PRODUCTO
=============================================*/
		static public function mdlIngresarProductoVenta($tabla, $datos){

			$sql ="INSERT INTO $tabla(id_categoria, nombre_producto,descripcion_producto, precio_venta,ventas, imagen)
			 VALUES (:id_categoria, :nombre_producto, :descripcion_producto, :precio_venta,:ventas, :imagen)";
			$stmt = Conexion::conectar()->prepare($sql);

			$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
			$stmt->bindParam(":nombre_producto", $datos["nombre_producto"], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion_producto", $datos["descripcion_producto"], PDO::PARAM_STR);
			$stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);
			$stmt->bindParam(":ventas", $datos["ventas"], PDO::PARAM_STR);
			$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);

			if($stmt->execute()){
				return "ok";
			}else{
				return $sql;
			}

			$stmt->close();
			$stmt = null;

		}

		/*=============================================
		EDICION DE PRODUCTO
		=============================================*/
				static public function mdlEditarProductoVenta($tabla, $datos){

					$sql ="UPDATE $tabla set id_categoria = :id_categoria, nombre_producto =:nombre_producto,descripcion_producto=:descripcion_producto,
					 precio_venta=:precio_venta, imagen=:imagen where id_producto = :id_producto";
					$stmt = Conexion::conectar()->prepare($sql);

					$stmt->bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_INT);
					$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
					$stmt->bindParam(":nombre_producto", $datos["nombre_producto"], PDO::PARAM_STR);
					$stmt->bindParam(":descripcion_producto", $datos["descripcion"], PDO::PARAM_STR);
					$stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);
					$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);

					if($stmt->execute()){
						return "ok";
					}else{
						return $sql;
					}

					$stmt->close();
					$stmt = null;

				}

				/*=============================================
BORRAR CATEGORIA
=============================================*/

static public function mdlBorrarProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_producto = :id_producto");

		$stmt -> bindParam(":id_producto", $datos, PDO::PARAM_INT);

	if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt -> close();
		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR PRODUCTO
	=============================================*/

	static public function mdlActualizarProductoVenta($tabla, $item1, $valor1, $valor){

		$sql="UPDATE $tabla SET $item1 = :$item1 WHERE id_producto = :id_producto";
		$stmt = Conexion::conectar()->prepare($sql);
		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id_producto", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){
			return $sql;
		}else{
			return $sql;
		}

		$stmt -> close();
		$stmt = null;
	}

	/*=============================================
MOSTRAR SUMA VENTAS
=============================================*/

static public function mdlMostrarSumaVentas($tabla){

	$stmt = Conexion::conectar()->prepare("SELECT SUM(ventas) as total FROM $tabla");

	$stmt -> execute();

	return $stmt -> fetch();

	$stmt -> close();

	$stmt = null;
}

}


 ?>
