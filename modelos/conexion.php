<?php

class Conexion{

  static public function conectar(){

      $link = new PDO("mysql:host=localhost;dbname=brayans",
                      "root",
                      "515t3m45");
      $link->exec("set names utf8");

      return $link;
  }
}


?>
