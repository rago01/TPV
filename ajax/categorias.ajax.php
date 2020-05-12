<?php

require_once "../controladores/categorias_producto.controlador.php";
require_once "../modelos/categorias_producto.modelo.php";

class AjaxCategorias{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/

	public $id_categoria_producto;

	 public function ajaxEditarCategoriaProducto(){

		$item = "id_categoria_producto";
		$valor = $this->id_categoria_producto;

		$respuesta = ControladorCategoriasProducto::ctrMostrarCategoriasProducto($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/
if(isset($_POST["id_categoria_producto"])){

	$categoria = new AjaxCategorias();
	$categoria -> id_categoria_producto = $_POST["id_categoria_producto"];
	$categoria -> ajaxEditarCategoriaProducto();
}

?>
