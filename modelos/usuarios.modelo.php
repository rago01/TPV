<?php

require_once "conexion.php";

class ModeloUsuarios{
  //Mostrar usuarios _________________________________

  static public function mdlMostrarUsuarios($tabla,$item,$valor){

    if ($item != null) {
      $sql="SELECT * FROM $tabla WHERE $item = :$item";
      $stmt = Conexion::conectar()->prepare($sql);
      $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
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

  //Registro de usuario _______________________________________

  static public function mdlIngresarUsuario($tabla, $datos){
   echo $sql="INSERT INTO $tabla (id_perfil, nombres, apellidos, t_doc, doc, email, direccion, celular, clave, estado_user)
          VALUES (:perfil, :nombres, :apellidos, :t_doc, :doc, :email, :direccion, :celular, :clave, :estado_user)";
    $stmt = Conexion::conectar()->prepare($sql);

    $stmt->bindParam(":perfil", $datos['perfil'], PDO::PARAM_STR);
    $stmt->bindParam(":nombres", $datos['nombres'], PDO::PARAM_STR);
    $stmt->bindParam(":apellidos", $datos['apellidos'], PDO::PARAM_STR);
    $stmt->bindParam(":t_doc", $datos['t_doc'], PDO::PARAM_STR);
    $stmt->bindParam(":doc", $datos['doc'], PDO::PARAM_STR);
    $stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
    $stmt->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
    $stmt->bindParam(":celular", $datos['celular'], PDO::PARAM_STR);
    $stmt->bindParam(":clave", $datos['clave'], PDO::PARAM_STR);
    $stmt->bindParam(":estado_user", $datos['estado_user'], PDO::PARAM_STR);

    if ($stmt->execute()) {
      return "ok";
    }else{
      return "error";
    }
    $stmt->close();
    $stmt = null;
  }
}


?>
