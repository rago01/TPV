<?php
require_once "conexion.php";

class ModeloCategorias{

// CREAR CATEGORIAS

static public function mdlIngresarCategoriasInventario($tabla, $datos){
  $sql = "INSERT INTO $tabla (nombre_categoria_inventario, estado) VALUES (:nombre_categoria_inventario, :estado)";
  $stmt = Conexion::conectar()->prepare($sql);
	$stmt->bindParam(":nombre_categoria_inventario", $datos['nombre_categoria_inventario'], PDO::PARAM_STR);
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

static public function mdlMostrarCategoriasInventario($tabla, $item, $valor){

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

static public function mdlEditarCategoria($tabla, $datos){

  $sql="UPDATE $tabla SET nombre_categoria_inventario = :nombre_categoria_inventario WHERE id_categoria_inventario = :id_categoria_inventario";
  $stmt = Conexion::conectar()->prepare($sql);

  $stmt -> bindParam(":nombre_categoria_inventario", $datos["nombre_categoria_inventario"], PDO::PARAM_STR);
  $stmt -> bindParam(":id_categoria_inventario", $datos["id_categoria_inventario"], PDO::PARAM_INT);

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

static public function mdlBorrarCategoria($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_categoria_inventario = :id_categoria_inventario");
    $stmt -> bindParam(":id_categoria_inventario", $datos, PDO::PARAM_INT);

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
