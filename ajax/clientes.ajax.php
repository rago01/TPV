<?php
require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes{

  //VALIDAR SI EL CLIENTE YA EXISTE EN EL SISTEMA
  public $validarCelular;
  public function ajaxValidarCelular(){
    $item = "celular";
    $valor = $this -> validarCelular;
    $respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);
    // var_dump($respuesta);
    echo json_encode($respuesta);

  }
}
//VALIDAR SI EXISTE USUARIO
if (isset($_POST['validarCelular'])) {
    $valCel = new AjaxClientes();
    $valCel -> validarCelular = $_POST['validarCelular'];
    $valCel -> ajaxValidarCelular();
}


?>
