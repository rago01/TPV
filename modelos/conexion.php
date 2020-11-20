<?php

class Conexion{

  static public function conectar(){
    try {

      $link = new PDO("mysql:host=localhost;dbname=rbkapopa_brayans",
                      "rbkapopa",
                      "@Programador3s");
      $link->exec("set names utf8");
      return $link;

    } catch (PDOException $e) {

      print "¡Error!: " . $e->getMessage() . "<br/>";
      die();

    }  
  }
}


?>
