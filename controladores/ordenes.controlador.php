<?php

class ControladorOrdenes{

  /*=============================================
	MOSTRAR ORDENES DEL CLIENTE
	=============================================*/
  static public function ctrMostrarOrdenes($item, $valor){

    $tabla = "ventas";
    $respuesta = ModeloOrdenes::mdlMostrarOrdenes($tabla, $item, $valor);
    return $respuesta;

  }
}
 ?>
