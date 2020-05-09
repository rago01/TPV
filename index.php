<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "modelos/usuarios.modelo.php";

require_once "controladores/categorias_inventario.controlador.php";
require_once "modelos/categorias_inventario.modelo.php";

require_once "controladores/categorias_producto.controlador.php";
require_once "modelos/categorias_producto.modelo.php";

require_once "controladores/productos_venta.controlador.php";
require_once "modelos/productos_venta.modelo.php";

require_once "controladores/ventas.controlador.php";
require_once "modelos/ventas.modelo.php";

require_once "controladores/clientes.controlador.php";
require_once "modelos/clientes.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla ->ctrPlantilla();
?>
