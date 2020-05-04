<?php

class ControladorCategorias{

  static public function ctrMostrarCategorias($item, $valor){
    $tabla = "categorias_productos";
    $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);
    return $respuesta;
  }



}




?>
