<?php
require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{
  //EDICION DE Usuario

  public $id_user;
  public function ajaxEditarUsuario(){

          $item = "id_user";
          $valor = $this->id_user;
          $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

          echo json_encode($respuesta);
  }

  //ACTIVAR Y DESACTIVAR usuarios
  public $activarUsuario;
  public $activarId;

  public function ajaxActivarUsuario(){

    $tabla = "users";
    $item1 = "estado_user";
    $valor1 = $this->activarUsuario;
    $item2 = "id_user";
    $valor2 = $this->activarId;

    $respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
  }
}


//EDICION DE Usuario
if (isset($_POST['id_user'])) {
  $editar = new AjaxUsuarios();
  $editar -> id_user = $_POST['id_user'];
  $editar -> ajaxEditarUsuario();
}

// ACTVAR Y DESACTIVAR USUARIOS

if (isset($_POST['activarUsuario'])) {
  $activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();
}

?>
