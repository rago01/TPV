<?php

require_once "../controladores/categorias_inventario.controlador.php";
require_once "../modelos/categorias_inventario.modelo.php";

class AjaxCategorias{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/

	public $id_categoria_inventario;

	 public function ajaxEditarCategoriaInventario(){

		$item = "id_categoria_inventario";
		$valor = $this->id_categoria_inventario;

		$respuesta = ControladorCategoriasInventario::ctrMostrarCategoriasInventario($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/
if(isset($_POST["id_categoria_inventario"])){

	$categoria = new AjaxCategorias();
	$categoria -> id_categoria_inventario = $_POST["id_categoria_inventario"];
	$categoria -> ajaxEditarCategoriaInventario();
}

?>
