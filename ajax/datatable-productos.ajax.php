<?php
require_once "../controladores/productos_venta.controlador.php";
require_once "../modelos/productos_venta.modelo.php";

require_once "../controladores/categorias_producto.controlador.php";
require_once "../modelos/categorias_producto.modelo.php";

class TablaProductos{
  public function mostrarTablaProductos(){


    $item = null;
    $valor = null;
    $orden = "ventas";

   	$productos = ControladorProductosVenta::ctrMostrarProductoVenta($item, $valor, $orden);
 		//  var_dump($productos);

     $datosJson = '{
       "data": [';
       for ($i=0; $i < count($productos); $i++) {
         /*=============================================
  	 		TRAEMOS LA IMAGEN
   			=============================================*/
 		 	$imagen = "<img src='".$productos[$i]["imagen"]."' width='40px'>";
         /*=============================================
  	 		TRAEMOS LA CATEGORÍA
   			=============================================*/
	  	$item = "id_categoria_producto";
 		  	$valor = $productos[$i]["id_categoria"];
 		  	$categorias = ControladorCategoriasProducto::ctrMostrarCategoriasProducto($item, $valor);
     /*=============================================
  	 		TRAEMOS LAS ACCIONES
   			=============================================*/

 		  	$botones = "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' id_producto='".$productos[$i]["id_producto"]."' data-toggle='modal' data-target='#EditProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' id_producto='".$productos[$i]["id_producto"]."' imagen='".$productos[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>";

         $datosJson .='[
 			      "'.($i+1).'",
 			      "'.$productos[$i]["nombre_producto"].'",
 			      "'.$productos[$i]["descripcion_producto"].'",
 			      "'.$imagen.'",
 			      "'.$categorias["nombre_categoria_producto"].'",
 			      "'.$productos[$i]["precio_venta"].'",
 			      "'.$botones.'"
 			    ],';
       }
     $datosJson = substr($datosJson, 0, -1);
     $datosJson .= ']

   }';
   echo $datosJson;
  }

}
/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();


 ?>
