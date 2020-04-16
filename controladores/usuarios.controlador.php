<?php

class ControladorUsuarios{

    public function ctrIngresoUsuario(){
        if (isset($_POST["user"])){
          if (preg_match('/^[0-9]+$/', $_POST['user']) && preg_match('/^[0-9]+$/', $_POST['clave'])) {
              $tabla = "users";
              $item = "doc";
              $valor = $_POST['user'];
              $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla,$item,$valor);

              var_dump($respuesta);
          }
        }
    }
}

?>
