<?php
require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{
  //EDICION DE Usuario

  public $idUsuario;
  public function ajaxEditarUsuario(){

          $item = "id_user";
          $valor = $this->idUsuario;
          $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

          echo json_encode($respuesta);
  }
}

if (isset($_POST['idUsuario'])) {
  $editar = new AjaxUsuarios();
  $editar -> idUsuario = $_POST['idUsuario'];
  $editar -> ajaxEditarUsuario();
}

?>
