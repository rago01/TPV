<?php

require_once "conexion.php";

class ModeloUsuarios{
  /*=============================================
  MOSTRAR USUARIO
  =============================================*/

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
  /*=============================================
REGISTRAR USUARIO
	=============================================*/

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

  /*=============================================
	EDITAR USUARIO
	=============================================*/
  static public function mdlEditarUsuario($tabla, $datos){

     $sql="UPDATE $tabla set id_perfil = :perfil, nombres = :nombres, apellidos = :apellidos, t_doc = :t_doc, doc = :doc, email = :email, direccion = :direccion,
    celular = :celular, clave = :clave WHERE id_user = :id_user";
     $stmt = Conexion::conectar()->prepare($sql);
     $stmt->bindParam(":id_user", $datos['id_user'], PDO::PARAM_STR);
     $stmt->bindParam(":perfil", $datos['perfil'], PDO::PARAM_STR);
     $stmt->bindParam(":nombres", $datos['nombres'], PDO::PARAM_STR);
     $stmt->bindParam(":apellidos", $datos['apellidos'], PDO::PARAM_STR);
     $stmt->bindParam(":t_doc", $datos['t_doc'], PDO::PARAM_STR);
     $stmt->bindParam(":doc", $datos['doc'], PDO::PARAM_STR);
     $stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
     $stmt->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
     $stmt->bindParam(":celular", $datos['celular'], PDO::PARAM_STR);
     $stmt->bindParam(":clave", $datos['clave'], PDO::PARAM_STR);

     if ($stmt -> execute()) {
       return "ok";
     }else {
       return $sql;
     }

     $stmt -> close();
     $stmt = null;
  }
  /*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

  static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

    $sql="UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2";
    $stmt = Conexion::conectar()->prepare($sql);
    $stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

    if($stmt -> execute()){
			return "ok";
		}else{
			return $sql;
		}

		$stmt -> close();
		$stmt = null;
  }
}


?>
