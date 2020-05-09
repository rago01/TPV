<?php
require_once "../controladores/productos_venta.controlador.php";
require_once "../modelos/productos_venta.modelo.php";

class AjaxProductos{


  /*=============================================
   EDITAR PRODUCTO
   =============================================*/

  public $id_producto;
  public $traerProductos;
  public $nombreProducto;
  public function ajaxEditarProducto(){

      if ($this->traerProductos == 'ok') {
        $item = null;
        $valor = null;
        $respuesta = ControladorProductosVenta::ctrMostrarProductoVenta($item, $valor);

        echo json_encode($respuesta);
      }elseif ($this->nombreProducto != "") {
        $item = "nombre_producto";
        $valor = $this->nombreProducto;
        $respuesta = ControladorProductosVenta::ctrMostrarProductoVenta($item, $valor);

        echo json_encode($respuesta);
      }else {
        $item = "id_producto";
        $valor = $this->id_producto;
        $respuesta = ControladorProductosVenta::ctrMostrarProductoVenta($item, $valor);
        echo json_encode($respuesta);
      }
  }


}

//EDICION DE Usuario
if (isset($_POST['id_producto'])) {
  $editar = new AjaxProductos();
  $editar -> id_producto = $_POST['id_producto'];
  $editar -> ajaxEditarProducto();
}

//traer productos
if (isset($_POST['traerProductos'])) {
  $traerProductos = new AjaxProductos();
  $traerProductos -> traerProductos = $_POST['traerProductos'];
  $traerProductos -> ajaxEditarProducto();
}


//traer productos
if (isset($_POST['nombreProducto'])) {
  $traerProductos = new AjaxProductos();
  $traerProductos -> nombreProducto = $_POST['nombreProducto'];
  $traerProductos -> ajaxEditarProducto();
}


?>
