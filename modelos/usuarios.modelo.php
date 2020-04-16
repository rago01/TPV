<?php

require "conexion.php";

class ModeloUsuarios{
  //Mostrar usuarios _________________________________

  static public function MdlMostrarUsuarios($tabla,$item,$valor){
    $sql="SELECT * FROM $tabla WHERE $item = :$item"
    $stmt = Conexion::conectar()->prepare();
  }
}


?>
