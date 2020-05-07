<?php
require_once "conexion.php";

class ModeloCategoriasProducto{

// CREAR CATEGORIAS

static public function mdlIngresarCategoriasProducto($tabla, $datos){
  $sql = "INSERT INTO $tabla (nombre_categoria_producto, estado) VALUES (:nombre_categoria_producto, :estado)";
  $stmt = Conexion::conectar()->prepare($sql);
	$stmt->bindParam(":nombre_categoria_producto", $datos['nombre_categoria_producto'], PDO::PARAM_STR);
  $stmt->bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return $sql;
		}

		$stmt->close();
		$stmt = null;
}

/*=============================================
MOSTRAR CATEGORIAS
=============================================*/

static public function mdlMostrarCategoriasProducto($tabla, $item, $valor){

  if($item != null){

    $sql="SELECT * FROM $tabla WHERE $item = :$item";
    $stmt = Conexion::conectar()->prepare($sql);
    $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
    $stmt -> execute();

    return $stmt -> fetch();

  }else{
    $sql="SELECT * FROM $tabla";
    $stmt = Conexion::conectar()->prepare($sql);
    $stmt -> execute();
    return $stmt -> fetchAll();
  }

  $stmt -> close();
  $stmt = null;

}

/*=============================================
EDITAR CATEGORIA
=============================================*/

static public function mdlEditarCategoriaProducto($tabla, $datos){

  $sql="UPDATE $tabla SET nombre_categoria_producto = :nombre_categoria_producto WHERE id_categoria_producto = :id_categoria_producto";
  $stmt = Conexion::conectar()->prepare($sql);

  $stmt -> bindParam(":nombre_categoria_producto", $datos["nombre_categoria_producto"], PDO::PARAM_STR);
  $stmt -> bindParam(":id_categoria_producto", $datos["id_categoria_producto"], PDO::PARAM_INT);

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

static public function mdlBorrarCategoriaProducto($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_categoria_producto = :id_categoria_producto");
    $stmt -> bindParam(":id_categoria_producto", $datos, PDO::PARAM_INT);

    if($stmt -> execute()){
      return "ok";
    }else{
      return "error";
    }

    $stmt -> close();
    $stmt = null;

  }
}




?>
