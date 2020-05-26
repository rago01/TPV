<?php

require_once "conexion.php";

class ModeloProveedores{

//CONSULTAR PROVEEDORES
  static public function mdlMostrarProveedores($tabla, $item, $valor){

    if ($item != null) {
      $sql="SELECT * FROM $tabla WHERE $item = '".$valor."' ";
      $stmt = Conexion::conectar()->prepare($sql);
      $stmt -> execute();
      return $stmt -> fetch();
    }else {
      $sql="SELECT * FROM $tabla";
      $stmt = Conexion::conectar()->prepare($sql);
      $stmt -> execute();
      return $stmt -> fetchAll();
    }
      $stmt -> close();
      $stmt = null;
  }

//INSERTAR PROVEEDORES

  static public function mdlCrearProveedor($tabla, $datos){

    $sql="INSERT INTO proveedores (resp_creacion,nombre, tipo_doc, doc, email, telefono, direccion, contacto)
          VALUES('".$datos["resp_user"]."','".$datos["nombre"]."','".$datos["tipo_doc"]."','".$datos["doc"]."',
                 '".$datos["email"]."','".$datos["telefono"]."','".$datos["direccion"]."','".$datos["contacto"]."')";
    $stmt = Conexion::conectar()->prepare($sql);

    if ($stmt->execute()) {
      return "ok";
    }else{
      return $sql;
    }
    $stmt->close();
    $stmt = null;

  }
}




?>
