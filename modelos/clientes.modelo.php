<?php

require_once "conexion.php";

class ModeloClientes{

  static public function mdlMostrarClientes($tabla,$item,$valor){

    if ($item != null) {
      $sql="SELECT * FROM $tabla WHERE $item = :$item ";
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
REGISTRAR CLIENTE
  =============================================*/

  static public function mdlIngresarCliente($tabla, $datos){
   echo $sql="INSERT INTO $tabla (id_perfil, nombres, apellidos, celular,  email, direccion, compras)
          VALUES (:perfil, :nombres, :apellidos,:celular, :email, :direccion, :compras)";
    $stmt = Conexion::conectar()->prepare($sql);

    $stmt->bindParam(":perfil", $datos['perfil'], PDO::PARAM_STR);
    $stmt->bindParam(":nombres", $datos['nombres'], PDO::PARAM_STR);
    $stmt->bindParam(":apellidos", $datos['apellidos'], PDO::PARAM_STR);
    $stmt->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
    $stmt->bindParam(":celular", $datos['celular'], PDO::PARAM_STR);
    $stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
    $stmt->bindParam(":compras", $datos['compras'], PDO::PARAM_STR);

    if ($stmt->execute()) {
      return "ok";
    }else{
      return "error";
    }
    $stmt->close();
    $stmt = null;
  }

  /*=============================================
	ACTUALIZAR CLIENTE
	=============================================*/

	static public function mdlActualizarCliente($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id_cliente = :id_cliente");
		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id_cliente", $valor, PDO::PARAM_STR);

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
